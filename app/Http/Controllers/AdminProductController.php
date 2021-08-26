<?php

namespace App\Http\Controllers;


use App\Category;
use App\Components\Recursive;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }
    public function index(){
        return view('admin.product.index');
    }
    public function create(){
        $htmlOption = $this->getCategory($parentId = '');
        return view('admin.product.add', compact('htmlOption'));
    }
    public function getCategory($parentId)
    {
        $data = $this->category->all();
        $recusive = new Recursive($data);
        $htmlOption = $recusive->categoryRecursive($parentId);
        return $htmlOption;
    }

    
}
