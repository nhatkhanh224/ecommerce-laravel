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

  @include('partials.content-header', ['name' => 'Setting', 'key' => 'List'])

  <div class="content">
    <div class="container-fluid">
      <div class="row">

        <div class="col-md-12">
          <!-- Example single danger button -->
          <div class="btn-group float-right mb-2 mr-5">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Add setting
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="{{ route('settings.create') . '?type=Text' }}">Text</a>
              <a class="dropdown-item" href="{{ route('settings.create') . '?type=Textarea' }}">Textarea</a>
            </div>
          </div>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Config key</th>
                <th scope="col">Config value</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>
              @foreach($settings as $setting)

              <tr>
                <th scope="row">{{ $setting->id }}</th>
                <td>{{ $setting->config_key }}</td>
                <td>{{ $setting->config_value }}</td>
                <td>
                  <a href="{{ route('settings.edit', ['id' => $setting->id]) . '?type=' . $setting->type}}"
                    class="btn btn-default">Edit</a>
                  <a href="" data-url="{{ route('settings.delete', ['id' => $setting->id]) }}"
                    class="btn btn-danger action_delete">Delete</a>

                </td>
              </tr>
              @endforeach



            </tbody>
          </table>
        </div>
        <div class="col-md-12">
        {{ $settings->links() }}
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