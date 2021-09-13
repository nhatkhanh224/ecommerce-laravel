@extends('layouts.home')
@section('title')
<title>Homepage</title>
@endsection
@section('content')

@include('home.homepage.components.slider')
<section id="homepage-content">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Category</h2>
          @include('home.components.sidebar')


          <div class="shipping text-center">
            <!--shipping-->
            <img src="{{asset('Eshopper/images/home/shipping.jpg')}}" alt="" />
          </div>
          <!--/shipping-->

        </div>
      </div>

      <div class="col-sm-9 padding-right">
        @include('home.homepage.components.feature_product')
        <!--features_items-->

        @include('home.homepage.components.category_tab')
        <!--/category-tab-->

        @include('home.homepage.components.recommend_product')
        <!--/recommended_items-->

      </div>
    </div>
  </div>
</section>
@endsection