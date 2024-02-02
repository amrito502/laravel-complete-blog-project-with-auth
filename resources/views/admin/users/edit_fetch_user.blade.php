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
                    <h1>All Users</h1>
                    <a class="btn btn-success  my-3" href="{{ route('fetch.user') }}"><i class="fa-solid fa-plus"></i> All Users</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="mb-3">
                        <label>Name</label>
                        <p class="form-control">{{ $user->name }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Email</label>
                        <p class="form-control">{{ $user->email }}</p>
                    </div>
                    <div class="mb-3">
                        <label>Created At</label>
                        <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
                    </div>
                <form action="{{ route('update.fetch.user', $user->id) }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label>Role as</label>
                        <select name="role_as" id="" class="form-control" style="cursor: pointer;">
                            <option value=""> -- All Users --</option>
                            <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected':'' }}>Blogger</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-sm btn-info">Update Role</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- ========== --}}
