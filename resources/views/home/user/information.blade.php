@extends('layouts.home')
@section('content')
<div class="cart__app">
  <div class="grid wide">

    <div class="cart__app-body">
      <div class="cart__app-body--inner">
        <div class="cart__style-product">
          <h4>Đơn hàng của tôi</h4>
          <form action="{{route('homepage.userUpdate')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Tên đầy đủ</label>
              <input type="text" class="form-control" name="name" value="{{$name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Số điện thoại</label>
              <input type="text" class="form-control" value="{{$phone_number}}" name="phone_number">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input type="text" class="form-control" value="{{$address}}" name="address">
            </div>
            <button type="submit" class="btn btn-primary">Lưu lại</button>
          </form>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection