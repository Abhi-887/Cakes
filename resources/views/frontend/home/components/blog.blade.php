<section class="pb-5 fp__blog fp__blog2">
    <div class="fp__blog_overlay">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                    <div class="fp__section_heading mb_25">
                        <h4>Our Blogs</h4>
                        <h2>Our Latest 3D Cakes Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($latestBlogs as $blog)
                    <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog">
                            <a href="{{ route('blogs.details', $blog->slug) }}" class="fp__single_blog_img">
                                <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text">
                                <a class="category" href="{{ route('blogs', ['category' => $blog->category->slug]) }}">
                                    {{ $blog->category->name }}
                                </a>
                                <ul class="flex-wrap d-flex mt_15">
                                    <li><i class="fas fa-user"></i>{{ $blog->user->name }}</li>
                                    <li><i
                                            class="fas fa-calendar-alt"></i>{{ date('d M Y', strtotime($blog->created_at)) }}
                                    </li>
                                    <li><i class="fas fa-comments"></i> {{ $blog->comments_count }} comment</li>
                                </ul>
                                <a class="title"
                                    href="{{ route('blogs.details', $blog->slug) }}">{{ $blog->title }}</a>
                                <p>{!! truncate($blog->description, 150) !!}</p>
                                <a href="{{ route('blogs.details', $blog->slug) }}"
                                    class="rounded-3 mt-2 background-dark-gray">
                                    Read More <i class="fas fa-arrow-right ml-4"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
