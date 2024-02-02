@extends('admin.master')
@section('title')
Add Category
@endsection
@section('admin_content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card my-3">
                <div class="card-header">
                    <div class="category_title d-flex justify-content-between w-100">
                        <h1>Add Category</h1>
                        <a class="btn btn-success  my-3 p-2" href="{{ route('category') }}"><i class="fa-solid fa-eye"></i> View All Category</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.category') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Write Category Name</label>
                            <input type="text" name="name" id="name" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="slug">Write Category slug</label>
                            <input type="text" name="slug" id="slug" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="image">Choose Category image</label>
                            <input type="file" name="image" id="image" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="description">Write Category Description</label>
                            <textarea name="description" id="summernote" class="form-control my-2"></textarea>
                        </div>
                        {{-- ==========SEO-Section============= --}}
                        <hr class="mt-5">
                        <div class="card-header mb-3">
                            <h1>SEO Section</h1>
                        </div>


                        <div class="form-group">
                            <label for="meta_title">SEO Title</label>
                            <input type="text" name="meta_title" id="meta_title" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="meta_description">Meta Decription</label>
                            <textarea name="meta_description" id="meta_description"
                                class="form-control my-2"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="mete_keyword">Meta Keyword</label>
                            <textarea name="mete_keyword" id="mete_keyword" class="form-control my-2"></textarea>
                        </div>

                        <div class="row my-4 card p-3 mx-1">
                            <div class="col-md-2 mb-3 mt-2">
                                <label for="navbar_status">Navbar Status</label>
                                <input type="checkbox" name="navbar_status" style="cursor: pointer">
                            </div>
                            <div class="col-md-2 mb-2">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" style="cursor: pointer">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- ========== --}}
