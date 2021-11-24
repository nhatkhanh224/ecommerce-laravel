@extends('layouts.home')

@section('css')

@endsection
@section('js')

<script>
var image = $(".product-image img").attr("src");

function changeImage(id) {
  var img_small = $("#" + id).attr("src");
  $(".product-detail-image img").attr("src", img_small);
}
</script>

<script>
$('.cart').click(function(e) {
  e.preventDefault();
  let urlCart = $(this).data("url");
  $.ajax({
    type: 'GET',
    url: urlCart,
    success: function(result) { //we got the response
      alert('Thêm sản phẩm thành công');
    },
    error: function(jqxhr, status, exception) {
      alert('Exception:', exception);
    }
  })
})
</script>
@endsection
@section('content')
<div class="product__app">
  <div class="grid wide">
    <div class="breadcrumb"></div>
    <div class="product__main">
      <div class="product__main-container">
        <div class="main__container-left">
          <div class="container__left-image">
            <div class="left__image-product">
              <img src="{{ $product_details->feature_image_path }}" alt="product" id="imagebox">
            </div>
          </div>
          <div class="container__left-review">
            <div class="left__review-lists">
              @foreach ($product_details->images as $image)
              <img src="{{$image->image_path}}" alt="" onclick="clickme(this)">
              @endforeach
            </div>
          </div>
          <div class="container__left-social">
            <span>Chia sẻ:</span>
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/social-messenger.svg" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/social-pinterest.svg" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/social-messenger.svg" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/social-twitter.svg" alt="">
            <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/social-copy.svg" alt="">
            <div class="left-social-like">
              <img src="https://frontend.tikicdn.com/_desktop-next/static/img/pdp_revamp_v2/icons-like.svg" alt="heart">
              <span>Thích</span>
            </div>
          </div>
        </div>
        <div class="main__container-separate"></div>
        <form action="{{route('addToCart',['id'=>$product_details->id])}}" method="POST">
        @csrf
        <div class="main__container-right">
          <div class="container__right-header">
            <div class="right__header-brand">
              <!-- <span>Thương hiệu:
                <a href="">Samsung</a>
              </span> -->
            </div>
            <h1 class="right__header-title">
              {{$product_details->name}}
            </h1>
            <div class="right__header-rating">
              <div class="header__rating-star">
                <div class="rating__star-icon">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>


              </div>

            </div>
          </div>
          <div class="container__right-body">
            <div class="right__body-product">
              <div class="body__product-price">
                <div class="product__price-item">
                  <div class="price__item-current">{{ number_format($product_details->price) }} đ</div>

                </div>

              </div>
              <div class="body__product-option">
                <!-- <div class="product__option-wrapper">
                                            <p>Màu:
                                                <span>Xanh Dương</span>
                                            </p>
                                            
                                        </div> -->
              </div>

              
              <div class="body__product-addcart">
                <span>Số Lượng:</span>
                <div class="addcart__quantity-field">
                  <div class="addcart__value-button addcart__decrease-button"
                    onclick="decreaseValue()">-</div>
                  <input class="addcart__number" id="number" name="quantity" value="1"></input>
                  <div class="addcart__value-button addcart__increase-button"
                    onclick="increaseValue()">+</div>
                </div>
                <div class="addcart__groupbtn">
                  <button class="addcart__groupbtn-buy">Chọn Mua</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        </form>
        
      </div>
    </div>
    <div class="product__same">
      <div class="product__same-wrapper">
        <h4 class="product__same-title">Sản Phẩm Tương Tự</h4>
        <div class="product__same-container">
          <div class="owl-four owl-carousel owl-theme">
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="owl-carousel-item">
              <a class="product__same-items" href="">
                <div class="same__items-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/ce/6e/f1/ac6dfa03bdaa5fba014b46ecf8dade60.jpg.webp"
                    alt="">
                </div>
                <h4 class="same__items-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="same__items-action">
                  <div class="same__items-rating">
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="same__items-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="same__items-sold">88 Đã bán</span>
                </div>
                <div class="same__items-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="product__description">
      <div class="product__description-wrapper">
        <div class="product__description-left">

          <div class="description__left-content">
            <h4 class="left__content-title">Mô Tả Sản Phẩm</h4>
            <div class="left__content-words">

              <div class="content__words-seemore">
                <?php echo $product_details->content ?>
              </div>
      </div>
          </div>
        </div>
        <div class="product__description-right hide-on-mobile-tablet">

        </div>
      </div>
    </div>
    <div class="product__cmt"></div>
    <div class="home__main">
      <div class="home__main-container">
        <div class="home__main-header" style="position:sticky;top:0">
          <div class="main__header-title">Gợi Ý Hôm Nay</div>
          <div class="main__header-menu">
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
            <a href="" class="header__menu-links">
              <img
                src="https://salt.tikicdn.com/cache/w100/ts/upload/6d/56/64/3c4a8a3a7475311d8c6892d9ede8ead7.png.webp"
                alt="">
              <div class="header__menu-title">Dành Cho Bạn</div>
            </a>
          </div>
        </div>
        <div class="home__main-body">
          <div class="row sm-gutter">
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
            <div class="col l-2-4 m-4 c-6">
              <a class="main__body-item" href="">
                <div class="body__item-img">
                  <img
                    src="https://salt.tikicdn.com/cache/200x200/ts/product/2c/28/4a/048c42556545a326d64fc144970291b7.jpg.webp"
                    alt="">
                </div>
                <h4 class="body__item-name">Điện Thoại Samsung Galaxy A02s (4GB/64GB) - Hàng Chính Hãng</h4>
                <div class="body__item-action">
                  <div class="body__item-rating">
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="body__item-star fas fa-star"></i>
                    <i class="fas fa-star"></i>
                  </div>
                  <span class="body__item-sold">88 Đã bán</span>
                </div>
                <div class="body__item-price">
                  <span class="item__price-discount">1.200.000đ</span>
                  <span class="item__price-discount-percent">10%</span>
                </div>
              </a>
            </div>
          </div>
          <a href="" class="main__body-seemore">XEM THÊM</a>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection