<div class="category-tab">
  <!--category-tab-->
  <div class="col-sm-12">
    <ul class="nav nav-tabs">
      @foreach($category_tabs as $indexCategory=> $categoryItem)
      <li class="{{$indexCategory==0?'active':''}}"><a href="#category_tab_{{$categoryItem->id}}"
          data-toggle="tab">{{$categoryItem->name}}</a>
      </li>
      @endforeach
    </ul>
  </div>
  <div class="tab-content">
    @foreach($category_tabs as $indexCategoryProduct=>$categoryItemProduct)
    <div class="tab-pane fade {{$indexCategoryProduct==0?'active in':''}}"
      id="category_tab_{{$categoryItemProduct->id}}">
      @foreach($categoryItemProduct->products as $productItemTabs)
      <div class="col-sm-3">
        <div class="product-image-wrapper">
          <div class="single-products">
            <div class="productinfo text-center">
              <a href="{{route('product.detail',['id'=>$productItemTabs->id])}}"><img
                  src="{{$productItemTabs->feature_image_path}}" alt="" /></a>
              <h2>{{number_format($productItemTabs->price)}} đ</h2>
              <p>{{$productItemTabs->name}}</p>
              <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
            </div>

          </div>
        </div>
      </div>
      @endforeach
    </div>
    @endforeach
  </div>
</div>