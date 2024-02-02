@extends('frontend.frontend_master')
@section("title","$post->meta_title")
@section("meta_description","$post->meta_description")
@section("mete_keyword","$post->mete_keyword")
@section('frontend_content')
<main>
    <section class="section">
        <div class="container">
            <div class="row no-gutters-lg">
                <div class="col-12">
                    <h2 class="section-title">Latest Articles</h2>
                    <a href="{{ route('frontend.home') }}" class="btn btn-sm btn-success my-3">Back to Home</a>
                </div>

                <div class="col-lg-8 mb-5 mb-lg-0">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box">
                                <h4 class="category_heading card" style="border-left: 6px solid #249100;background: #ebebeb;padding: 15px 30px;font-size: 21px;">
                                    {!! $post->name !!}
                                </h4>
                                <div class="title_post">
                                    <h6 class="my-3">{{ $post->category->name .' / '. $post->name }}</h6>
                                </div>
                                <div class="card border p-3">
                                    {!! $post->description !!}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="widget-blocks">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="widget">
                                    <h2 class="section-title mb-3">Categories</h2>
                                    <div class="widget-body">
                                        <ul class="widget-list">
                                           @foreach ($latest_post as $latest_post_item)
                                            <a href="{{ url('postnewitem/'.$latest_post_item->category->slug.'/'.$latest_post_item->slug) }}" class="text-decoration-none">
                                                <h6>> {{ $latest_post_item->name }}</h6>
                                            </a>
                                           @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="widget">
                                    <div class="widget-body">
                                        <img loading="lazy" decoding="async" src="{{ asset('frontend/images/author.jpg') }}" alt="About Me" class="w-100 author-thumb-sm d-block">
                                        <h2 class="widget-title my-3">Hootan Safiyari</h2>
                                        <p class="mb-3 pb-2">Hello, I’m Hootan Safiyari. A Content writter, Developer
                                            and Story teller. Working as a Content writter at CoolTech Agency. Quam
                                            nihil …</p> <a href="about.html" class="btn btn-sm btn-outline-primary">Know
                                            More</a>
                                    </div>
                                </div>
                                <div class="widget">
                                    <div class="widget-body" style="background: #ededed;">
                                        <h2 class="widget-title my-3">Show Advertising</h2>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-12 col-md-6">
                                <div class="widget">
                                    <h2 class="section-title mb-3">Recommended</h2>
                                    <div class="widget-body">
                                        <div class="widget-list">
                                            <article class="card mb-4">
                                                <div class="card-image">
                                                    <div class="post-info"> <span class="text-uppercase">1 minutes
                                                            read</span>
                                                    </div>
                                                    <img loading="lazy" decoding="async" src="{{ asset('frontend/images/post/post-9.jpg') }}" alt="Post Thumbnail" class="w-100">
                                                </div>
                                                <div class="card-body px-0 pb-1">
                                                    <h3><a class="post-title post-title-sm" href="article.html">Portugal
                                                            and France Now
                                                            Allow Unvaccinated Tourists</a></h3>
                                                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing elit, sed do eiusmod tempor …</p>
                                                    <div class="content"> <a class="read-more-btn" href="article.html">Read Full Article</a>
                                                    </div>
                                                </div>
                                            </article>
                                            <a class="media align-items-center" href="article.html">
                                                <img loading="lazy" decoding="async" src="{{ asset('frontend/images/post/post-2.jpg') }}" alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">These Are Making It Easier To Visit
                                                    </h3>
                                                    <p class="mb-0 small">Heading Here is example of hedings. You can
                                                        use …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="article.html"> <span class="image-fallback image-fallback-xs">No Image Specified</span>
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">No Image specified</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="article.html">
                                                <img loading="lazy" decoding="async" src="{{ asset('frontend/images/post/post-5.jpg') }}" alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">Perfect For Fashion</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                            <a class="media align-items-center" href="article.html">
                                                <img loading="lazy" decoding="async" src="{{ asset('frontend/images/post/post-9.jpg') }}" alt="Post Thumbnail" class="w-100">
                                                <div class="media-body ml-3">
                                                    <h3 style="margin-top:-5px">Record Utra Smooth Video</h3>
                                                    <p class="mb-0 small">Lorem ipsum dolor sit amet, consectetur
                                                        adipiscing …</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>
@endsection




{{-- --}}
