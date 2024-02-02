@extends('admin.master')
@section('title')
Add Post
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
                        <h1>Add Posts</h1>
                        <a class="btn btn-success  my-3 p-2" href="{{ route('posts') }}"><i class="fa-solid fa-eye"></i> View All Posts</a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.posts') }}" method="post" >
                        @csrf

                        <div class="form-group my-3">
                            <label for="">All Category</label>
                            <select name="category_id" id="" class="form-control mt-3" style="cursor: pointer">
                                <option value="Category">Select Category</option>
                                @foreach ($category as $cateitem)
                                    <option style="cursor: pointer!important;" class="my-2" value="{{ $cateitem->id }}">{{ $cateitem->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Post Name</label>
                            <input type="text" name="name" id="name" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="slug">Post slug</label>
                            <input type="text" name="slug" id="slug" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="yt_iframe">Youtube iFrame Link</label>
                            <input type="text" name="yt_iframe" id="yt_iframe" class="form-control my-2">
                        </div>

                        <div class="form-group">
                            <label for="description">Post Description</label>
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
                            <div class="col-md-2 mb-2">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" style="cursor: pointer">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"><i class="fa-solid fa-plus"></i> Create Post</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
{{-- ========== --}}
