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

    .fp__menu_item {
        border-radius: 15px;
        background-color: #fff;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        /* position: relative; */
    }

    .fp__menu_item_img img {
        border-radius: 15px 15px 0 0;
        height: 250px;
        object-fit: cover;
    }

    .fp__menu_item_text {
        padding: 20px;
        text-align: center;
    }

    .fp__menu_item_text .title {
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 10px;
        color: #333;
        display: block;
    }

    .fp__menu_item_text .price {
        font-size: 16px;
        margin-bottom: 10px;
    }

    .fp__menu_item_text .price del {
        color: #999;
        margin-right: 10px;
    }

    .category {
        position: absolute;
        top: 62%;
        left: 16px;
        padding: 5px 10px;
        font-size: 12px;
        background-color: #f8f9fa;
        color: #333;
        border-radius: 15px;
        text-transform: uppercase;
    }

    .actions {
        display: flex;
        justify-content: space-between;
        padding: 10px 20px;
        border-top: 1px solid #f0f0f0;
        background-color: #f8f9fa;
    }

    .actions a {
        font-size: 18px;
        color: #333;
        text-decoration: none;
    }

    .actions a:hover {
        color: #000;
    }

    .add-to-cart {
        background-color: #007bff;
        color: white;
        padding: 8px 20px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        text-decoration: none;
    }

    .add-to-cart:hover {
        background-color: #0056b3;
        color: white;
    }

    .eye {
        top: 0;
        right: 20%;
        background-color: #4b637f !important;
        padding: 10px 15px;
    }

    .heart {
        top: 0;
        right: 5%;
        background-color: #4b637f !important;
        padding: 10px 15px;
    }
</style>

<div class="container pt-5">
    <div class="row wow fadeInUp" data-wow-duration="1s">
        <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
            <div class="fp__section_heading">
                <h4>3D Cakes</h4>
                <h2>Our Popular 3D Cakes Range</h2>
                <p>Objectively pontificate quality models before intuitive information. Dramatically
                    recaptiualize multifunctional materials.</p>
            </div>
        </div>
    </div>

    <div class="testimonial-slider popularfood">
        <div class="mt-5 row">
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
                        <div class="position-relative m-3 fp__menu_item">
                            <div class="fp__menu_item_img">
                                <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                    class="img-fluid w-100">
                            </div>
                            <a class="px-2 py-1 category categorys fw-semibold"
                                href="{{ route('category.show', ['slug' => $product->category->slug]) }}">{{ @$product->category->name }}</a>
                            <div class="fp__menu_item_text">
                                <a class="my-3 title"
                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <p class="price">
                                    @if ($product->offer_price > 0)
                                        <del>{{ currencyPosition($product->price) }}</del>
                                        {{ currencyPosition($product->offer_price) }}
                                    @else
                                        {{ currencyPosition($product->price) }}
                                    @endif
                                </p>
                                <div class="actions">
                                    <a class="eye position-absolute rounded-circle px-3 py-2"
                                        href="{{ route('product.show', $product->slug) }}"><i
                                            class="far fa-eye  text-white"></i></a>
                                    <a class="add-to-cart" href="javascript:;"
                                        onclick="addToCart('{{ $product->id }}')">Add to cart</a>
                                    <a class="heart position-absolute rounded-circle px-3 py-2" href="javascript:;"
                                        onclick="addToWishlist('{{ $product->id }}')"><i
                                            class="fal fa-heart text-white"></i></a>
                                </div>
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
