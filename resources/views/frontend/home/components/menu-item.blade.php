<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<style>
    .testimonial {
        background: #262626;
    }

    .testimonial .stars {
        color: #ff9800;
    }

    .testimonial .profile img {
        width: 50px;
        height: 50px;
    }

    .testimonial .profile .name {
        font-weight: bold;
        color: #333;
    }

    .testimonial .profile .company {
        font-size: 12px;
        color: #999;
    }

    .slick-dots li button::before {
        font-size: 14px !important;
    }

    .slick-dots li.slick-active button::before {
        color: #000000 !important;
    }

    .slick-dots li button:hover::before {
        color: #000000 !important;
    }

    .popularfood .slick-dots {
        display: none !important;
    }

    /* .popularfood .slick-next::before,
    .popularfood .slick-prev::before {
        color: #4b637f !important;
        font-size: 35px !important;
    } */

    .popularfood .slick-next {
        right: -20px !important;
    }

    .popularfood .slick-prev::before {
        position: relative !important;
        right: 1rem !important;
    }

    @media (max-width: 650px) {
        .slick-prev.slick-arrow {
            top: 100%;
            left: 40%;
            margin-top: 1.5rem !important;
        }

        .slick-next.slick-arrow {
            top: 100%;
            right: 40% !important;
            margin-top: 1.5rem !important;
        }

        .popularfood .slick-prev::before {
            position: relative !important;
        }
    }

    .slick-prev::before {
        content: '\f053' !important;
        font-family: 'Font Awesome 5 Free' !important;
        font-weight: 600;
        background: #4b637f !important;
        color: white !important;
        border-radius: 50%;
        padding: 10px 14px;
        font-size: 16px;
    }

    .slick-next::before {
        content: '\f054' !important;
        font-family: 'Font Awesome 5 Free' !important;
        font-weight: 600;
        background: #4b637f !important;
        color: white !important;
        border-radius: 50%;
        padding: 10px 14px;
        font-size: 16px;
    }

    .fp__menu_item:hover .categorys {
        top: 59% !important;
    }
</style>

<div class="container pt-5">
    <div class="row wow fadeInUp" data-wow-duration="1s">
        <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
            <div class="fp__section_heading">
                <h4>3D Cakes</h4>
                <h2>Our Popular 3dCakes Range</h2>
                <p>Objectively pontificate quality models before intuitive information. Dramatically
                    recaptiualize multifunctional materials.</p>
            </div>
        </div>
    </div>

    <div class="testimonial-slider popularfood">
        <div class="row mt-5">
            @foreach ($categories as $category)
                @php
                    $products = \App\Models\Product::where([
                        'show_at_home' => 1,
                        'status' => 1,
                        'category_id' => $category->id,
                    ])
                        ->orderBy('id', 'DESC')
                        ->take(8)
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->get();

                @endphp

                @foreach ($products as $product)
                    <div class="col-md-4 {{ $category->slug }}">
                        <div class="fp__menu_item m-3">
                            <div class="fp__menu_item_img">
                                <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100">
                            </div>
                            <a class="category categorys bg-light px-2 py-1 fw-semibold"
                                href="{{ route('category.show', ['slug' => $product->category->slug]) }}">{{ @$product->category->name }}</a>
                            <div class="fp__menu_item_text">
                                @if ($product->reviews_avg_rating)
                                    <p class="rating">
                                        @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor

                                        <span>{{ $product->reviews_count }}</span>
                                    </p>
                                @endif
                                <a class="title my-3"
                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <p
                                    class="price fw-semibold text-center position-absolute py-1 px-3 rounded-pill color-light-gray top-0">
                                    @if ($product->offer_price > 0)
                                        {{ currencyPosition($product->offer_price) }}
                                        <del>{{ currencyPosition($product->price) }}</del>
                                    @else
                                        {{ currencyPosition($product->price) }}
                                    @endif
                                </p>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a class="background-light-gray" href="javascript:;"
                                            onclick="loadProductModal('{{ $product->id }}')"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li onclick="addToWishlist('{{ $product->id }}')"><a class="background-light-gray"
                                            href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                    <li><a class="background-light-gray"
                                            href="{{ route('product.show', $product->slug) }}"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.testimonial-slider .row').slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>



{{-- <section class="fp__menu mt_95 xs_mt_65">
    <div class="container">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                <div class="fp__section_heading mb_45">
                    <h4>food Menu</h4>
                    <h2>Our Popular Delicious Foods</h2>
                    <span>
                        <img src="images/heading_shapes.png" alt="shapes" class="img-fluid w-100">
                    </span>
                    <p>Objectively pontificate quality models before intuitive information. Dramatically
                        recaptiualize multifunctional materials.</p>
                </div>
            </div>
        </div>

        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="col-12">
                <div class="menu_filter d-flex flex-wrap justify-content-center">
                    @foreach ($categories as $category)
                        <button class="{{ $loop->index === 0 ? 'active button-click' : '' }}"
                            data-filter=".{{ $category->slug }}">{{ $category->name }}</button>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="row grid">
            @foreach ($categories as $category)
                @php
                    $products = \App\Models\Product::where([
                        'show_at_home' => 1,
                        'status' => 1,
                        'category_id' => $category->id,
                    ])
                        ->orderBy('id', 'DESC')
                        ->take(8)
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->get();

                @endphp

                @foreach ($products as $product)
                    <div class="col-xl-3 col-sm-6 col-lg-4 {{ $category->slug }}">
                        <div class="fp__menu_item">
                            <div class="fp__menu_item_img">
                                <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100">
                                <a class="category" href="#">{{ @$product->category->name }}</a>
                            </div>
                            <div class="fp__menu_item_text">
                                @if ($product->reviews_avg_rating)
                                    <p class="rating">
                                        @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor

                                        <span>{{ $product->reviews_count }}</span>
                                    </p>
                                @endif
                                <a class="title"
                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <h5 class="price">
                                    @if ($product->offer_price > 0)
                                        {{ currencyPosition($product->offer_price) }}
                                        <del>{{ currencyPosition($product->price) }}</del>
                                    @else
                                        {{ currencyPosition($product->price) }}
                                    @endif
                                </h5>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a href="javascript:;" onclick="loadProductModal('{{ $product->id }}')"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li onclick="addToWishlist('{{ $product->id }}')"><a href="javascript:;"><i
                                                class="fal fa-heart"></i></a></li>
                                    <li><a href="{{ route('product.show', $product->slug) }}"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach

        </div>
    </div>
</section> --}}
