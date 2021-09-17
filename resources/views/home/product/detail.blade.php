@extends('layouts.home')
@section('title')
<title>Homepage</title>
@endsection
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
// function addToCart(e) {
//   e.preventDefault();
//   let urlCart = $(this).data("url");
//   $.ajax({
//     type: "GET",
//     url: urlCart,
//     dataType: "json",
//     success: function(data) {
//       console.log(data);
//     },
//     error: function(data) {
//       alert('error');
//     }

//   });
// }
$('.cart').click(function(e) {
  e.preventDefault();
  let urlCart = $(this).data("url");
  $.ajax({
    type: 'GET',
    url: urlCart,
    success: function(result) { //we got the response
      
    },
    error: function(jqxhr, status, exception) {
      alert('Exception:', exception);
    }
  })
})
</script>
@endsection
@section('content')
<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Category</h2>
          @include('home.components.sidebar')
        </div>
      </div>

      <div class="col-sm-9 padding-right">
        <div class="product-details">
          <!--product-details-->
          <div class="col-sm-6">
            <div class="product-detail-image">
              <img id="zoom" src="{{$product_details->feature_image_path}}"
                data-zoom-image="{{$product_details->feature_image_path}}">
            </div>
            <div class="product-detail-image-sub">
              @foreach($product_images as $image)
              <img id="{{$image->id}}" onclick="changeImage('{{$image->id}}')" src="{{$image->image_path}}" alt="">
              @endforeach
            </div>
          </div>
          <div class="col-sm-6">
            <div class="product-information">
              <!--/product-information-->
              <img src="images/product-details/new.jpg" class="newarrival" alt="" />
              <h2>{{$product_details->name}}</h2>
              <p>Web ID: {{$product_details->id}}</p>
              <img src="images/product-details/rating.png" alt="" />
              <span>
                <span>{{number_format($product_details->price)}} đ</span>
                <label>Quantity:</label>
                <input type="text" value="1" />
                <a href="#" data-url="{{route('addToCart',['id'=>$product_details->id])}}" class="btn btn-fefault cart">
                  <i class="fa fa-shopping-cart"></i>
                  Add to cart
                </a>
              </span>
              <p><b>Availability:</b> In Stock</p>
              <p><b>Condition:</b> New</p>
              <p><b>Brand:</b> E-SHOPPER</p>
              <a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
            </div>
            <!--/product-information-->
          </div>
        </div>
        <!--/product-details-->

        <div class="category-tab shop-details-tab">
          <!--category-tab-->
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li><a href="#details" data-toggle="tab">Details</a></li>
              <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
              <li><a href="#tag" data-toggle="tab">Tag</a></li>
              <li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade" id="details">

            </div>

            <div class="tab-pane fade" id="companyprofile">

            </div>

            <div class="tab-pane fade" id="tag">

            </div>

            <div class="tab-pane fade active in" id="reviews">
              <div class="col-sm-12">
                <ul>
                  <li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
                  <li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
                  <li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
                </ul>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum
                  dolore eu fugiat nulla pariatur.</p>
                <p><b>Write Your Review</b></p>

                <form action="#">
                  <span>
                    <input type="text" placeholder="Your Name" />
                    <input type="email" placeholder="Email Address" />
                  </span>
                  <textarea name=""></textarea>
                  <b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
                  <button type="button" class="btn btn-default pull-right">
                    Submit
                  </button>
                </form>
              </div>
            </div>

          </div>
        </div>
        <!--/category-tab-->

        @include('home.homepage.components.recommend_product')
        <!--/recommended_items-->

      </div>
    </div>
  </div>
</section>
@endsection