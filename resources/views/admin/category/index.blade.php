@extends('layouts.admin')

@section('title')
<title>Admin</title>
@endsection

@section('content')
<div class="content-wrapper">

  @include('partials.content-header', ['name' => 'Category', 'key' => 'Home'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
        @can('category-add')
          <a href="{{route('categories.create')}}" class="btn btn-success float-right m-2">Add</a>
          @endcan
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên danh mục</th>
                <th scope="col">Ảnh đại diện (cho Mobile) </th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($categories as $category)
              <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td><img style="width:100px" src="{{$category->photo_url}}" alt=""></td>
                <td>
                  @can('category-edit')
                  <a href="{{route('categories.edit',['id'=>$category->id])}}" class="btn btn-default">Edit</a>
                  @endcan
                  @can('category-delete')
                  <a href="{{route('categories.delete',['id'=>$category->id])}}" class="btn btn-danger">Delete</a>
                  @endcan
                </td>

              </tr>
              @endforeach

            </tbody>
          </table>
        </div>
        <div class="col-md-12">
          {{$categories->links()}}
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