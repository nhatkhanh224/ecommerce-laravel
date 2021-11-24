@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection


@section('content')

<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Category', 'key' => 'Add'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-6">
          <form action="{{ route('categories.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label>Tên danh mục</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                placeholder="Nhập tên danh mục" value="{{ old('name') }}">
              @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <div class="form-group">
              <label>Chọn danh mục cha</label>
              <select class="form-control" name="parent_id">
                <option value="0">Chọn danh mục cha</option>
                {!! $htmlOption !!}
              </select>
            </div>
            <div class="form-group">
              <label>Ảnh đại diện ( cho Mobile)</label>
              <input type="text" class="form-control @error('photo_url') is-invalid @enderror" name="photo_url"
                placeholder="Nhập ảnh đại diện" value="{{ old('photo_url') }}">
              @error('photo_url')
              <div class="alert alert-danger">{{ $message }}</div>
              @enderror
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>

@endsection