@extends('layouts.admin')

@section('title')
<title>Admin</title>
@endsection

@section('content')
<div class="content-wrapper">

  @include('partials.content-header', ['name' => 'Chi tiết', 'key' => 'đơn hàng'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Số lượng</th>
              </tr>
            </thead>
            <tbody>
              @foreach($order as $order)
              <tr>
                <th scope="row">1</th>
                <td>{{$order->product_name}}</td>
                <td>{{number_format($order->price)}} đ</td>
                <td>{{$order->quantity}}</td>
              </tr>
             @endforeach
            </tbody>
          </table>
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