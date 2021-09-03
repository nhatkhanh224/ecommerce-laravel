@extends('layouts.admin')

@section('title')
<title>Trang chu</title>
@endsection
@section('css')
<link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
<link href="{{ asset('admins/role/add/add.css') }}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{ asset('admins/role/add/add.js')}}"></script>
@endsection


@section('content')

<div class="content-wrapper">
  @include('partials.content-header', ['name' => 'Role', 'key' => 'Edit'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <form action="{{ route('roles.update', ['id' => $role->id]) }}" method="post">
          <div class="col-md-6">
            @csrf
            <div class="form-group">
              <label>Tên vai trò</label>
              <input type="text" class="form-control" name="name" placeholder="Nhập tên vai trò"
                value="{{ $role->name }}">

            </div>

            <div class="form-group">
              <label>Mô tả vai trò</label>

              <textarea class="form-control" name="display_name" rows="4">{{ $role->display_name }}</textarea>

            </div>


          </div>
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <label>
                  <input type="checkbox" class="checkall">
                  checkall
                </label>
              </div>

              @foreach($permissionsParent as $permissionsParentItem)
              <div class="card border-primary mb-3 col-md-12">
                <div class="card-header bg-success">
                  <label>
                    <input type="checkbox" value="" class="checkbox_wrapper">
                  </label>
                  Module {{ $permissionsParentItem->name }}
                </div>
                <div class="row">
                  @foreach($permissionsParentItem->permissionsChildrent as $permissionsChildrentItem)
                  <div class="card-body text-primary col-md-3">
                    <h5 class="card-title">
                      <label>
                        <input type="checkbox" name="permission_id[]"
                          {{ $pemissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                          class="checkbox_childrent" value="{{ $permissionsChildrentItem->id }}">
                      </label>
                      {{ $permissionsChildrentItem->name }}
                    </h5>
                  </div>
                  @endforeach

                </div>
              </div>
              @endforeach


            </div>


          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>


      </div>
    </div>
  </div>

</div>
</div>
@section('js')
<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('admins/user/add/add.js')}}"></script>
@endsection
</div>

@endsection