<?php

namespace App\Http\Middleware;

use App\Models\Page;
use Closure;
use Auth;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        \Menu::make('MyNavBar', function ($menu) {

            $menu->group(array('prefix' => '/'), function ($m) {
                if (Auth::check()) {
                    $user = Auth::user();
                    if ($user->hasRole('admin'))
                        $pages = Page::all(); //access all pages
                    else {
                        /*other user pages */
                        $role = $user->roles->first(); // Returns a collection
                        $pages = $role->pages;
                    }

                    $this->build_tree($m, $pages);
                } else {
                    return route('login');
                }
            });
        });


        return $next($request);
    }
    function build_tree($menu, $arrs, $parent_id = 0, $level = 0)
    {
        foreach ($arrs as $arr) {
            if ($arr['parent_id'] == $parent_id) {
                if ($arr['parent_id'] > 0) {
                    $parentobj = Page::select('title_en')->where('id', '=', $parent_id)->first();
                    $ptitle = strtolower($parentobj->title_en);
                    $menu->get($ptitle)->add($arr['title_en'], $arr['link']);
                } else
                    $menu->add($arr['title_en'], $arr['link']);


                // echo str_repeat("-", $level)." ".$arr['title']."<br/>";
                $this->build_tree($menu, $arrs, $arr['id'], $level + 1);
            }
        }
    }
}
