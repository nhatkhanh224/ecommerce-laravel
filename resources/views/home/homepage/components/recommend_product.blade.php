<div class="recommended_items">
          <!--recommended_items-->
          <h2 class="title text-center">recommended items</h2>


          <div class="col-md-12">
            <div class="owl-carousel owl-theme">
              @foreach($productsRecommended as $product)
              <div class="item">
                <div class="productinfo text-center">
                  <img src="{{$product->feature_image_path}}" alt="" />
                  <h2>{{number_format($product->price)}} đ</h2>
                  <p>{{$product->name}}</p>
                  <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                </div>
              </div>
              @endforeach

            </div>
          </div>

        </div>