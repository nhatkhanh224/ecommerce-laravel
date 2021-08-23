<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recursive;
use App\Category;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function create(){
        $data=$this->category->all();
        $recursive=new Recursive($data);
        $htmlOption=$recursive->categoryRecusrive();
        return view("category.add",compact('htmlOption'));
    }
    public function index(){
        return view("category.index");
    }
    public function store(Request $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name)
        ]);

        return redirect()->route('categories.index');

    }
}