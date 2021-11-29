<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_Detail;

class OrderController extends Controller
{
    public function index(){
        $orders=Order::all();
        return view('admin.order.index',compact('orders'));
    }
    public function show($id){
        $order=Order_Detail::where('order_id',$id)->get();
        return view('admin.order.show_detail',compact('order'));
    }
    public function delete($id){
        $order=Order::where('id',$id)->delete();
        return redirect()->route('orders.index');
    }
    public function updateStatus($id){
        $order=Order::where('id',$id)->update(['success'=>1,'status'=>"Giao hàng thành công"]);
        return redirect()->route('orders.index');
    }
}
