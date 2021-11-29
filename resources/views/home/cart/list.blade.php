@extends('layouts.home')
@section('content')
@if($count_cart_exists>0)
    <div class="cart__app">
      <div class="grid wide">
        <div class="cart__app-header">
          <span class="cart__app-header--message">
            <span>
              Miễn phí vận chuyển đơn từ 149K của mỗi nhà bán có logo
              <img src="https://salt.tikicdn.com/ts/upload/3d/e3/de/2c71b5485f7335d41cb3c06198035fe3.png" alt="img">
            </span>
          </span>
        </div>
        <div class="cart__app-body">
          <div class="cart__app-body--inner">
            <div class="cart__style-product">
              <h4>GIỎ HÀNG</h4>
              <div class="style__product-heading">
                <div class="product__heading-row">
                  <div class="col-1">
                    <label for="" class="product__checkbox">
                      <!-- <input type="checkbox" id="" class="checkbox__input">
                                            <span class="heading__checkbox-fake"></span> -->
                      <span class="label">Tất cả(1 sản phẩm)</span>
                    </label>
                  </div>
                  <div class="col-2">Đơn giá</div>
                  <div class="col-3">Số lượng</div>
                  <div class="col-4">Thành tiền</div>
                  <div class="col-5">
                    <span class="heading__row-clearall">
                      <img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/trash.svg" alt="">
                    </span>
                  </div>
                </div>
              </div>
              <div class="style__product-body">
                <div>
                  <div class="product__body-component">
                    <div class="body__component-seller">
                      <div class="component__seller-body">
                        <div>
                          <div class="seller__body-item">
                            <?php $total=0; ?>
                            @foreach ($carts as $cart)
                            <?php $total+=$cart->quantity*$cart->price; ?>
                            <div class="body__item-row">
                              <div class="col-1">
                                <div class="item__row-inner">
                                  <div class="row__inner-checkbox">
                                    <label for="" class="product__checkbox">
                                      <input type="checkbox" id="" class="checkbox__input">
                                      <!-- <span class="heading__checkbox-fake"></span> -->
                                    </label>
                                  </div>
                                  <a href="#" class="row__inner-img">
                                    <img src="{{$cart->image_path}}" alt="img">
                                  </a>
                                  <div class="row__inner-content">
                                    <a href="#" class="inner__content-name">{{$cart->product_name}}</a>
                                  </div>
                                </div>
                              </div>
                              <div class="col-2">
                                <span class="item__row-currentprice">{{number_format($cart->price)}}đ</span>

                              </div>
                              <div class="col-3">
                                <div class="seller__quantity-field">
                                  <input type="button" class="seller__value-button seller__decrease-button"
                                    onclick="minus({{$cart->product_id}})" field="quantity" value="-" />
                                  <div class="seller__number">{{$cart->quantity}}</div>
                                  <input type="button" class="seller__value-button seller__increase-button"
                                    onclick="increase({{$cart->product_id}})" field="quantity" value="+" />
                                </div>
                              </div>
                              <div class="col-4">
                                <span
                                  class="item__row-finalprice">{{number_format($cart->quantity * $cart->price)}}đ</span>
                              </div>
                              <div class="col-5">
                                <a class="item__row-clearall" href="{{route('cart.delete',['id'=>$cart->id])}}">
                                  <img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/trash.svg"
                                    alt="">
                                </a>
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
          <div class="cart__app-body--totalprice">
            <div class="cart__totalprice-inner">
              <div class="total__price-head">
                <div class="price__head-wrapper">
                  <div class="head__wrapper-title">
                    <p class="wrapper__title-head">Giao tới</p>
                    <a class="wrapper__title-coupon" href="#">Thay đổi</a>
                  </div>
                  <div class="head__wrapper-coupon">
                    <span>{{$user->name}} </span>
                    <span>{{$user->phone_number}}</span>
                  </div>
                  <p class="cart_address">{{$user->address}}</p>
                </div>
              </div>
              <div class="total__price-head">
                <div class="price__head-wrapper">
                  <div class="head__wrapper-title">
                    <p class="wrapper__title-head">Tiki Khuyến Mãi</p>
                    <p class="wrapper__title-coupon">Có thể chọn 2
                      <img src="https://frontend.tikicdn.com/_desktop-next/static/img/mycoupon/icons-info-gray.svg"
                        alt="img">
                    </p>
                  </div>
                  <div class="head__wrapper-coupon">
                    <img src="https://frontend.tikicdn.com/_desktop-next/static/img/mycoupon/coupon_icon.svg" alt="img">
                    <span>Chọn hoặc nhập Khuyến mãi </span>
                  </div>
                </div>
              </div>
              <div class="total__price-body">
                <div class="price__body-wrapper">
                  <ul class="body__wrapper-prices">
                    <li class="wrapper__prices-item">
                      <span class="prices__item-text">Tạm Tính</span>
                      <span class="prices__item-text">{{number_format($total)}} đ</span>
                    </li>
                    <li class="wrapper__prices-item">
                      <span class="prices__item-text">Giảm Giá</span>
                      <span class="prices__item-text">0đ</span>
                    </li>
                  </ul>
                  <div class="body__wrapper-total">
                    <span class="prices__item-text">Tổng Cộng</span>
                    <div class="wrapper__total-content">
                      <div class="total__content-value">{{number_format($total)}} đ</div>
                      <span class="total__content-note">(Đã bao gồm VAT nếu có)</span>
                    </div>
                  </div>
                </div>
              </div>
              <form action="{{route('checkout')}}" method="post">
                @csrf
                <input type="hidden" name="amount" value="{{$total}}" />
                <button class="body__wrapper-submit">Mua Hàng</button>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
    @else
    <div class="app__content-cart">
      <div class="grid wide">
        <div class="cart__main">
          <h2>Giỏ Hàng</h2>
          <div class="cart__empty">
            <img src="{{asset('Tiki/assets/img/cart_empty.png')}}" alt="cart_empty">
            <p class="cart__empty-note">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
            <a href="{{route('homepage.index')}}" class="cart__empty-btn">Tiếp tục mua sắm</a>
          </div>
        </div>
      </div>
    </div>
    @endif
@endsection
    <script>
    function increase(id) {
      $.ajax({
        type: "GET",
        url: '/homepage/cart/update/' + id + '/1',
        success: function(result) {
          window.location.href = "/homepage/cart";
        },
      })
    }

    function minus(id) {
      $.ajax({
        type: "GET",
        url: '/homepage/cart/update/' + id + '/-1',
        success: function(result) {
          window.location.href = "/homepage/cart";
        },
      })
    }
    </script>
  </div>
</body>

</html>