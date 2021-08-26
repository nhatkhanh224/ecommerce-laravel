@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
@endsection



@section('content')

<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
  <form action="" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            @csrf
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên sản phẩm">
            </div>

            <div class="form-group">
              <label>Chọn danh mục cha</label>
              <select class="form-control select2_init" name="parent_id">
                <option value="0">Chọn danh mục cha</option>
                {!! $htmlOption !!}
              </select>
            </div>

            <label>Nhập tags cho sản phẩm</label>
            <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

            </select>

            <div class="form-group">
              <label>Giá sản phẩm</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập giá sản phẩm">
            </div>

            <div class="form-group">
              <label>Ảnh đại diện</label>
              <input type="file" class="form-control-file" name="feature_image_path" placeholder="Nhập ảnh sản phẩm">
            </div>
            <div class="form-group">
              <label>Ảnh chi tiết</label>
              <input type="file" multiple class="form-control-file" name="image_path[]"
                placeholder="Nhập ảnh chi tiết sản phẩm">
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Nhập nội dung</label>
              <textarea id="my-editor" name="content" class="form-control" rows="8" placeholder=""></textarea>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </form>

</div>

@endsection

@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
<script>
var options = {
  filebrowserImageBrowseUrl: '/filemanager?type=Images',
  filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
  filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
};
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>

<script src="{{asset('product/add/add.js')}}"></script>

@endsection