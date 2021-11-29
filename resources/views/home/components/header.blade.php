
<header class="header">
<div class="grid wide">
    <!-- Start header search -->
    <div class="header__search">
      <div class="header__search-logo">
        <div class="search__logo-left">
          <div class="logo__left-menu">
            <div class="style__logo hide-on-mobile-tablet">
              <a href="{{route('homepage.index')}}" class="style__logo-icon">
                <img src="{{asset('Tiki/assets/img/logo.png')}}" alt="logo">
              </a>
            </div>
            <div class="style__wrapper">
              <a href="#" class="style__wrapper-menu">
                <img src="{{asset('Tiki/assets/img/header__menu.png')}}" alt="header__menu" class="wrapper__menu-logo">
                <div class="wrapper__menu-list hide-on-mobile-tablet">
                  <span>Danh Mục</span>
                  <span class="wrapper__text">Sản Phẩm
                    <img src="{{asset('Tiki/assets/img/drop_icon.png')}}" alt="drop_icon">
                  </span>
                </div>
              </a>
              <div class="style__wrapper-nav">
                <ul class="wrapper__nav-lists">
                  @foreach($category as $category)
                  <li class="wrapper__nav-items">
                    <a href="{{route('category.product',['slug'=>$category->slug,'id'=>$category->id])}}"
                      class="nav__items-links">

                      <span class="nav__items-text">{{$category->name}}</span>
                    </a>
                    <div class="nav__items-submenu hide-on-mobile">
                      <ul>
                        @foreach($category->categoryChildren as $child)
                        <li class="items__submenu-lists">
                          <ul>
                            <li class="submenu__lists-items"><a
                                href="{{route('category.product',['slug'=>$child->slug,'id'=>$child->id])}}"
                                class="nav__items-links">{{$child->name}}</a></li>
                          </ul>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
          <label for="mobile-search-checkbox" class="logo__left-mobile-search">
            <i class="mobile__search-icon fas fa-search"></i>
          </label>
          <input type="checkbox" hidden id="mobile-search-checkbox" class="logo__left-checkbox">
          <form action="{{route('search')}}" method="post" class="logo__left-search">
            @csrf
            <div class="left__search-form">
              <input type="text" class="search__form-input"
                placeholder="Tìm sản phẩm, danh mục hoặc thương hiệu mong muốn..." name="key">
              <button class="search__form-btn"><img src="{{asset('Tiki/assets/img/search_icon.png')}}" alt="search"
                  class="form__btn-icon">Tìm Kiếm</button>
            </div>
          </form>

        </div>

        <div class="search__logo-right">
          <div class="logo__right-user">
            <button class="right__user-logobtn" id="right__user-logobtn">
              <img src="{{asset('Tiki/assets/img/logo_user.png')}}" alt="logo" class="right__user-icon">
            </button>
            @if(!Auth::check())
            <button class="right__user-text hide-on-mobile-tablet" id="right__user-btn">
              <span class="user__text-login">Đăng Nhập / Đăng Ký</span>
              <span class="user__text-label">
                <span>Tài Khoản</span>
                <img src="{{asset('Tiki/assets/img/drop_icon.png')}}" alt="drop_icon">
              </span>
            </button>
            @else
            <button class="right__user-text hide-on-mobile-tablet" id="right__user-btn">
              <span class="user__text-login">Tài khoản</span>
              <span style="position: relative;" class="user__text-label">
                <span>{{$name}}</span>
                <img src="{{asset('Tiki/assets/img/drop_icon.png')}}" alt="drop_icon">
                <ul class="profile">
                  <li class="profile_item"><a href="">Đơn hàng của tôi</a></li>
                  <li class="profile_item"><a href="">Thông báo của tôi</a></li>
                  <li class="profile_item"><a href="">Tài khoản của tôi</a></li>
                  <li class="profile_item"><a href="{{route('admin.logout')}}">Thoát tài khoản</a></li>
                </ul>
              </span>
            </button>
            @endif
            <!-- <div class="right__user-modal" id="right__user-modal">
              <div class="right__modal-content">
                <button class="modal__btn-close">
                  <img src="https://salt.tikicdn.com/ts/upload/fe/20/d7/6d7764292a847adcffa7251141eb4730.png')}}"
                    alt="">
                </button>
                <div class="modal__content-left">
                  <div class="content__left-container">
                    <div class="content__left-heading">
                      <h4>Xin chào,</h4>
                      <p>Đăng nhập hoặc Tạo tài khoản</p>
                    </div>
                    <form action="">
                      <div class="left__heading-input">
                        <input type="tel" name="tel" placeholder="Số điện thoại">
                      </div>
                      <button>Tiếp tục</button>
                    </form>
                    <button class="content__left-email" id="content__left-email">Đăng nhập bằng email</button>
                    <div class="content__left-social">
                      <p class="left__social-heading">Hoặc tiếp tục bằng</p>
                      <ul class="left__social-links">
                        <li class="left__social-item">
                          <img
                            src="https://salt.tikicdn.com/ts/upload/3a/22/45/0f04dc6e4ed55fa62dcb305fd337db6c.png')}}"
                            alt="fb">
                        </li>
                        <li class="left__social-item">
                          <img
                            src="https://salt.tikicdn.com/ts/upload/1c/ac/e8/141c68302262747f5988df2aae7eb161.png')}}"
                            alt="gg">
                        </li>
                        <li class="left__social-item">
                          <img
                            src="https://salt.tikicdn.com/ts/upload/98/37/86/517cfc05f04466b3118357a1fb4182c8.png')}}"
                            alt="zalo">
                        </li>
                      </ul>
                      <p class="left__social-note">Bằng việc tiếp tục, bạn đã chấp nhận
                        <a href="">Điều khoản sử dụng</a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="modal__content-right hide-on-mobile">
                  <img src="https://salt.tikicdn.com/ts/upload/eb/f3/a3/25b2ccba8f33a5157f161b6a50f64a60.png')}}"
                    alt="">
                  <div class="content__right-text">
                    <h4>Mua sắm tại tiki</h4>
                    <span>Ưu đãi mỗi ngày</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="login__email-modal" id="login__email-modal">
              <div class="email__modal-content">
                <button class="modal__btn-close" id="modal__btn-close2">
                  <img src="https://salt.tikicdn.com/ts/upload/fe/20/d7/6d7764292a847adcffa7251141eb4730.png')}}"
                    alt="">
                </button>
                <div class="email__modal-left">
                  <div class="email__modal-container">
                    <button class="modal__btn-back" id="modal__btn-back">
                      <img src="https://salt.tikicdn.com/ts/upload/0b/43/2f/7c7435e82bce322554bee648e748c82a.png')}}"
                        alt="">
                    </button>
                    <div class="email__modal-heading">
                      <h4>Đăng nhập bằng email</h4>
                      <p>Nhập email và mật khẩu tài khoản Tiki</p>
                    </div>
                    <form action="">
                      <div class="email__modal-input">
                        <input type="text" placeholder="abc@gmail.com">
                      </div>
                      <div class="email__modal-input">
                        <input type="password" id="input__password" placeholder="Mật khẩu">
                      </div>
                      <div class="email__modal-showpass">
                        <input type="checkbox" onclick="myFunctionshowpass()">
                        <p>Show pass</p>
                      </div>
                      <button>Đăng nhập</button>
                    </form>
                    <p class="email__modal-forgotpass">Quên mật khẩu?</p>
                    <p class="email__modal-createacc">
                      Chưa có tài khoản?
                      <span>Tạo tài khoản</span>
                    </p>
                  </div>
                </div>
                <div class="modal__content-right hide-on-mobile">
                  <img src="https://salt.tikicdn.com/ts/upload/eb/f3/a3/25b2ccba8f33a5157f161b6a50f64a60.png')}}"
                    alt="">
                  <div class="content__right-text">
                    <h4>Mua sắm tại tiki</h4>
                    <span>Ưu đãi mỗi ngày</span>
                  </div>
                </div>
              </div>
            </div> -->
            <!--  -->
            <!-- <div class="right__user-dropdown">
                                    <button class="user__dropdown-btn">Đăng nhập</button>
                                    <button class="user__dropdown-btn">Đăng kí</button>
                                    <button class="user__dropdown-socialfb">
                                        <span><i class="fab fa-facebook-f"></i></span>
                                        Đăng nhập bằng Facebook
                                    </button>
                                    <button class="user__dropdown-socialgg">
                                        <span><i class="fab fa-google-plus-g"></i></span>
                                        Đăng nhập bằng Google+
                                    </button>
                                </div> -->
          </div>
          <div class="logo__right-cart">
            <a href="{{route('cart')}}" class="right__cart-list">
              <div class="right__cart-item">
                <div class="cart__item-wrapper">
                  <img src="{{asset('Tiki/assets/img/cart_icon.png')}}" alt="cart">
                  <span class="item__wrapper-circle">{{$count_cart}}</span>
                </div>
                <span class="cart__item-text hide-on-mobile">Giỏ Hàng</span>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <!-- End header search -->
    <!-- Start header navbar -->
    <nav class="header__navbar hide-on-mobile-tablet">
      <div class="header__navbar-menu">
        <a href="#" class="navbar__menu-icon">
          <img src="{{asset('Tiki/assets/img/navbar_logo.png')}}" alt="navbar_logo">
        </a>



      </div>
    </nav>
    <!-- End header navbar -->
  </div>
</header>