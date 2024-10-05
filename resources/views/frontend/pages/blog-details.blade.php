@extends('frontend.layouts.master')

@section('og_metatag_section')
    <meta property="og:title" content="{{ $blog->seo_title }}">
    <meta property="og:description" content="{{ $blog->seo_description }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset($blog->image) }}">
    <meta property="og:site_name" content="{{ config('settings.site_name') }}">
    <meta property="og:type" content="website">
@endsection

@section('content')
    {{-- <pre>
@php
    print_r($blog);
@endphp
</pre> --}}
    <!--=============================
                              BREADCRUMB START
                             ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <!--<h1>blog details</h1>-->
                    <h2>3D Cakes - Latest News</h2>
                    <ul>
                        <li><a href="/">home</a></li>
                        <li><a href="#">blog details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================                                                                                                                        BREADCRUMB END
                             ==============================-->


    <!--=========================
                             BLOG DETAILS START
                             ==========================-->
    <section class="fp__blog_details mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="fp__blog_det_area">
                        <div class="fp__blog_details_img wow fadeInUp" data-wow-duration="1s">
                            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="imf-fluid w-100">
                        </div>
                        <div class="fp__blog_details_text wow fadeInUp" data-wow-duration="1s">
                            <ul class="details_bloger d-flex flex-wrap">
                                <li class="color-light-gray"><i class="far fa-user color-light-gray"></i> By
                                    {{ $blog->user->name }}</li>
                                <li class="color-light-gray"><i class="far fa-comment-alt-lines color-light-gray"></i>
                                    {{ count($comments) }} Comments</li>
                                <li class="color-light-gray"><i class="far fa-calendar-alt color-light-gray"></i>
                                    {{ date('d-m-Y', strtotime($blog->created_at)) }}
                                </li>
                            </ul>
                            <!-- <h2>{!! $blog->title !!}</h2>-->
                            <h1>{!! $blog->title !!}</h1>

                            <div>
                                <p class="fw-normal color-light-gray"> {!! $blog->description !!}</p>
                            </div>

                            <div class="blog_tags_share d-flex flex-wrap justify-content-between align-items-center">
                                <div class="tags d-flex flex-wrap align-items-center">

                                </div>
                                <div class="share d-flex flex-wrap align-items-center">
                                    <span>share:</span>
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"><i
                                                    class="fab fa-facebook-square fs-3 me-2 text-dark"></i></a></li>
                                        <li><a
                                                href="https://www.linkedin.com/shareArticle?mini=true&url={{ url()->current() }}&title={{ $blog->title }}"><i
                                                    class="fab fa-linkedin fs-3 me-2 text-dark"></i></a></li>
                                        <li><a
                                                href="http://twitter.com/share?text={{ $blog->title }}&url={{ url()->current() }}"><i
                                                    class="fab fa-twitter-square fs-3 me-2 text-dark"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <ul class="blog_det_button mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        @if ($nextBlog)
                            <li>
                                <a href="{{ route('blogs.details', $nextBlog->slug) }}">
                                    <img src="{{ asset($nextBlog->image) }}" alt="button img" class="img-fluid w-100">
                                    <p>{{ truncate($nextBlog->title) }}
                                        <span> <i class="far fa-long-arrow-left"></i> Previous</span>
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if ($previousBlog)
                            <li>
                                <a href="{{ route('blogs.details', $previousBlog->slug) }}">
                                    <p>{{ truncate($previousBlog->title) }}
                                        <span>next <i class="far fa-long-arrow-right"></i></span>
                                    </p>
                                    <img src="{{ asset($previousBlog->image) }}" alt="button img" class="img-fluid w-100">
                                </a>
                            </li>
                        @endif
                    </ul> --}}


                        <div class="row align-items-stretch mt-5 wow fadeInUp" data-wow-duration="1s">
                            @if ($nextBlog)
                                <div class="col-md-6 ">
                                    <div class="row w-100 align-items-stretch border-shodow">
                                        <div class="col-4 align-items-center d-flex ps-0">
                                            <img class="h-auto img-fluid w-100 img-blog" src="{{ asset($nextBlog->image) }}">
                                        </div>
                                        <div class="col-8 pe-0 ">
                                            <div class="card h-100 w-100 d-flex flex-column border-0">
                                                <div class="card-body d-flex flex-column justify-content-between p-0">
                                                    <p class="card-title mb-4 text-end">{{ truncate($nextBlog->title) }}</p>
                                                    <div class="mt-auto d-flex justify-content-end align-items-center">
                                                        <a href="{{ route('blogs.details', $nextBlog->slug) }}" class="links-arrow"><i class="far fa-long-arrow-left"></i> Previous</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($previousBlog)
                                <div class="col-md-6 mt-md-0 mt-5">
                                    <div class="row align-items-stretch w-100 border-shodow">
                                        <div class="col-8 ps-0 ">
                                            <div class="card h-100 w-100 d-flex flex-column border-0">
                                                <div class="card-body d-flex flex-column justify-content-between p-0">
                                                    <p class="card-title mb-4">{{ truncate($previousBlog->title) }}</p>
                                                    <div class="mt-auto d-flex justify-content-start align-items-center">
                                                        <a href="{{ route('blogs.details', $previousBlog->slug) }}" class="links-arrow">Next <i class="far fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 align-items-center d-flex pe-0">
                                            <img class="h-auto img-fluid w-100 img-blog" src="{{ asset($previousBlog->image) }}">
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>






                        {{-- <style>
                            .img-blog {
                                width: 110px !important;
                                height: 150px !important;
                                border-radius: 5px;
                            }
                        </style> --}}




                        <div class="fp__comment mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                            <h4>{{ count($comments) }} Comments</h4>
                            @foreach ($comments as $comment)
                                <div class="fp__single_comment m-0 border-0">
                                    <img src="{{ asset($comment->user->avatar) }}" alt="review" class="img-fluid">
                                    <div class="fp__single_comm_text">
                                        <h3>{{ $comment->user->name }}
                                            <span>{{ date('d M Y', strtotime($comment->created_at)) }} </span>
                                        </h3>
                                        <p>{{ $comment->comment }}</p>
                                    </div>
                                </div>
                            @endforeach

                            @if ($comments->hasPages())
                                <div class="fp__pagination mt_60">
                                    <div class="row">
                                        <div class="col-12">
                                            {{ $comments->links() }}
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>

                        <div class="comment_input mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                            <h4>Leave A Comment</h4>
                            <p>Required fields are marked *</p>
                            <form action="{{ route('blogs.comment.store', $blog->id) }}" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-xl-12">
                                        <label>comment *</label>
                                        <div class="fp__contact_form_input textarea">
                                            <span><i class="fal fa-user-alt"></i></span>
                                            <textarea rows="5" placeholder="Your Comment" name="comment"></textarea>
                                        </div>
                                        <button type="submit"
                                            class="common_btn mt_20 text-white background-light-gray">Submit
                                            comment</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                </div>
                <div class="col-xl-4 col-lg-4">
                    <div id="sticky_sidebar">
                        <div class="fp__blog_search blog_sidebar m-0 wow fadeInUp" data-wow-duration="1s">
                            <h3>Search</h3>
                            <form action="{{ route('blogs') }}">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="fp__related_blog blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Latest Post</h3>
                            <ul>
                                @foreach ($latestBlogs as $latestBlog)
                                    <li>
                                        <img src="{{ $latestBlog->image }}" alt="{{ $latestBlog->title }}"
                                            class="img-fluid w-100">
                                        <div class="text">
                                            <a
                                                href="{{ route('blogs.details', $latestBlog->slug) }}">{{ truncate($latestBlog->title, 50) }}</a>
                                            <p class="color-light-gray"><i
                                                    class="far fa-calendar-alt color-light-gray"></i>
                                                {{ date('d-m-Y', strtotime($latestBlog->created_at)) }}</p>
                                        </div>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="fp__blog_categori blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Categories</h3>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a class="bg-gray text-white"
                                            href="{{ route('blogs', ['category' => $category->slug]) }}">{{ $category->name }}
                                            <span
                                                class="footer-tile text-white border border-white">{{ $category->blogs_count }}</span></a>
                                    </li>
                                @endforeach

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--=========================
                             BLOG DETAILS END
                             ==========================-->
@endsection
