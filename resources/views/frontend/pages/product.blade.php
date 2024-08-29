@extends('frontend.layouts.master')

@section('content')
    <section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
        <div class="py-5 fp__breadcrumb_overlay">
            <div class="container py-2 py-md-5">
                <div class="fp__breadcrumb_text">
                    <h1>{{ $category->name }}</h1>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="javascript:;">{{ $category->name }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <style>
        .form-control {
            -webkit-appearance: button;
            -moz-appearance: button;
        }

        .heart {
            top: 2%;
            right: 5%;
            background-color: #788a9f !important;
            padding: 10px 15px !important;
        }

        .add-to-cart {
            font-size: 18px;
        }

        .fp__menu_item_text {
            border-top: 1px solid #788a9f !important;
        }
    </style>

    <section class="py-5 fp__search_menu">
        <div class="container">
            <div class="">
                <h1 class="fw-semibold">{{ $category->name }}</h1>
                <h5 class="mt-3 color-light-gray">Edinburgh | Glasgow | Scotland</h5>
            </div>
            <div class="my-5 row">
                <div class="my-3 col-md-4">
                    <a href="/consultations">
                        <div class="position-relative">
                            <img class="rounded-3" src="{{ asset('uploads/book-a-consultation.jpg') }}" alt="">
                            <h4
                                class="top-0 position-absolute w-100 h-100 d-flex start-0 justify-content-center align-items-center text-light fw-semibold">
                                Book Free Consultation</h4>
                        </div>
                    </a>
                </div>
                <div class="my-3 col-md-4">
                    <a href="/product/wedding-cake-deposit">
                        <div class="position-relative">
                            <img class="rounded-3" src="{{ asset('uploads/secure-wedding-date.jpg') }}" alt="">
                            <h4
                                class="top-0 position-absolute w-100 h-100 d-flex start-0 justify-content-center align-items-center text-light fw-semibold">
                                Secure Your Wedding Date Here</h4>
                        </div>
                    </a>
                </div>
                <div class="my-3 col-md-4">
                    <a href="">
                        <div class="position-relative">
                            <img class="rounded-3" src="{{ asset('uploads/delicious-flavour-cake.jpg') }}" alt="">
                            <h4
                                class="top-0 position-absolute w-100 h-100 d-flex start-0 justify-content-center align-items-center text-light fw-semibold">
                                Delicious Flavour Cake</h4>
                        </div>
                    </a>
                </div>
            </div>
            <form class="p-3 searchformbackground-light-gray rounded-pill" method="GET"
                action="{{ route('category.products', $category->slug) }}">
                <div class="row justify-content-around align-items-center">
                    <div class="my-2 col-md-5 col-10">
                        <input class="py-2 form-control rounded-pill" type="text" placeholder="Search..." name="search"
                            value="{{ request()->search }}">
                    </div>
                    <div class="my-2 col-md-5 col-10">
                        <select class="py-2 form-control rounded-pill" name="sub_category" id="sub_category">
                            <option value="">All</option>
                            @foreach ($subcategories as $subcategory)
                                <option value="{{ $subcategory->id }}"
                                    {{ request()->sub_category == $subcategory->id ? 'selected' : '' }}>
                                    {{ $subcategory->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="my-2 col-md-2 col-10">
                        <button type="submit"
                            class="border border-0 wedding-cake-button rounded-pill text-light fs-5 w-100 form-control">Search</button>
                    </div>
                </div>
            </form>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const parentSelect = document.getElementById('parent_category');
                    const subSelect = document.getElementById('sub_category');
                    const subOptions = Array.from(subSelect.options);

                    parentSelect.addEventListener('change', function() {
                        const selectedParent = this.value;

                        // Clear current subcategories
                        subSelect.innerHTML = '<option value="">All</option>';

                        // Filter subcategories based on selected parent
                        const filteredOptions = subOptions.filter(option => option.dataset.parent ==
                            selectedParent);

                        // Add filtered subcategories to the subcategory select
                        filteredOptions.forEach(option => subSelect.appendChild(option));
                    });

                    // Trigger change event on page load to set initial state
                    parentSelect.dispatchEvent(new Event('change'));

                    // Maintain selected subcategory on page load
                    const selectedSubCategory = '{{ request()->sub_category }}';
                    if (selectedSubCategory) {
                        subSelect.value = selectedSubCategory;
                    }
                });
            </script>

            <div class="row">
                @foreach ($products as $product)
                    <div class="my-2 col-sm-6 col-lg-4 d-flex align-items-stretch">
                        <div class="card fp__menu_item rounded-3">
                            <div class="fp__menu_item_img">
                                <a href="{{ route('product.show', $product->slug) }}" class="my-3 title"><img
                                        src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                                        class="img-fluid w-100"></a>
                            </div>

                            <a class="heart position-absolute rounded-circle background-light-gray"
                                onclick="addToWishlist('{{ $product->id }}')" href="javascript:;"><i
                                    class="text-white fal fa-heart"></i></a>
                            <div class="card-body fp__menu_item_text position-relative d-flex flex-column">
                                <a class="px-2 py-1 category bg-light fw-semibold"
                                    href="#">{{ $product->subCategory->name ?? '' }}</a>
                                @if ($product->reviews_avg_rating)
                                    <p class="rating">
                                        @for ($i = 1; $i <= $product->reviews_avg_rating; $i++)
                                            <i class="fas fa-star"></i>
                                        @endfor
                                        <span>{{ $product->reviews_count }}</span>
                                    </p>
                                @endif
                                <a class="pb-3 title"
                                    href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                <div class="mt-auto actions d-flex justify-content-between align-items-center">
                                    <p class="m-0 price color-light-gray">
                                        @if ($product->offer_price > 0)
                                            {{ currencyPosition($product->offer_price) }}
                                            <del>{{ currencyPosition($product->price) }}</del>
                                        @else
                                            {{ currencyPosition($product->price) }}
                                        @endif
                                    </p>
                                    @if($product->quantity === 0 || $product->out_of_stock == 1)
                                    <a class="px-3 py-2 text-white rounded-pill bg-danger" href="javascript:;">
                                        Out of Stock
                                    </a>
                                @else
                                    <a class="px-3 py-2 text-white add-to-cart rounded-pill background-light-gray"
                                       href="javascript:;" onclick="loadProductModal('{{ $product->id }}')">
                                        Add to Cart
                                    </a>
                                @endif


                                    {{-- <a class="background-light-gray"
                                            href="{{ route('product.show', $product->slug) }}"><i
                                                class="far fa-eye"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($products->isEmpty())
                    <h4 class="mt-5 text-center">No Product Found!</h4>
                @endif
            </div>

            @if ($products->hasPages())
                <div class="my-5 fp__pagination">
                    <div class="row">
                        <div class="col-12">
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
