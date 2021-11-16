<?php

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Cart;

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
Route::post('/product/{id}', function (Request $request,$id) {
    $cartExits=Cart::where('product_id',$id)->count();
    if ($cartExits>0) {
        $cart= Cart::where('product_id',$id)->first();
        Cart::where('product_id',$id)->update(['quantity'=>$cart->quantity+=1]);
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
