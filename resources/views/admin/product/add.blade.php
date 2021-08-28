@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{asset('admins/product/add/add.css')}}" rel="stylesheet" />
@endsection



@section('content')

<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Product', 'key' => 'Add'])
  <div class="col-md-12">
    <!-- @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
    @endif -->
  </div>

  <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">

            @csrf
            <div class="form-group">
              <label>Tên sản phẩm</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Nhập tên sản phẩm" value="{{ old('name') }}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>
            <div class="form-group">
              <label>Giá sản phẩm</label>
              <input type="text" class="form-control @error('price') is-invalid @enderror" name="price"
                placeholder="Nhập giá sản phẩm" value="{{ old('price') }}">
              @error('price')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Ảnh đại diện</label>
              <input type="file" class="form-control-file" name="feature_image_path">
            </div>

            <div class="form-group">
              <label>Ảnh chi tiết</label>
              <input type="file" multiple class="form-control-file mb-2 preview_image_detail" name="image_path[]">
              <div class="row image_detail_wrapper">

              </div>

            </div>


            <div class="form-group">
              <label>Chọn danh mục</label>
              <select class="form-control select2_init @error('category_id') is-invalid @enderror" name="category_id">
                <option value="">Chọn danh mục</option>
                {!! $htmlOption !!}
              </select>
              @error('category_id')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Nhập tags cho sản phẩm</label>
              <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">

              </select>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Nhập nội dung</label>
                <textarea id="my-editor" name="contents" class="@error('contents')
                                        is-invalid @enderror form-control" rows="8"
                  placeholder="">{{ old('contents') }}</textarea>
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
  filebrowserImageUploadUrl: '/filemanager/upload?type=Images&_token=',
  filebrowserBrowseUrl: '/filemanager?type=Files',
  filebrowserUploadUrl: '/filemanager/upload?type=Files&_token='
};
</script>
<script>
CKEDITOR.replace('my-editor', options);
</script>

<script src="{{asset('admins/product/add/add.js')}}"></script>

@endsection