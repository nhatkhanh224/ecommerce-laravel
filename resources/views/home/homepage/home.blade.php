@extends('layouts.home')
@section('content')
<div class="app__container">
            <div class="grid wide">
                <div class="banner__container">
                    <div class="banner__container-left">
                        <div class="container__left-slider">
                            @foreach ($sliders as $key => $slider)
                            <div class="left__slider-img" style="display: block;">
                                <img src="{{ $slider->image_path }}" alt="banner_1" style="width:100%; height: 100%;">
                            </div>
                            @endforeach
                            <a class="left__slider-prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="left__slider-next" onclick="plusSlides(1)">&#10095;</a>
                            <div class="left__slider-dots" style="text-align: center;">
                                <span class="slider__dots-item" onclick="currentSlide(1)"></span>
                                <span class="slider__dots-item" onclick="currentSlide(2)"></span>
                                <span class="slider__dots-item" onclick="currentSlide(3)"></span>
                                <span class="slider__dots-item" onclick="currentSlide(4)"></span>
                                <span class="slider__dots-item" onclick="currentSlide(5)"></span>
                            </div>
                        </div>
                    </div>
                    <div class="banner__container-right hide-on-mobile-tablet">
                        <div class="container__right-links ">
                            <a href="#" class="right__links-items">
                                <img src="{{asset('Tiki/assets/img/banner_right_1.png')}}" alt="banner_right_1">
                            </a>
                        </div>
                    </div>
                </div>
                <div class="home__deal">
                    <div class="home__deal-items">
                        <div class="deal__items-header">
                            <div class="items__header-img">
                                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/giasoc.svg" alt="">
                                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/dealFlashIcon.svg" alt="">
                                <img src="https://frontend.tikicdn.com/_desktop-next/static/img/homnay.svg" alt="">
                            </div>
                            <div class="items__header-navigation"></div>
                        </div>
                        <div class="deal__items-body">
                            <div class="items__body-lists">
                                <div class="owl-one owl-carousel owl-theme">
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_1.jpg')}}" alt="product_deal_1">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_2.png')}}" alt="product_deal_2">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_3.png')}}" alt="product_deal_3">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_4.jpg')}}" alt="product_deal_4">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_5.jpg')}}" alt="product_deal_5">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_6.png')}}" alt="product_deal_6">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_7.jpg')}}" alt="product_deal_7">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_8.jpg')}}" alt="product_deal_8">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_9.png')}}" alt="product_deal_9">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="owl-carousel-item">
                                        <a href="" class="items__body-links">
                                            <div class="body__links-item">
                                                <img src="{{asset('Tiki/assets/img/product_deal_10.jpg')}}" alt="product_deal_10">
                                            </div>
                                            <div class="body__links-price">
                                                <span>419.000đ</span>
                                                <span class="links__price-discount">-43%</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                
                <div class="brand__static">
                    <div class="brand__static-widget">
                        <div class="static__widget-header">
                            <div class="widget__header-title">
                                <img src="https://salt.tikicdn.com/ts/upload/ab/97/b1/a7c6657740248d396b100bc2330e98b8.png" alt="">
                                <div class="header__title-text">
                                    Thương Hiệu Chính Hãng
                                </div>
                            </div>
                            <a href="" class="widget__header-seemore">XEM THÊM</a>
                        </div>
                        <div class="static__widget-body">
                            <div class="owl-two owl-carousel owl-theme">
                                <div class="widget__body-item"><img src="{{asset('Tiki/assets/img/banner_1.png')}}"></div>
                                <div class="widget__body-item"><img src="{{asset('Tiki/assets/img/banner_2.png')}}"></div>
                                <div class="widget__body-item"><img src="{{asset('Tiki/assets/img/banner_3.png')}}"></div>
                                <div class="widget__body-item"><img src="{{asset('Tiki/assets/img/banner_4.png')}}"></div>
                            </div>
                        </div>
                        <div class="static__widget-bottom">
                            <div class="owl-three owl-carousel owl-theme">
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/c1/db/87/2e74bffc5bdefa11bd6ede11de350dae.png.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/9f/44/40/72de3feb1247ff8da01b7a2b1b19c066.jpg.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/e5/7b/e0/e288c3de52969e6ca2bcbeb76ccc08c4.png.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/98/e0/5a/e233236aab3eebbb244817b55e4874a4.png.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/ae/f2/3f/4fd826c3e05596d2c236654d859cdc60.png.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                                <div class="widget__bottom-item">
                                    <a href="" class="bottom__item-links">
                                        <div class="item__links-img">
                                            <img src="https://salt.tikicdn.com/cache/w200/ts/banner/c1/d7/75/5ded01faef8c96581ae3e20bd932cf4c.png.webp" alt="product_deal_8">
                                        </div>
                                        <p class="item__links-text">Voucher Đến 1 Triệu </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hot__category">
                    <div class="hot__category-header">
                        Danh Mục Nổi Bật
                    </div>
                    <div class="hot__category-body">
                        @foreach ($category as $cat)
                        <a href="{{route('category.product',['slug'=>$cat->slug,'id'=>$cat->id])}}" class="hot__category-item">
                            <img src="{{$cat->photo_url}}" alt="">
                            <span>{{$cat->name}}</span>
                        </a>
                        @endforeach
                    </div>
                </div>
                
                
                <div class="home__main">
                    <div class="home__main-container">
                        <div class="home__main-header" style="position:sticky;top:0">
                            <div class="main__header-title">Gợi Ý Hôm Nay</div>
                            
                        </div>
                        <div class="home__main-body">
                            <div class="row sm-gutter">
                                @foreach ($products as $product)
                                <div class="col l-2-4 m-4 c-6" >
                                    <a class="main__body-item" href="{{route('product.detail',['id'=>$product->id])}}">
                                        <div class="body__item-img">
                                        <img  src="{{ $product->feature_image_path }}" alt="">
                                        </div>
                                        <h4 class="body__item-name">{{$product->name}}</h4>
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
                                            <span class="item__price-discount">{{ number_format($product->price) }} đ</span>
                                            <span class="item__price-discount-percent">10%</span>
                                        </div>
                                    </a>
                                </div>   
                                @endforeach
                            </div>
                            <a href="" class="main__body-seemore">XEM THÊM</a>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
@endsection