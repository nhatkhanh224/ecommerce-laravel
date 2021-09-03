@extends('layouts.admin')

@section('title')
<title>Admin</title>
@endsection
@section('css')
<link href="{{asset('admins/slide/add.css')}}" rel="stylesheet" />
@endsection
@section('js')
<script src="{{ asset('vendor/sweetAlert2/sweetalert2@11.js') }}"></script>
<script type="text/javascript" src="{{ asset('admins/main.js') }}"></script>
@endsection



@section('content')
<div class="content-wrapper">

  @include('partials.content-header', ['name' => 'Roles', 'key' => 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <a href="{{route('roles.create')}}" class="btn btn-success float-right m-2">Add</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Tên vai trò</th>
                <th scope="col">Mô tả vai trò</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($roles as $role)

              <tr>
                <th scope="row">{{ $role->id }}</th>
                <td>{{ $role->name }}</td>
                <td>{{ $role->display_name}}</td>
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
          {{ $roles->links() }}
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