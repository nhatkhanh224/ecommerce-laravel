@extends('layouts.admin')

@section('title')
<title>Admin</title>
@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('admins/product/index/list.css') }}">
@endsection

@section('content')
<div class="content-wrapper">

  @include('partials.content-header', ['name' => 'Product', 'key' => 'Home'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('products.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên sản phẩm</th>
                <th scope="col">Giá</th>
                <th scope="col">Hình ảnh</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($products as $productItem)
              <tr>
                <th scope="row">{{ $productItem->id  }}</th>
                <td>{{ $productItem->name }}</td>
                <td>{{ number_format($productItem->price) }}</td>
                <td>
                  <img class="product_image_150_100" src="{{ $productItem->feature_image_path }}" alt="">
                </td>
                <td>{{ optional($productItem->category)->name }}</td>
                <td>
                  <a href="" class="btn btn-default">Edit</a>
                  <a href="" data-url=""
                    class="btn btn-danger action_delete">Delete</a>

                </td>
              </tr>
              @endforeach


            </tbody>
          </table>
        </div>
        <div class="col-md-12">
        {{ $products->links() }}
        </div>
      </div>

    </div>
  </div>

</div>



<aside class="control-sidebar control-sidebar-dark">

  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
@endsection