@extends('frontend.layouts.master')

@section('content')
    <!--=============================
                                                                                                            BREADCRUMB START
                                                                                                        ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="fp__breadcrumb_overlay py-5">
            <div class="container py-md-5 py-2">
                <div class="fp__breadcrumb_text">
                    <h1>3d Cakes - News</h1>
                    <ul>
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">News</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                                                                                                            BREADCRUMB END
                                                                                                        ==============================-->


    <!--=============================
                                                                                                            BLOG PAGE START
                                                                                                        ==============================-->
    <section class="fp__blog_page fp__blog2 py-5">
        <div class="container">
            <form class="fp__search_menu_form mb-4" action="{{ route('blogs') }}" method="GET">
                <div class="row">
                    <div class="col-xl-6 col-md-5">
                        <input type="text" placeholder="Search..." name="search" value="{{ @request()->search }}">
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <select class="nice-select" name="category">
                            <option value="">All</option>
                            @foreach ($categories as $category)
                                <option @selected(@request()->category == $category->slug) value="{{ $category->slug }}">{{ $category->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" class="common_btn text-white background-light-gray">search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                @foreach ($blogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 my-3 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog bg-white">
                            <a href="{{ route('blogs.details', $blog->slug) }}" class="fp__single_blog_img">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text bg-white">
                                <a class="category color-light-gray border-common bg-light"
                                    href="#">{{ $blog->category->name }}</a>
                                <ul class="d-flex flex-wrap mt_15">
                                    <li class="color-light-gray"><i
                                            class="fas fa-user color-light-gray"></i>{{ $blog->user->name }}</li>
                                    <li class="color-light-gray"><i class="fas fa-calendar-alt color-light-gray"></i>
                                        {{ date('d M Y', strtotime($blog->created_at)) }}</li>
                                    <li class="color-light-gray"><i class="fas fa-comments color-light-gray"></i>
                                        {{ $blog->comments_count }} comment</li>
                                </ul>
                                <a class="title fs-5"
                                    href="{{ route('blogs.details', $blog->slug) }}">{!! truncate($blog->title) !!}</a>
                                <p class=" color-light-gray mt-3">{!! truncate($blog->description, 90) !!}</p>
                                <a href="{{ route('blogs.details', $blog->slug) }}"
                                    class="  mt-2    blog-btn fw-light rounded-3 color-dark-gray fs-14">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($blogs->isEmpty())
                    <h5 class="text-center">No Blog Found!</h5>
                @endif

            </div>
            @if ($blogs->hasPages())
                <div class="fp__pagination pt-5">
                    <div class="row">
                        <div class="col-12">
                            {{ $blogs->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
    <!--=============================
                                                                                                            BLOG PAGE END
                                                                                                        ==============================-->
@endsection
