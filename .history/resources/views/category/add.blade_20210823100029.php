@extends('layouts.admin')

@section('title')
<title>Add Category</title>
@endsection

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
<!-- Content Header (Page header) -->
@include('partials.content-header', ['name' => 'Home', 'key' => 'home'])
    <!-- /.content-header -->

  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <form>
            <div class="form-group">
              <label for="exampleInputEmail1">Nhập tên danh mục</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                placeholder="Nhập tên danh mục">

            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Chọn danh mục cha</label>
              <select class="form-control" id="exampleFormControlSelect1">
                <option>Chọn danh mục cha</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>

      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
  <div class="p-3">
    <h5>Title</h5>
    <p>Sidebar content</p>
  </div>
</aside>
@endsection