@extends('admin.master')
@section('title')
Get All users
@endsection
@section('admin_content')
@if (session('message'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <p>{{ session('message') }}</p>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif



<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header ">
                <div class="category_title d-flex justify-content-between w-100">
                    <h1>All Posts</h1>
                    <a class="btn btn-success  my-3 p-2" href=""><i class="fa-solid fa-plus"></i> Create Post</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->role_as == '1' ? 'Admin':'User' }}</td>
                            <td>
                                <a href="{{ route('edit.fetch.user',$item->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                            <p class="text-danger text-center">Post is not available Right Now!</p>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- ========== --}}
