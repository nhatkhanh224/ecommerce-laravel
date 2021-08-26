@extends('layouts.admin')

@section('title')
<title>Admin</title>
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
              

            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          
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