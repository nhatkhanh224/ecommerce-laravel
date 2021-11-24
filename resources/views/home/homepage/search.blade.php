@extends('layouts.home')
@section('content')
<div class="search__page-container">
            <div class="grid wide">
                <div class="row sm-gutter app__content">
                    <div class="col l-2 m-0 c-0">
                        <div class="search__page-left">
                            <nav class="search__page-category">
                                <h3 class="page__category-heading">DANH MỤC SẢN PHẨM</h3>
                                <ul class="page__category-list">
                                    <li class="page__category-item">
                                        <a href="#" class="category__item-link">Điện Thoại SmartPhone</a>
                                    </li>
                                    <li class="page__category-item">
                                        <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại Samsung</a>
                                    </li>
                                    <li class="page__category-item">
                                        <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại iPhone</a>
                                    </li>
                                    <li class="page__category-item">
                                        <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại Oppo</a>    
                                    </li>
                                    <li class="page__category-item">
                                        <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại Xiaomi</a>
                                    </li>
                                    <span id="dots2"></span>
                                    <div class="page__category-seemore" id="page__category-seemore">
                                        <li class="page__category-item">
                                            <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại Oppo</a>    
                                        </li>
                                        <li class="page__category-item">
                                            <a href="#" class="category__item-link">Bao Da - Ốp Lưng Điện Thoại Xiaomi</a>
                                        </li>
                                    </div>
                                    <button onclick="myFunction2()" id="categoty__seemore-btn" class="categoty__seemore-btn">Xem thêm</button>
                                </ul>
                            </nav>
                            <div class="search__page-delivery">
                                <h4 class="page__delivery-head">ĐỊA CHỈ NHẬN HÀNG</h4>
                                <span>Bạn muốn giao hàng đến đâu?</span>
                                <button class="page__delivery-btn" id="delivery__btn">NHẬP ĐỊA CHỈ</button>
    
                                <div id="delivery__modal" class="delivery__modal">
                                    <!-- Modal content -->
                                        <div class="delivery__modal-content">
                                            <button class="dmodal__content-btn">
                                                <img src="https://salt.tikicdn.com/ts/upload/fe/20/d7/6d7764292a847adcffa7251141eb4730.png" alt="">
                                            </button>
                                            <div class="dmodal__content-header">
                                                <p>Địa chỉ giao hàng</p>
                                            </div>
                                            <div class="dmodal__content-body">
                                                <p class="dcontent__body-description">
                                                    Hãy chọn địa chỉ nhận hàng để được dự báo thời gian giao hàng cùng phí đóng gói, vận chuyển một cách chính xác nhất.
                                                </p>
                                                <div class="dcontent__body-login">
                                                    <button id="back__login-btn">Đăng nhập để chọn địa chỉ giao hàng</button>
                                                    <div>
                                                        <p>hoặc</p>
                                                    </div>
                                                </div>
                                                <div class="dcontent__body-label">
                                                    <span>Chọn khu vực giao hàng</span>
                                                </div>
                                                <div class="dcontent__body-location">
                                                    <div class="body__location-cities">
                                                        <label for="cities">Tỉnh/Thành Phố</label>
                                                        <select name="cities" id="cities">
                                                            <option value="">Chọn Tỉnh/Thành Phố</option>
                                                            <option value="hanoi">Hà Nội</option>
                                                            <option value="hue">Huế</option>
                                                            <option value="danang">Đà Nẵng</option>
                                                            <option value="quangnam">Quảng Nam</option>
                                                            <option value="tphcm">Tp. HCM</option>
                                                        </select>
                                                    </div>
                                                    <div class="body__location-districts">
                                                        <label for="districts">Quận/Huyện</label>
                                                        <select name="districts" id="cities">
                                                            <option value="">Chọn Quận/Huyện</option>
                                                            <option value="hanoi">Hà Nội</option>
                                                            <option value="hue">Huế</option>
                                                            <option value="danang">Đà Nẵng</option>
                                                            <option value="quangnam">Quảng Nam</option>
                                                            <option value="tphcm">Tp. HCM</option>
                                                        </select>
                                                    </div>
                                                    <div class="body__location-wards">
                                                        <label for="wards">Phường/Xã</label>
                                                        <select name="wards" id="cities">
                                                            <option value="">Chọn Phường/Xã</option>
                                                            <option value="hanoi">Hà Nội</option>
                                                            <option value="hue">Huế</option>
                                                            <option value="danang">Đà Nẵng</option>
                                                            <option value="quangnam">Quảng Nam</option>
                                                            <option value="tphcm">Tp. HCM</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="dmodal__content-footer">
                                                <button class="content__footer-btn">GIAO ĐẾN ĐỊA CHỈ NÀY</button>
                                            </div>
                                        </div>
                                    </div>
                                <!-- --------------Delivery if login? ------------- -->
    
                                            <!-- <div id="delivery__modal" class="delivery__modal">
                                                    <div class="delivery__modal-content">
                                                        <button class="dmodal__content-btn">
                                                            <img src="https://salt.tikicdn.com/ts/upload/fe/20/d7/6d7764292a847adcffa7251141eb4730.png" alt="">
                                                        </button>
                                                        <div class="dmodal__content-header">
                                                            <p>Địa chỉ giao hàng</p>
                                                        </div>
                                                        <div class="dmodal__content-body">
                                                            <div class="dcontent__body-label">
                                                                <span>Chọn khu vực giao hàng</span>
                                                            </div>
                                                            <div class="dcontent__body-location">
                                                                <div class="body__location-cities">
                                                                    <label for="cities">Tỉnh/Thành Phố</label>
                                                                    <select name="cities" id="cities">
                                                                        <option value="">Chọn Tỉnh/Thành Phố</option>
                                                                        <option value="hanoi">Hà Nội</option>
                                                                        <option value="hue">Huế</option>
                                                                        <option value="danang">Đà Nẵng</option>
                                                                        <option value="quangnam">Quảng Nam</option>
                                                                        <option value="tphcm">Tp. HCM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="body__location-districts">
                                                                    <label for="districts">Quận/Huyện</label>
                                                                    <select name="districts" id="cities">
                                                                        <option value="">Chọn Quận/Huyện</option>
                                                                        <option value="hanoi">Hà Nội</option>
                                                                        <option value="hue">Huế</option>
                                                                        <option value="danang">Đà Nẵng</option>
                                                                        <option value="quangnam">Quảng Nam</option>
                                                                        <option value="tphcm">Tp. HCM</option>
                                                                    </select>
                                                                </div>
                                                                <div class="body__location-wards">
                                                                    <label for="wards">Phường/Xã</label>
                                                                    <select name="wards" id="cities">
                                                                        <option value="">Chọn Phường/Xã</option>
                                                                        <option value="hanoi">Hà Nội</option>
                                                                        <option value="hue">Huế</option>
                                                                        <option value="danang">Đà Nẵng</option>
                                                                        <option value="quangnam">Quảng Nam</option>
                                                                        <option value="tphcm">Tp. HCM</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="dmodal__content-footer">
                                                            <button class="content__footer-btn">GIAO ĐẾN ĐỊA CHỈ NÀY</button>
                                                        </div>
                                                    </div>
                                            </div> -->
    
                                <!-- ---------------End Delivery if login-------------------------- -->
                            </div>
                            <div class="search__page-service">
                                <h4 class="page__service-head">DỊCH VỤ</h4>
                                <label for="" class="page__service-label">
                                    <input type="checkbox">
                                    <div class="service__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Giao Hàng Siêu Tốc 24h</span>
                                    </div>
                                </label>
                                <label for="" class="page__service-label">
                                    <input type="checkbox">
                                    <div class="service__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Không Giới Hạn</span>
                                    </div>
                                </label>
                                <label for="" class="page__service-label">
                                    <input type="checkbox">
                                    <div class="service__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Rẻ Hơn Hoàn Tiền</span>
                                    </div>
                                </label>
                            </div>
                            <div class="search__page-location">
                                <h4 class="page__location-head">NƠI BÁN</h4>
                                <label for="" class="page__location-label">
                                    <input type="checkbox">
                                    <div class="location__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Hà Nội</span>
                                    </div>
                                </label>
                                <label for="" class="page__location-label">
                                    <input type="checkbox">
                                    <div class="location__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Hồ Chí Minh</span>
                                    </div>
                                </label>
                                <label for="" class="page__location-label">
                                    <input type="checkbox">
                                    <div class="location__label-wrap">
                                        <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                        <span>Đà Nẵng</span>
                                    </div>
                                </label>
                                <span id="dots3"></span>
                                <div class="page__location-seemore" id="page__location-seemore">
                                    <label for="" class="page__location-label">
                                        <input type="checkbox">
                                        <div class="location__label-wrap">
                                            <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                            <span>Quảng Bình</span>
                                        </div>
                                    </label>
                                    <label for="" class="page__location-label">
                                        <input type="checkbox">
                                        <div class="location__label-wrap">
                                            <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                            <span>Quảng Trị</span>
                                        </div>
                                    </label>
                                    <label for="" class="page__location-label">
                                        <input type="checkbox">
                                        <div class="location__label-wrap">
                                            <!-- <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt=""> -->
                                            <span>Quảng Nam</span>
                                        </div>
                                    </label>
                                </div>
                                <button onclick="myFunction3()" id="location__seemore-btn" class="location__seemore-btn">Xem thêm</button>
                            </div>
                            <div class="search__page-rating">
                                <h4 class="page__rating-head">ĐÁNH GIÁ</h4>
                                <a href="#" class="page__rating-star">
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <span>Từ 5 sao</span>
                                </a>
                                <a href="#" class="page__rating-star">
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star"></i>
                                    <span>Từ 4 sao</span>
                                </a>
                                <a href="#" class="page__rating-star"> 
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star star--gold"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span>Từ 3 sao</span>
                                </a>
                            </div> 
                            <div class="search__page-price">
                                <h4 class="page__price-head">GIÁ</h4>
                                <a href="#" class="page__price-label">
                                    <span>Dưới 4.000.000đ</span>
                                </a>
                                <a href="#" class="page__price-label">
                                    <span>Từ 4 triệu đến 9 triệu</span>
                                </a>
                                <a href="#" class="page__price-label">
                                    <span>Từ 9 triệu đến 27 triệu</span>
                                </a>
                                <a href="#" class="page__price-label">
                                    <span>Trên 27.000.000đ</span>
                                </a>
                                <span class="page__price-text">Chọn Khoảng Giá</span>
                                <div class="page__price-range">
                                    <input type="text" value="0">
                                    <span>-</span>
                                    <input type="text" value="0">
                                </div>
                                <button class="page__price-btn">Áp Dụng</button>
                            </div>
                            <div class="search__page-ship">
                                <h4 class="page__ship-head">GIAO HÀNG</h4>
                                <form action="">
                                    <div class="page__ship-label">
                                        <input type="radio" id="noidia" name="ship__form" value="noidia">
                                        <label for="">Hàng Nội Địa</label><br>
                                    </div>
                                    <div class="page__ship-label">
                                        <input type="radio" id="quocte" name="ship__form" value="quocte">
                                        <label for="">Hàng Quốc Tế</label><br>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- -------------Main Prodcut------------- -->
                    <div class="col l-10 m-12 c-12 bgwcolor">
                        <div class="home__filter-label">
                            <span>Điện Thoại - Máy Tính Bảng</span>
                        </div>
                        <div class="home__slider">
                            <div class="home__slider-item">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/1c/2b/01/909834d84ed627736ca73490df11f5fb.png.webp" style="width:100%">
                            </div>
                            <div class="home__slider-item">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/84/db/3a/1966b57b291c803e94b648f16be2274b.jpg.webp" style="width:100%">
                            </div>
                            <div class="home__slider-item">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/96/ef/13/ae9576c25c8b41755f68893df97d52cd.png.webp" style="width:100%">
                            </div>
                            <div class="home__slider-item">
                                <img src="https://salt.tikicdn.com/cache/w1080/ts/banner/11/79/05/aac4c754d640928b776cbf22e9dc29b5.jpg.webp" style="width:100%">
                            </div>
                            <a class="home__slider-prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="home__slider-next" onclick="plusSlides(1)">&#10095;</a>
                        </div>

                        <div class="search__home-filter hide-on-mobile-tablet">
                            <button class="home__filter-btn btn--active">Phổ Biến</button>
                            <button class="home__filter-btn">Bán Chạy</button>
                            <button class="home__filter-btn">Hàng Mới</button>
                            <button class="home__filter-btn">Giá Thấp</button>
                            <button class="home__filter-btn">Giá Cao</button>
                        </div>
                        <div class="search__home-img">
                            <p class="shome__img-item">
                                <img src="https://salt.tikicdn.com/ts/upload/f9/ad/0e/a8a97f5ac7661d637942b42796893662.png" alt="img">
                            </p>
                            <p class="shome__img-item">
                                <img src="https://salt.tikicdn.com/ts/upload/af/84/fc/2037c3b93a81767aed21358ebf3f8b8e.png" alt="img">
                            </p>
                        </div>
                        <div class="search__home-product">
                            <div class="row sm-gutter">
																@foreach($products as $product)
                                <div class="col l-2-4 m-4 c-6" >
                                    <a class="home__product-item" href="{{route('product.detail',['id'=>$product->id])}}">
                                        <div class="product__item-img">
                                            <img src="{{$product->feature_image_path}}" alt="img">
                                        </div>
                                        <h4 class="product__item-name">{{$product->name}}</h4>
                                        <div class="product__item-action">
                                            
                                            <!-- <span class="product__item-sold">88 Đã bán</span> -->
                                        </div>
                                        <div class="product__item-price">
                                            <span class="item__price-discount">{{number_format($product->price)}} đ</span>
                                            
                                        </div>
                                        <div class="product__item-bot--img">
                                            <img src="https://salt.tikicdn.com/ts/upload/51/ac/cc/528e80fe3f464f910174e2fdf8887b6f.png" alt="">
                                        </div>
                                        
                                    </a>
                                </div>
                                @endforeach
                            </div>
                            <ul class="pagination home__product-pagination">
														{{ $products->links() }}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection