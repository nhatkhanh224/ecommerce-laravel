<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\StorageImageTrait;
use DB;
use App\Slider;
use App\Category;
use App\Product;
use App\ProductImage;
use App\User;
use App\Cart;
use App\Address;
use App\Order;
use App\Order_Detail;
use App\Comment;

class HomeController extends Controller
{
    use StorageImageTrait;
    private $slider;
    private $comment;
   
    public function __construct(Slider $slider,Comment $comment)
    {
        $this->slider = $slider;
        $this->comment = $comment;
    }
    public function index(){
        $sliders=$this->slider->latest()->get();
        $category = Category::where('parent_id',0)->get();
        $products=Product::latest('view_count','desc')->take(12)->get();
        $productsRecommended=Product::latest('view_count','desc')->take(12)->get();
        $category_tabs= Category::where('parent_id',0)->limit(5)->orderBy('id', 'DESC')->get();
        $category_menus=Category::where('parent_id',0)->limit(3)->get();
        return view('home.homepage.home',compact('sliders','category','products','productsRecommended','category_tabs','category_menus'));
    }
    public function category($slug,$category_id){
        $category = Category::where('parent_id',0)->get();
        $products=Product::where('category_id',$category_id)->paginate(12);
        return view('home.product.category.list',compact('category','products'));
    }
    public function productDetail($product_id){
        $category = Category::where('parent_id',0)->get();
        $product_details=Product::where('id',$product_id)->first();
        $productsRecommended=Product::where('category_id',$product_details->category_id)->get();
        $product_images=ProductImage::where('product_id',$product_id)->get();
        $comments=Comment::where('product_id',$product_id)->paginate(5);
        $comment=Comment::where('product_id',$product_id)->first();
        $comment_count=Comment::where('product_id',$product_id)->count();
        $comment_mean=0;
        foreach(Comment::where('product_id',$product_id)->get() as $comment){
            $comment_mean+=($comment->rating)/$comment_count;
        }
        return view('home.product.detail',compact('category','product_details','product_images','productsRecommended','comments','comment',
        'comment_count','comment_mean'));
    }
    public function addToCart($id,Request $request){
        $product= Product::where('id',$id)->first();
        $user = Auth::user();
        $count_cart=Cart::where('product_id',$id)->where('username',$user->email)->count();
        if ($count_cart>0) {
            $cart= Cart::where('product_id',$id)->first();
            Cart::where('product_id',$id)->where('username',$user->email)->update(['quantity'=>$cart->quantity+=$request->quantity]);
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
        if (Auth::check()) {
            $category = Category::where('parent_id',0)->get();
            $user = Auth::user();
            $carts=Cart::where('username',$user->email)->get();
            $count_cart_exists=Cart::where('username',$user->email)->count();
            return view('home.cart.list',compact('category','carts','user','count_cart_exists'));
        }else{
            return redirect()->route('homepage.login');
        }
        
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
        $user = Auth::user();
        $cart= Cart::where('product_id',$id)->where('username',$user->email)->first();
        Cart::where('product_id',$id)->where('username',$user->email)->update(['quantity'=>$cart->quantity+=$quantity]);
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
        $order->status="M???i ?????t h??ng";
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
        $key=$request->key;
        $products=Product::where('name','like','%'.$key.'%')->paginate(12);
        return view('home.homepage.search',compact('products','category'));
    }
    public function historyOrder(){
        $category = Category::where('parent_id',0)->get();
        $user = Auth::user();
        $orders=Order::where('email',$user->email)->get();
        return view('home.homepage.history_order',compact('orders','category'));
    }
    public function viewOrder($id){
        $category = Category::where('parent_id',0)->get();
        $order=Order_Detail::where('order_id',$id)->get();
        return view('home.homepage.view_order',compact('order','category'));
    }
    public function comment(Request $request){
        $user = Auth::user();
        try {
            DB::beginTransaction();
            $dataCommentCreate = [
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'content' => $request->content,
                'rating' => $request->rating,
            ];
            $comment = $this->comment->create($dataCommentCreate);
            if ($request->hasFile('image_path')) {
                foreach ($request->image_path as $fileItem) {
                    $dataCommentImageDetail = $this->storageTraitUploadMutiple($fileItem, 'comment');
                    $comment->images()->create([
                        'image_path' => $dataCommentImageDetail['file_path'],
                        'image_name' => $dataCommentImageDetail['file_name']
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('homepage.index');
        } catch (\Exception $exception) {
            DB::rollBack();
            Log::error('Message: ' . $exception->getMessage() . ' --- Line : ' . $exception->getLine());
        }
    }
    public function login(){
        $category = Category::where('parent_id',0)->get();
        return view('home.user.login',compact('category'));
    }

    public function loginPost(Request $request){
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->to('homepage');
        }else{
            return redirect()->route('homepage.login');
        }
    }
    public function logout(){
        Auth::logout();
        return redirect()->to('homepage');
    }
    public function signup(Request $request){
        $user=new User();
        $user->name=$request->name;
        $user->password=bcrypt($request->password);
        $count_email=User::where('email',$request->email)->count();
        if ($count_email>0) {
            return redirect()->back();
        }else{
            $user->email=$request->email;
        }
        $user->save();
        Auth::attempt(['email' => $request->email, 'password' => $request->password]);
        return redirect()->route('homepage.user');
    }
    public function user(){
        $category = Category::where('parent_id',0)->get();
        $user=Auth::user();
        $name=$user->name;
        $phone_number=$user->phone_number;
        $address=$user->address;
        return view('home.user.information',compact('category','name','phone_number','address'));
    }
    public function userUpdate(Request $request){
        $user=Auth::user();
        User::where('id',$user->id)->update(['name'=>$request->name,'phone_number'=>$request->phone_number,'address'=>$request->address]);
        return redirect()->to('homepage');
    }
}