<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slider;
use App\Category;
use App\Product;
use App\ProductImage;
use App\User;
use App\Cart;
use App\Address;
use App\Order;
use App\Order_Detail;

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
        $products=Product::latest('view_count','desc')->take(12)->get();
        $productsRecommended=Product::latest('view_count','desc')->take(12)->get();
        $category_tabs= Category::where('parent_id',0)->limit(5)->orderBy('id', 'DESC')->get();
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        $count_cart=Cart::where('username',Auth::user()->email)->count();
        return view('home.homepage.home',compact('sliders','category','products','productsRecommended','category_tabs','category_menus','count_cart'));
    }
    public function category($slug,$category_id){
        $category = Category::where('parent_id',0)->get();
        $products=Product::where('category_id',$category_id)->paginate(12);
        $count_cart=Cart::where('username',Auth::user()->email)->count();
        return view('home.product.category.list',compact('category','products','count_cart'));
    }
    public function productDetail($product_id){
        $category = Category::where('parent_id',0)->get();
        $product_details=Product::where('id',$product_id)->first();
        $productsRecommended=Product::where('category_id',$product_details->category_id)->get();
        $product_images=ProductImage::where('product_id',$product_id)->get();
        $count_cart=Cart::where('username',Auth::user()->email)->count();
        return view('home.product.detail',compact('category','product_details','product_images','count_cart','productsRecommended'));
    }
    public function addToCart($id,Request $request){
        $product= Product::where('id',$id)->first();
        $user = Auth::user();
        $count_cart=Cart::where('product_id',$id)->count();
        if ($count_cart>0) {
            $cart= Cart::where('product_id',$id)->first();
            Cart::where('product_id',$id)->update(['quantity'=>$cart->quantity+=$request->quantity]);
        }else{
            $cart=new Cart();
            $cart->product_id = $id;
            $cart->product_name=$product->name;
            $cart->photo_url=$product->photo_url;
            $cart->price=$product->price;
            $cart->image_path=$product->feature_image_path;
            $cart->quantity=$request->quantity;
            $cart->username=$user->email;
            $cart->save();
        }
        return redirect()->route('cart');
    }
    
    // public function addToCart($id){
    //     // session()->flush();
    //     $product=Product::find($id);
    //     $cart=session()->get('cart');
    //     if (isset($cart[$id])) {
    //         $cart[$id]['quantity']= $cart[$id]['quantity']+1;
    //     }else{
    //         $cart[$id]=[
    //             'name'=>$product->name,
    //             'price' =>$product->price,
    //             'quantity' =>1,
    //             'image'=>$product->feature_image_path,
    //         ];
    //     }
    //     session()->put('cart',$cart);
    //     return response()->json(['code'=>200,'message'=>'success'],200);
    // }
    public function showCart(){
        $category = Category::where('parent_id',0)->get();
        $user = Auth::user();
        $carts=Cart::where('username',$user->email)->get();
        $count_cart=Cart::where('username',$user->email)->count();
        return view('home.cart.list',compact('category','carts','count_cart','user'));
    }
    // public function updateCart(Request $request,$id){
        // if($request->id && $request->quantity){
        //     $cart = session()->get('cart');
        //     $cart[$request->id]["quantity"] = $request->quantity;
        //     session()->put('cart', $cart);
        //     $carts=session()->get('cart');
        //     $cartComponent=view('home.components.cart_components.cart_component',compact('carts'))->render();
        //     return response()->json([
        //         'cart_component'=>$cartComponent,
        //         'code'=>200
        //     ],200);
        // }
        // $cart= Cart::where('product_id',$id)->first();

    // }
    public function updateQuantity($id,$quantity){
        $cart= Cart::where('product_id',$id)->first();
        Cart::where('product_id',$id)->update(['quantity'=>$cart->quantity+=$quantity]);
    }
    public function deleteCart($id,Request $request){
        // if($request->id){
        //     $cart = session()->get('cart');
        //     unset($cart[$request->id]);
        //     session()->put('cart', $cart);
        //     $carts=session()->get('cart');
        //     $cartComponent=view('home.components.cart_components.cart_component',compact('carts'))->render();
        //     return response()->json([
        //         'cart_component'=>$cartComponent,
        //         'code'=>200
        //     ],200);
        // }
        
        Cart::where('id',$id)->delete();
        return redirect()->route('cart');

    }
    public function checkout(Request $request){
        $user = Auth::user();
        $carts=Cart::where('username',$user->email)->get();
        $order=new Order();
        $order->email=$user->email;
        $order->address=$user->address;
        $order->phone_number=$user->phone_number;
        $order->amount=$request->amount;
        $order->status="Mới đặt hàng";
        $order->save();
        $order_id=$order->id;
        foreach ($carts as $cart){
            $orderDetail=new Order_Detail();
            $orderDetail->order_id=$order_id;
            $orderDetail->product_id=$cart->product_id;
            $orderDetail->product_name=$cart->product_name;
            $orderDetail->price=$cart->price;
            $orderDetail->quantity=$cart->quantity;
            $orderDetail->save();
        }
        Cart::where('username',$user->email)->delete();
        return redirect()->route('homepage.index');
    }
    public function search(Request $request) {
        $category = Category::where('parent_id',0)->get();
        $user = Auth::user();
        $count_cart=Cart::where('username',$user->email)->count();
        $key=$request->key;
        $products=Product::where('name','like','%'.$key.'%')->paginate(12);
        return view('home.homepage.search',compact('products','category','count_cart'));
    }
    
}