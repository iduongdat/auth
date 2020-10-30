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


        //   dd($roles->pluck('id')->toArray());
        \Menu::make('MyNavBar', function ($menu) {

            $menu->group(array('prefix' => '/'), function ($m) {

                $user = Auth::user();
                if ($user->hasRole('admin'))
                    $pages = Page::all(); //access all pages
                else {
                    /*other user pages */
                    $role = $user->roles->first(); // Returns a collection
                    $pages = $role->pages;
                }

                $this->build_tree($m, $pages);
            });
        });


        return $next($request);
    }
    function build_tree($menu, $arrs, $parent_id = 0, $level = 0)
    {
        foreach ($arrs as $arr) {
            if ($arr['parent_id'] == $parent_id) {
                if ($arr['parent_id'] > 0) {
                    $parentobj = Page::select('title')->where('id', '=', $parent_id)->first();
                    $ptitle = strtolower($parentobj->title);
                    $menu->get($ptitle)->add($arr['title'], $arr['link']);
                } else
                    $menu->add($arr['title'], $arr['link']);


                // echo str_repeat("-", $level)." ".$arr['title']."<br/>";
                $this->build_tree($menu, $arrs, $arr['id'], $level + 1);
            }
        }
    }
}
