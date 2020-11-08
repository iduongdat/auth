<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Hash;
use App\Models\Page;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('roles.index', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        \Menu::make('MyPage', function ($menu) {

            $menu->group(array('prefix' => '/'), function ($m) {
                $pages = Page::all();
                $this->build_tree($m, $pages);
            });
        });
        $roles = Role::where('id', $id)->first();
        $data['permission'] = Permission::all();
        $data['roles'] = $roles;
        return view('roles.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
