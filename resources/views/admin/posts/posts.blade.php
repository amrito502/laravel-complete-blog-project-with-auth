@extends('admin.master')
@section('title')
All Posts
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
                    <a class="btn btn-success  my-3 p-2" href="{{ route('add.posts') }}"><i class="fa-solid fa-plus"></i> Create Post</a>
                </div>
            </div>
            <div class="card-body">
                <table id="myDataTable" class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Photos</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->status == '1' ? 'Hidden':'Shown' }}</td>
                            <td>
                                <a href="{{ route('edit.posts', $item->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{ route('delete.posts', $item->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
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
