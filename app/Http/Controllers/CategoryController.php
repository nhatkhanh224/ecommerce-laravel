<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recursive;
use App\Category;
use App\Http\Requests\CategoryAddRequest;

class CategoryController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function create(){
        $htmlOption=$this->getCategory($parentId='');
        return view("admin.category.add",compact('htmlOption'));
    }
    public function index(){
        $categories=$this->category->latest()->paginate(5);
        return view("admin.category.index",compact('categories'));
    }
    public function store(CategoryAddRequest $request){
        $this->category->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
            'photo_url' =>$request->photo_url,
        ]);
        return redirect()->route('categories.index');
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->categoryRecursive($parentId);
        return $htmlOption;
    }

    public function edit($id)
    {
        $category = $this->category->find($id);
        $htmlOption = $this->getCategory($category->parent_id);

        return view('admin.category.edit', compact('category', 'htmlOption'));

    }
    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => str_slug($request->name),
            'photo_url' =>$request->photo_url,
        ]);
        return redirect()->route('categories.index');
    }

    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');
    }
}
