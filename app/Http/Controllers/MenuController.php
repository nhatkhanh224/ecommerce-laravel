<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\MenuRecursive;
use App\Menu;

class MenuController extends Controller
{
    private $menuRecursive;
    private $menu;
    public function __construct(MenuRecursive $menuRecursive,Menu $menu)
    {
        $this->menuRecursive = $menuRecursive;
        $this->menu=$menu;
    }
    public function index(){
        $menus=$this->menu->paginate(10);
        return view('menu.index',compact('menus'));
    }
    public function create(){
        $optionSelect = $this->menuRecursive->menuRecursiveAdd();
        return view('menu.add',compact('optionSelect'));
    }
    public function store(Request $request){
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>str_slug($request->name)
            
        ]);
        return redirect()->route('menus.index');
    }
    public function edit($id){
        $menuFollowIdEdit = $this->menu->find($id);
        $optionSelect = $this->menuRecursive->menuRecursiveEdit($menuFollowIdEdit->parent_id);
        return view('menu.edit',compact('menuFollowIdEdit','optionSelect'));
    }
    public function update($id,Request $request){
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' =>str_slug($request->name)
        ]);
        return redirect()->route('menus.index');
    }
    public function delete($id){
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}