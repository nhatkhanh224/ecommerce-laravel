@extends('layouts.home')
@section('title')
<title>Checkout</title>
@endsection
@section('content')
<div class="container">
  <h2>Thông tin mua hàng</h2>
  <form>
    <div class="form-group">
      <label>Họ tên</label>
      <input type="text" class="form-control" value="{{$user->name}}" placeholder="Nhập tên liên hệ" required>
    </div>
    <div class="form-group">
      <label>Số điện thoại</label>
      <input type="text" class="form-control" placeholder="Nhập số điện thoại" required>
    </div>
    <div class="form-group">
      <label>Địa chỉ</label>
      <input type="text" class="form-control" placeholder="Nhập địa chỉ giao hàng" required>
    </div>
    <table class="table">
      <thead>
        <tr>

          <th scope="col">Sản phẩm</th>
          <th scope="col">Ảnh</th>
          <th scope="col">Giá</th>
          <th scope="col">Số lượng</th>
          <th scope="col">Tổng tiền</th>
        </tr>
      </thead>
      <tbody>
        @php
        $total =0;
        @endphp
        @foreach($carts as $cart)
        @php
        $total += $cart['price']*$cart['quantity'];
        @endphp
        <tr>
          <td style="width:100px">{{$cart['name']}}</td>
          <td style="width:100px"><img style="width:80%" src="{{$cart['image']}}" alt=""></td>
          <td style="width:100px">{{number_format($cart['price'])}} đ</td>
          <td style="width:100px">{{$cart['quantity']}}</td>
          <td style="width:100px">{{number_format($cart['quantity']*$cart['price'])}} đ</td>
        </tr>
        @endforeach
      </tbody>

    </table>
    <div style="font-size:20px" class="total-price-payment">
      <p>Phí vận chuyển (Áp dụng cho tất cả sản phẩm) :30,000 đ</p>
      <span>Tổng tiền: {{number_format($total+30000)}} đ</span>
    </div>
    <button type="submit" class="btn btn-primary">Thanh toán</button>
  </form>
</div>
@endsection