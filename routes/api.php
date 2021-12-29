<?php

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;
use App\User;
use App\Address;
use App\Order;
use App\Order_Detail;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('category', function () {
    $categories = Category::where('parent_id',0)->get();
    return response($categories,200);
});
Route::get('category/{id}', function ($id) {
    $categories = Category::where('parent_id',$id)->get();
    return response($categories,200);
});
Route::get('/product', function () {
    $products = Product::limit(10)->latest()->get();
    return response($products,200);
});
Route::get('/product/{id}', function ($id) {
    $products = Product::where('category_id',$id)->get();
    return response($products,200);
});
Route::get('/product/detail/{id}', function ($id) {
    $products = Product::where('id',$id)->get();
    return response($products,200);
});
Route::post('/login', function (Request $request) {
    $loginDetails = $request->only('email', 'password');
    if (Auth::attempt($loginDetails)) {
        return response()->json(['message'=>"Login Success",'code'=>200]);
    }else{
        return response()->json(['message'=>"Login Failed",'code'=>501]);
    }
});
Route::post('/product/{email}/{id}', function (Request $request,$id,$email) {
    $cartExits=Cart::where('product_id',$id)->where('username',$email)->count();
    if ($cartExits>0) {
        $cart= Cart::where('product_id',$id)->first();
        Cart::where('product_id',$id)->where('username',$email)->update(['quantity'=>$cart->quantity+=1]);
        return response()->json(['message'=>'Update Success','code'=>200]);
    }else {
        $cart = new Cart();
        $cart->product_id = $request->product_id;
        $cart->product_name = $request->product_name;
        $cart->quantity = $request->quantity;
        $cart->photo_url = $request->photo_url;
        $cart->price = $request->price;
        $cart->username= $request->username;
        $cart->save();
        return response()->json(['message'=>"Add Success",'code'=>200]);
    }
   
});
Route::get('/cart/{email}', function ($username) {
    $cart = Cart::where('username',$username)->get();
    return response($cart,200);
});
Route::get('/cart/total/{email}',function ($username) {
    $cart = Cart::where('username',$username)->get();
    $total=0;
    foreach($cart as $cart) {
        $total+=($cart->quantity)*($cart->price);
    }
    return response($total,200);
});
Route::post('/cart/update/{id}', function (Request $request,$id) {
    $cart= Cart::where('product_id',$id)->first();
    $quantity=$request->quantity;
    Cart::where('product_id',$id)->update(['quantity'=>$cart->quantity+=$quantity]);
    return response()->json(['message'=>"Update Quantity Success",'code'=>200]);
});
Route::post('/cart/delete/{id}', function (Request $request,$id) {
    $cart= Cart::where('product_id',$id)->first();
    Cart::where('product_id',$id)->delete();
    return response()->json(['message'=>"Delete Success",'code'=>200]);
});
Route::get('/address/{email}',function ($username) {
    $user= User::where('email',$username)->get();
    return response($user,200);
});
Route::post('/checkout/{email}', function (Request $request,$email) {
    $carts= Cart::where('username',$email)->get();
    $user= User::where('email',$email)->first();
    $order=new Order();
        $order->email=$email;
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
    Cart::where('username',$email)->delete();
    return response()->json(['message'=>'Payment Success','code'=>200]);
});
Route::get('/history/{email}',function ($username) {
    $orders= Order::where('email',$username)->get();
    return response($orders,200);
});
Route::get('/history/detail/{id}',function ($id) {
    $orders= Order_Detail::where('order_id',$id)->get();
    return response($orders,200);
});
Route::get('/search/{key}',function ($key) {
    $products=Product::where('name','like','%'.$key.'%')->get();
    return response($products,200);
});
