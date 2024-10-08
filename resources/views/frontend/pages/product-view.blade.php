@php
    use Illuminate\Support\Str;
@endphp

@extends('frontend.layouts.master')

@section('content')

    <style>
        .w-0 {
            width: auto !important;
        }

        #pills-home-tab.active, #pills-cake-stand-gallery-tab.active, #pills-contact-tab.active {
  color: white !important;
}

        /* .productviewinput input:checked {
            background-color: #788a9f !important;
            border-color: #788a9f !important;
        } */

        /* .fa-long-arrow-right::before {
            content: "\f054" !important;
            font-weight: bolder !important;
        }

        .fa-long-arrow-left::before {
            content: "\f053" !important;
            font-weight: bolder !important;
        }

        .fp__related_menu .prevArrow {
            left: -45px !important;
        }

        .nextArrow.slick-arrow {
            right: -45px !important;
        }

        @media (max-width: 640px) {
            .nextArrow.slick-arrow {
                right: 40% !important;
                top: 103% !important;
            }

            .fp__related_menu .prevArrow {
                left: 40% !important;
                top: 103% !important;
            }
        }

        @media (max-width: 460px) {
            .nextArrow.slick-arrow {
                right: 38% !important;
            }

            .fp__related_menu .prevArrow {
                left: 38% !important;
            }
        }

        @media (max-width: 380px) {
            .nextArrow.slick-arrow {
                right: 35% !important;
            }

            .fp__related_menu .prevArrow {
                left: 35% !important;
            }
        }

        .prevArrow.slick-arrow {
            font-size: 22px !important;
            font-weight: 600;
} */

        #exzoom {
            position: sticky;
            top: 100px;
            z-index: 1;
        }


        .slick-prev::before {
            content: '\f053' !important;
            font-family: 'Font Awesome 5 Free' !important;
            font-weight: 600;
            /* background: #4b637f !important;
                                                    color: white !important; */
            border-radius: 50%;
            padding: 10px 17px;
            font-size: 16px;
            top: 50%;
            position: absolute;
            left: -4%;
        }

        .slick-next::before {
            content: '\f054' !important;
            font-family: 'Font Awesome 5 Free' !important;
            font-weight: 600;
            /* background: #4b637f !important;
                                                    color: white !important; */
            border-radius: 50%;
            padding: 10px 17px;
            font-size: 16px;
            top: 50%;
            position: absolute;
            right: -4%;
        }

        .slick-next.slick-arrow,
        .slick-prev.slick-arrow {
            width: 20px;
            background: none;
        }

        @media (max-width: 991px) {
            .slick-next::before {
                top: 97%;
                right: 30%;
            }

            .slick-prev::before {
                top: 97%;
                left: 30%;
            }
        }

        .fp__menu_hover:hover {
            transform: scale(1.02);
        }

        .slick-list {
            padding: 0.5rem 0px !important;
        }

        .fp__menu_item .fp__menu_item_text .category {
            top: -10%;
        }
    </style>
    <!--============================= BREADCRUMB START ==============================-->
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="py-5 fp__breadcrumb_overlay">
            <div class="container py-2 py-md-5">
                <div class="fp__breadcrumb_text">
                    <h1>{!! $product->name !!}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">home</a></li>
                        <li><a href="javascript:;">{!! $product->name !!}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--============================= BREADCRUMB END ==============================-->
    <!--============================= MENU DETAILS START ==============================-->


    <section class="py-5 fp__menu_details">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="hidden exzoom" id="exzoom">
                        <div class="exzoom_img_box fp__menu_details_images">
                            <ul class="exzoom_img_ul">
                                <li><img class="zoom img-fluid" src="{{ asset($product->thumb_image) }}" alt="product">
                                </li>

                                @foreach ($product->productImages as $image)
                                    <li><img class="zoom img-fluid" src="{{ asset($image->image) }}" alt="product">
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <div class="exzoom_nav"></div>
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> <i class="far fa-chevron-left"></i>
                            </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> <i class="far fa-chevron-right"></i>
                            </a>
                        </p>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-duration="1s">
                    <div class="px-0 fp__menu_details_text px-lg-5 ms-0 ms-lg-5 ms-xxl-0">
                        <h1>{!! $product->name !!}</h1>
                        @if ($product->reviews_avg_rating)
                            <p class="rating">
                                @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor

                                <span>({{ $product->reviews_count }})</span>
                            </p>
                        @endif
                        <h3 class="price">
                            @if ($product->offer_price > 0)
                                {{ currencyPosition($product->offer_price) }}
                                <del>{{ currencyPosition($product->price) }}</del>
                            @else
                                {{ currencyPosition($product->price) }}
                            @endif
                        </h3>
                        <p class="short_description">{!! $product->short_description !!}</p>
                        <hr class="my-4">
                        <form action="" id="v_add_to_cart_form">
                            @csrf
                            <input type="hidden" name="base_price" class="v_base_price"
                                value="{{ $product->offer_price > 0 ? $product->offer_price : $product->price }}">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="total_price" id="v_hidden_total_price">

                            <div class="selectbox">
                                <div class="row">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">

                                    @php
                                        $variants = $product->variants->where('status', '!=', 0)->sortBy('shotorder');
                                    @endphp

                                    @foreach ($variants as $variant)
                                        <div class="col-12">
                                            <div class="">
                                                <h6 class="my-4">
                                                    {{ $variant->name }}:
                                                    @if ($variant->isrequired)
                                                        <span class="text-danger">*</span>
                                                    @endif
                                                </h6>

                                                @switch($variant->attribute_type)
                                                    @case('dropdown')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-caret-square-down" aria-hidden="true"></i></span>
                                                            <select class="form-control v_product_option" name="variants_items[]"
                                                                data-price=""
                                                                required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                                                <option value="" selected="">-- Please Select --</option>
                                                                @foreach ($variant->productVariantItems as $variantItem)
                                                                    @if ($variantItem->status != 0)
                                                                        <option value="{{ $variantItem->id }}"
                                                                            data-price="{{ $variantItem->price }}">
                                                                            {{ $variantItem->name }}
                                                                            @if ($variantItem->price != 0)
                                                                                ({{ currencyPosition($variantItem->price) }})
                                                                            @endif
                                                                        </option>
                                                                    @endif
                                                                @endforeach
                                                            </select>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                select an option.</span>
                                                        </div>
                                                    @break

                                                    @case('radio')
                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <div class="mt-2 fp__contact_form_input form-group">
                                                                    <input class="w-0 me-2 v_product_option" type="radio"
                                                                        name="variants_items[{{ $variant->id }}]"
                                                                        value="{{ $variantItem->id }}"
                                                                        data-price="{{ $variantItem->price }}"
                                                                        id="variantItem_{{ $variantItem->id }}"
                                                                        required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                                                    <label
                                                                        for="variantItem_{{ $variantItem->id }}">{{ $variantItem->name }}
                                                                        @if ($variantItem->price != 0)
                                                                            ({{ currencyPosition($variantItem->price) }})
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <span class="error-message text-danger" style="display:none;">Please select
                                                            an
                                                            option.</span>
                                                    @break

                                                    @case('checkbox')
                                                        @foreach ($variant->productVariantItems as $variantItem)
                                                            @if ($variantItem->status != 0)
                                                                <div class="my-4">
                                                                    <input class="w-0 me-2 v_product_option" type="checkbox"
                                                                        name="variants_items[{{ $variant->id }}][]"
                                                                        value="{{ $variantItem->id }}"
                                                                        data-price="{{ $variantItem->price }}"
                                                                        id="variantItem_{{ $variantItem->id }}"
                                                                        required="{{ $variant->isrequired ? 'true' : 'false' }}">
                                                                    <label
                                                                        for="variantItem_{{ $variantItem->id }}">{{ $variantItem->name }}
                                                                        @if ($variantItem->price != 0)
                                                                            ({{ currencyPosition($variantItem->price) }})
                                                                        @endif
                                                                    </label>
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                        <span class="error-message text-danger" style="display:none;">Please select
                                                            an
                                                            option.</span>
                                                    @break

                                                    @case('field')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-solid fa-keyboard" aria-hidden="true"></i></span>
                                                            <input type="text" name="variants_items[{{ $variant->id }}]"
                                                                class="form-control" placeholder="Enter {{ $variant->name }}"
                                                                {{ $variant->isrequired ? 'required' : '' }}>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                fill
                                                                this field.</span>
                                                        </div>
                                                    @break

                                                    @case('area')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-solid fa-paragraph"
                                                                    aria-hidden="true"></i></span>
                                                            <textarea name="variants_items[{{ $variant->id }}]" class="form-control" rows="3"
                                                                placeholder="Enter {{ $variant->name }}" {{ $variant->isrequired ? 'required' : '' }}></textarea>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                fill
                                                                this field.</span>
                                                        </div>
                                                    @break

                                                    @case('date')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-regular fa-calendar"
                                                                    aria-hidden="true"></i></span>
                                                            <input type="date" name="variants_items[{{ $variant->id }}]"
                                                                class="form-control" {{ $variant->isrequired ? 'required' : '' }}>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                select
                                                                a date.</span>
                                                        </div>
                                                    @break

                                                    @case('datetime')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-regular fa-calendar-days"
                                                                    aria-hidden="true"></i></span>
                                                            <input type="datetime-local"
                                                                name="variants_items[{{ $variant->id }}]" class="form-control"
                                                                {{ $variant->isrequired ? 'required' : '' }}>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                select
                                                                a date and time.</span>
                                                        </div>
                                                    @break

                                                    @case('time')
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-solid fa-clock" aria-hidden="true"></i></span>
                                                            <input type="time" name="variants_items[{{ $variant->id }}]"
                                                                class="form-control" {{ $variant->isrequired ? 'required' : '' }}>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                select
                                                                a time.</span>
                                                        </div>
                                                    @break

                                                    @default
                                                        <div class="mt-2 fp__contact_form_input form-group">
                                                            <span><i class="far fa-keyboard" aria-hidden="true"></i></span>
                                                            <input type="text" name="variants_items[]" class="form-control"
                                                                placeholder="Enter {{ $variant->name }}"
                                                                {{ $variant->isrequired ? 'required' : '' }}>
                                                            <span class="error-message text-danger" style="display:none;">Please
                                                                fill this field.</span>
                                                        </div>
                                                @endswitch
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="details_quentity">
                                <h5 class="my-4">Select Quantity</h5>
                                <div class="quentity_btn_area d-flex flex-wrapa align-items-center">
                                    <div class="quentity_btn">
                                        <button class="btn btn-danger v_decrement"><i class="fal fa-minus"></i></button>
                                        <input type="text" name="quantity" placeholder="1" value="1" readonly
                                            id="v_quantity">
                                        <button class="btn btn-success v_increment"><i class="fal fa-plus"></i></button>
                                    </div>
                                    <h3 id="v_total_price">
                                        {{ $product->offer_price > 0 ? currencyPosition($product->offer_price) : currencyPosition($product->price) }}
                                    </h3>
                                </div>
                            </div>

                            <ul class="flex-wrap details_button_area d-flex">
                                @if ($product->quantity === 0 || $product->out_of_stock)
                                    <li><a class="px-3 py-2 rounded-pill text-white bg-danger" href="javascript:;">Out of
                                            Stock</a></li>
                                @else
                                    <li><a class="px-3 py-2 background-light-gray rounded-pill text-white v_submit_button"
                                            href="#">Add To
                                            Cart</a></li>
                                @endif



                                {{-- <li><a class="wishlist" href="#"><i class="far fa-heart"></i></a></li> --}}
                                <li onclick="addToWishlist('{{ $product->id }}')"><a
                                        class="background-light-gray text-white wishlist" href="javascript:;"><i
                                            class="far fa-heart"></i></a></li>
                            </ul>

                        </form>
                    </div>
                </div>
            </div>

            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_description_area mt-5 pt-5">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <li class="nav-item border-end border-dark" role="presentation">
                            <button class="nav-link nav-link-product  active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">Description</button>
                        </li>
                        <li class="nav-item border-end border-dark" role="presentation">
                            <button class="nav-link nav-link-product" id="pills-cake-stand-gallery-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-cake-stand-gallery" type="button" role="tab"
                                aria-controls="pills-cake-stand-gallery" aria-selected="false">Cake Stand
                                Gallery</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link nav-link-product" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">Reviews</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
                            <div class="menu_det_description fw-normal color-light-gray">
                                {!! $product->long_description !!}
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-cake-stand-gallery" role="tabpanel"
                            aria-labelledby="pills-cake-stand-gallery-tab" tabindex="0">
                            <div class="gallery">
                                <div class="row">

                                    @foreach ($cakesstans as $cakesstand)
                                        <div class="col-4">
                                            <div class="cake-stand">
                                                <img class="rounded-3"
                                                    src="{{ asset('images/cakesstands/' . $cakesstand->image) }}"
                                                    alt="{{ $cakesstand->name }}">

                                            </div>
                                            <h5 class="my-3 color-dark-gray fw-semibold">{{ $cakesstand->name }}
                                            </h5>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="fp__review_area">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <h4>{{ count($reviews) }} Reviews</h4>
                                        <div class="pt-0 fp__comment mt_20">
                                            @foreach ($reviews as $review)
                                                <div class="m-0 border-0 fp__single_comment">
                                                    <img src="{{ asset($review->user->avatar) }}" alt="review"
                                                        class="img-fluid">
                                                    <div class="fp__single_comm_text">
                                                        <h3>{{ $review->user->name }}
                                                            <span>{{ date('d m Y', strtotime($review->created_at)) }}</span>
                                                        </h3>
                                                        <span class="rating">
                                                            @for ($i = 1; $i <= $review->rating; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                        </span>
                                                        <p>{{ $review->review }}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                            @if ($reviews->hasPages())
                                                <div class="fp__pagination mt_60">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            {{ $reviews->links() }}
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                            @if (count($reviews) === 0)
                                                <div class="mt-4 alert alert-warning">No review found!</div>
                                            @endif
                                        </div>
                                    </div>
                                    @auth
                                        <div class="col-lg-4">
                                            <div class="fp__post_review">
                                                <h4>write a Review</h4>
                                                <form action="{{ route('product-review.store') }}" method="POST">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="mt-3 col-xl-12">
                                                            <label>Choose a rating</label>
                                                            <select name="rating" id="rating_input" class="form-control">
                                                                <option value="5">5</option>
                                                                <option value="4">4</option>
                                                                <option value="3">3</option>
                                                                <option value="2">2</option>
                                                                <option value="1">1</option>
                                                            </select>
                                                            <input type="hidden" name="product_id"
                                                                value="{{ $product->id }}">
                                                        </div>
                                                        <div class="col-xl-12">
                                                            <label for="">Review</label>
                                                            <textarea style="margin-top: 2px" name="review" rows="3" placeholder="Write your review"></textarea>
                                                        </div>
                                                        <div class="col-12">
                                                            <button class="common_btn" type="submit">submit
                                                                review</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-lg-4">
                                            <h4>write a Review</h4>
                                            <div class="mt-4 alert alert-warning">Please login first to add
                                                review.</div>
                                        </div>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (count($relatedProducts) > 0)
                    <div class="fp__related_menu pt-5">
                        <h2 class="mb-0">Related Item</h2>
                        <div class="row related_product_slider">
                            @foreach ($relatedProducts as $relatedProduct)
                                <div class="fp__menu_hover wow fadeInUp pb-3" data-wow-duration="1s">
                                    <div class="card fp__menu_item rounded-3">
                                        <div class="fp__menu_item_img">
                                            <img src="{{ asset($relatedProduct->thumb_image) }}"
                                                alt="{{ $relatedProduct->name }}" class="img-fluid w-100">
                                        </div>
                                        <a onclick="addToWishlist('{{ $relatedProduct->id }}')"
                                            class="text-white background-light-gray heart position-absolute rounded-circle"
                                            href="javascript:;"><i class="fal fa-heart"></i></a>

                                        <div class="card-body fp__menu_item_text position-relative d-flex flex-column">
                                            <a class="px-2 py-1 color-light-gray border-common category bg-light"
                                                href="#">{{ @$relatedProduct->category->name }}</a>

                                            <a class="title text-uppercase" href="{{ route('product.show', $relatedProduct->slug) }}">
                                                {{ Str::limit($relatedProduct->name, 300, '...') }}
                                            </a>
                                            <div class="mt-auto actions d-flex justify-content-between align-items-center">
                                                <p class="m-0 text-center price fw-semibold rounded-pill color-light-gray">
                                                    @if ($relatedProduct->offer_price > 0)
                                                        {{ currencyPosition($relatedProduct->offer_price) }}
                                                        <del>{{ currencyPosition($relatedProduct->price) }}</del>
                                                    @else
                                                        {{ currencyPosition($relatedProduct->price) }}
                                                    @endif
                                                </p>

                                                <p class="rating">
                                                    @if ($relatedProduct->reviews_avg_rating)
                                                        <p class="rating">
                                                            @for ($i = 1; $i <= $relatedProduct->reviews_avg_rating; $i++)
                                                                <i class="fas fa-star"></i>
                                                            @endfor
                                                            <span>({{ $relatedProduct->reviews_count }})</span>
                                                        </p>
                                                    @endif
                                                </p>

                                                <a class="px-3 py-2 text-white add-to-cart rounded-pill background-light-gray fs-14"
                                                    href="javascript:;"
                                                    onclick="loadProductModal('{{ $relatedProduct->id }}')">Add to
                                                    cart</a>

                                                {{-- <a class="background-light-gray"
                                                        href="{{ route('product.show', $relatedProduct->slug) }}"><i
                                                            class="far fa-eye"></i></a> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $('.related_product_slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            prevArrow: '<button type="button" class="slick-prev slick-arrow"></button>',
            nextArrow: '<button type="button" class="slick-next slick-arrow"></button>',
            responsive: [{
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });


        function resizeRelatedProductSlider() {
            var maxHeight = 0;
            // Find the tallest slide in the related product slider
            $('.related_product_slider .fp__menu_item').each(function() {
                var slideHeight = $(this).outerHeight();
                if (slideHeight > maxHeight) {
                    maxHeight = slideHeight;
                }
            });
            // Apply the tallest height to all slides in the related product slider
            $('.related_product_slider .fp__menu_item').css('height', maxHeight + 'px');
        }
        resizeRelatedProductSlider();

        // Recalculate height on window resize
        $(window).on("resize", function() {
            // Reset height before recalculating
            $('.related_product_slider .fp__menu_item').css('height', 'auto');
            resizeRelatedProductSlider();
        });





        $(document).ready(function() {
            // Initial setup
            $('.v_product_size').prop('checked', false);
            $('.v_product_option').prop('checked', false);
            $('#v_quantity').val(1);

            // Function to update the total price based on selected options
            function v_updateTotalPrice() {
                let basePrice = parseFloat(
                    '{{ $product->offer_price > 0 ? $product->offer_price : $product->price }}');
                let selectedAttributesPrice = 0;
                let quantity = parseFloat($('#v_quantity').val());

                // Calculate selected attributes price
                $('select[name="variants_items[]"], input[name="variants_items[]"]:checked, input[name^="variants_items["]:checked')
                    .each(function() {
                        let price = 0;
                        if ($(this).is('select')) {
                            price = parseFloat($(this).find('option:selected').data('price')) || 0;
                        } else if ($(this).is(':checkbox') || $(this).is(':radio')) {
                            price = parseFloat($(this).data('price')) || 0;
                        }
                        selectedAttributesPrice += price;
                    });

                // Calculate the total price
                let totalPrice = (basePrice + selectedAttributesPrice) * quantity;
                $('#v_total_price').text("{{ config('settings.site_currency_icon') }}" + totalPrice.toFixed(2));
                $('#v_hidden_total_price').val(totalPrice.toFixed(2)); // Update hidden input with total price
            }

            // Event handlers for increment and decrement buttons
            $('.v_increment').on('click', function(e) {
                e.preventDefault();
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                quantity.val(currentQuantity + 1);
                v_updateTotalPrice();
            });

            $('.v_decrement').on('click', function(e) {
                e.preventDefault();
                let quantity = $('#v_quantity');
                let currentQuantity = parseFloat(quantity.val());
                if (currentQuantity > 1) {
                    quantity.val(currentQuantity - 1);
                    v_updateTotalPrice();
                }
            });

            // Event handlers for attribute changes
            $('select[name="variants_items[]"], input[name="variants_items[]"], input[name^="variants_items["]').on(
                'change',
                function() {
                    v_updateTotalPrice();
                });

            $('.v_submit_button').on('click', function(e) {
                e.preventDefault();
                $("#v_add_to_cart_form").submit();
            });

            // Add to cart function
            $("#v_add_to_cart_form").on('submit', function(e) {
                e.preventDefault();

                // Validation
                let selectedSize = $(".v_product_size");
                if (selectedSize.length > 0) {
                    if ($(".v_product_size:checked").val() === undefined) {
                        toastr.error('Please select a size');
                        console.error('Please select a size');
                        return;
                    }
                }

                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('add-to-cart') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.v_submit_button').attr('disabled', true);
                        $('.v_submit_button').html(
                            '<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span> Loading...'
                        );
                    },
                    success: function(response) {
                        updateSidebarCart();
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errorMessage = xhr.responseJSON.message;
                        toastr.error(errorMessage);
                    },
                    complete: function() {
                        $('.v_submit_button').html('Add to Cart');
                        $('.v_submit_button').attr('disabled', false);
                    }
                });
            });

            // Initial price calculation
            v_updateTotalPrice();
        });
    </script>

    <script>
        document.getElementById('v_add_to_cart_form').addEventListener('submit', function(event) {
            let valid = true;

            // Check all required select and radio inputs
            document.querySelectorAll('.v_product_option').forEach(function(input) {
                if (input.closest('.form-group').querySelector('[required]')) {
                    if (input.value === '') {
                        valid = false;
                        input.closest('.form-group').classList.add('has-error');
                        input.closest('.form-group').scrollIntoView({
                            behavior: 'smooth'
                        });
                    } else {
                        input.closest('.form-group').classList.remove('has-error');
                    }
                }
            });

            // Prevent form submission if validation fails
            if (!valid) {
                event.preventDefault();
                alert('Please fill out all required fields.');
            }
        });
    </script>
@endpush
