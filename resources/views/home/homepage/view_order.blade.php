@extends('layouts.home')
@section('content')
<div class="cart__app">
  <div class="grid wide">

    <div class="cart__app-body">
      <div class="cart__app-body--inner">
        <div class="cart__style-product">
          <h4>Chi tiết đơn hàng</h4>
          <div class="style__product-heading">
            <div class="product__heading-row">
              <div class="col-1">
                <label for="" class="product__checkbox">
                  <!-- <input type="checkbox" id="" class="checkbox__input">
                                            <span class="heading__checkbox-fake"></span> -->
                  <span class="label">Sản phẩm</span>
                </label>
              </div>
              <div class="col-1">Giá</div>
              <div class="col-1">Số lượng</div>


            </div>
          </div>
          <div class="style__product-body">
            <div>
              <div class="product__body-component">
                <div class="body__component-seller">
                  <div class="component__seller-body">
                    <div>
                      <div class="seller__body-item">
                        @foreach ($order as $order)
                        <div class="body__item-row">
                          <div class="col-1">
                            <span class="item__row-currentprice"><a href="">{{$order->product_name}}</a></span>
                          </div>
                          <div class="col-1">
                            <span class="item__row-currentprice">{{number_format($order->price)}} đ</span>

                          </div>
                          <div class="col-1">
                            <span class="item__row-currentprice">{{$order->quantity}}</span>
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
</div>
</div>
@endsection