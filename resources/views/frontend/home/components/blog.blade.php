<section class="pb-0  pb-md-5 fp__blog fp__blog2">
    <div class="">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                    <div class="fp__section_heading mb_25">
                        {{-- <h4>Our Blogs</h4> --}}
                        {{-- <h2>Our Latest 3D Cakes Blogs</h2> --}}
                        <h2>Latest News</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestBlogs as $blog)
                    <div class="col-lg-4 col-md-6 col-12 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog">
                            <a href="{{ route('blogs.details', $blog->slug) }}" class="fp__single_blog_img">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text">
                                <a class="blogcategory category bg-light"
                                    href="{{ route('blogs', ['category' => $blog->category->slug]) }}">
                                    {{ $blog->category->name }}
                                </a>
                                <ul class="flex-wrap d-flex mt-2">
                                    <li><i class="fas fa-user"></i>{{ $blog->user->name }}</li>
                                    <li><i
                                            class="fas fa-calendar-alt"></i>{{ date('d M Y', strtotime($blog->created_at)) }}
                                    </li>
                                    <li><i class="fas fa-comments"></i> {{ $blog->comments_count }} comment</li>
                                </ul>
                                <a class="title"
                                    href="{{ route('blogs.details', $blog->slug) }}">{{ $blog->title }}</a>
                                <p class="fw-semibold text-muted mt-3">{!! truncate($blog->description, 100) !!}</p>
                                <a href="{{ route('blogs.details', $blog->slug) }}"
                                    class="blog-btn fw-semibold rounded-3 color-dark-gray">
                                    Read More <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>


<style>
    /* .blog-btn:hover {
        background: #788a9f !important;
        transition: all linear 0.6s;
        -webkit-transition: all linear 0.6s;
        -moz-transition: all linear 0.6s;
        -ms-transition: all linear 0.6s;
        -o-transition: all linear 0.6s;
    } */

    .blogcategory {
        top: -6% !important;
        color: #788a9f !important;
        border: 1px solid #788a9f !important;
    }
</style>
