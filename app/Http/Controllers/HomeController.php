<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;

class HomeController extends Controller
{
    private $slider;
   
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index(){
        $sliders=$this->slider->latest()->get();
        $category = Category::where('parent_id',0)->get();
        $products=Product::Latest()->take(6)->get();
        $productsRecommended=Product::latest('view_count','desc')->take(12)->get();
        $category_tabs= Category::where('parent_id',0)->limit(5)->orderBy('id', 'DESC')->get();
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        return view('home.homepage.home',compact('sliders','category','products','productsRecommended','category_tabs','category_menus'));
    }
    public function category($slug,$category_id){
        $category = Category::where('parent_id',0)->get();
        $category_tabs= Category::where('parent_id',0)->limit(5)->orderBy('id', 'DESC')->get();
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        $products=Product::where('category_id',$category_id)->paginate(12);
        return view('home.product.category.list',compact('category_tabs','category_menus','category','products'));
    }
    
}
