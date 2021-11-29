@extends('layouts.home')
@section('content')
<div class="cart__app">
      <div class="grid wide">
        
        <div class="cart__app-body">
          <div class="cart__app-body--inner">
            <div class="cart__style-product">
              <h4>Đơn hàng của tôi</h4>
              <div class="style__product-heading">
                <div class="product__heading-row">
                  <div class="col-2">
                    <label for="" class="product__checkbox">
                      <!-- <input type="checkbox" id="" class="checkbox__input">
                                            <span class="heading__checkbox-fake"></span> -->
                      <span class="label">Mã đơn hàng</span>
                    </label>
                  </div>
                  <div class="col-2">Ngày mua</div>
                  <div class="col-2">Tổng tiền</div>
                  <div class="col-2">Trạng thái đơn hàng</div>
                  
                </div>
              </div>
              <div class="style__product-body">
                <div>
                  <div class="product__body-component">
                    <div class="body__component-seller">
                      <div class="component__seller-body">
                        <div>
                          <div class="seller__body-item">
                           @foreach ($orders as $order)
                            <div class="body__item-row">
                              <div class="col-2">
                              <span class="item__row-currentprice"><a href="{{route('order.view',['id'=>$order->id])}}">{{$order->id}}</a></span>
                              </div>
                              <div class="col-2">
                                <span class="item__row-currentprice">{{$order->created_at}}</span>

                              </div>
                              <div class="col-2">
                              <span class="item__row-currentprice">{{number_format($order->amount)}} đ</span>
                              </div>
                              <div class="col-2">
                              <span class="item__row-currentprice">{{$order->status}}</span>
                              </div>
                              
                            </div>
                            @endforeach
                            
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
@endsection