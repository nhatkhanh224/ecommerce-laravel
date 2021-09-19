<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Category;
use App\Product;
use App\ProductImage;

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
    public function productDetail($product_id){
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        $category = Category::where('parent_id',0)->get();
        $productsRecommended=Product::latest('view_count','desc')->take(12)->get();
        $product_details=Product::where('id',$product_id)->first();
        $product_images=ProductImage::where('product_id',$product_id)->get();
        return view('home.product.detail',compact('category','category_menus','productsRecommended','product_details','product_images'));
    }
    public function addToCart($id){
        // session()->flush();
        $product=Product::find($id);
        $cart=session()->get('cart');
        if (isset($cart[$id])) {
            $cart[$id]['quantity']= $cart[$id]['quantity']+1;
        }else{
            $cart[$id]=[
                'name'=>$product->name,
                'price' =>$product->price,
                'quantity' =>1,
                'image'=>$product->feature_image_path,
            ];
        }
        session()->put('cart',$cart);
        return response()->json(['code'=>200,'message'=>'success'],200);
        
    }
    public function showCart(){
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        $carts=session()->get('cart');
        
        return view('home.cart.list',compact('category_menus','carts'));
    }
    public function updateCart(Request $request){
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            $carts=session()->get('cart');
            $cartComponent=view('home.components.cart_components.cart_component',compact('carts'))->render();
            return response()->json([
                'cart_component'=>$cartComponent,
                'code'=>200
            ],200);
        }
    }
    public function deleteCart(Request $request){
        if($request->id){
            $cart = session()->get('cart');
            unset($cart[$request->id]);
            session()->put('cart', $cart);
            $carts=session()->get('cart');
            $cartComponent=view('home.components.cart_components.cart_component',compact('carts'))->render();
            return response()->json([
                'cart_component'=>$cartComponent,
                'code'=>200
            ],200);
        }
    }
    
}