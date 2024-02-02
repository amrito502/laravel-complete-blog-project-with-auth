@extends('admin.master')
@section('title')
Category
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
                    <h1>All Category</h1>
                    <a class="btn btn-success  my-3 p-2" href="{{ route('add.category') }}"><i class="fa-solid fa-plus"></i> Create Category</a>
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
                        @forelse ($categories as $key=>$item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/category/'.$item->image ) }}" alt="img" width="100px">
                                </td>
                                <td>{{ $item->status == '1' ? 'Hidden':'Shown' }}</td>
                                <td>
                                    <a href="{{ route('edit.category', $item->id) }}" class="btn btn-sm btn-success"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="{{ route('delete.category', $item->id) }}" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></a>
                                </td>
                            </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- ========== --}}
