@extends('layouts.admin')

@section('title')
<title>Admin</title>
@endsection
@section('css')
<style>
  .table td, .table th {
    padding:10px 5px;
    
}
</style>
@endsection
@section('content')
<div class="content-wrapper">

  @include('partials.content-header', ['name' => 'Danh sách ', 'key' => 'đơn hàng'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Mã đơn hàng</th>
                <th scope="col">Email</th>
                <th scope="col">Giao hàng đến địa chỉ</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Tổng tiền</th>
                <th scope="col">Tình trạng</th>
                <th scope="col">Ngày đặt hàng</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
            @foreach($orders as $key => $order)
              <tr>
                <th scope="row"><span class="badge badge-primary">{{$loop->index+1}}</span></th>
                <th scope="row">{{$order->id}}</th>
                <th scope="row">{{$order->email}}</th>
                <th scope="row">{{$order->address}}</th>
                <th scope="row">{{$order->phone_number}}</th>
                <th scope="row">{{number_format($order->amount)}} đ</th>
                @if($order->success==1)
                <th scope="row"><span class="badge badge-success">{{$order->status}}</span></th>
                @else
                <th scope="row"><span class="badge badge-danger">{{$order->status}}</span></th>
                @endif
                <th scope="row">{{$order->created_at}}</th>
                <td><a href="{{route('orders.show',['id'=>$order->id])}}" class="btn btn-default">Xem chi tiết</a>
                  <a href="{{route('orders.delete',['id'=>$order->id])}}" class="btn btn-danger">Delete</a>
                  @if($order->success==1)
                  <a href="{{route('orders.update-status',['id'=>$order->id])}}" class="btn btn-success disabled">Xử lý</a>
                  @else
                  <a href="{{route('orders.update-status',['id'=>$order->id])}}" class="btn btn-success">Xử lý</a>
                  @endif
                </td>
              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{$orders->links()}}
        </div>
      </div>

    </div>
  </div>

</div>



<aside class="control-sidebar control-sidebar-dark">

  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
@endsection