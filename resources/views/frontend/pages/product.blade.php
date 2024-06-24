@extends('frontend.layouts.master')

@section('content')
<?php
print_r($products);

dd($products);
?>



<!--=============================
                            BREADCRUMB START
                        ==============================-->
<section class="fp__breadcrumb" style="background: url({{ asset(config('settings.breadcrumb')) }});">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>Wedding Cakes</h1>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="javascript:;">Wedding Cakes</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
                            BREADCRUMB END
                        ==============================-->
<style>
    .form-control {
        -webkit-appearance: button;
        -moz-appearance: button;
    }
</style>

<!--=============================
                            SEARCH MENU START
                        ==============================-->
<section class="fp__search_menu mt_120 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <form class="fp__search_menu_form" method="GET" action="{{ route('product.index') }}">
            <div class="row align-items-center">
                <div class="col-xl-3 col-md-5">
                    <input class="py-2 form-control rounded-pill" type="text" placeholder="Search..." name="search"
                        value="{{ request()->search }}">
                </div>
                <div class="col-xl-3 col-md-4">
                    <select class="py-2 form-control rounded-pill" name="parent_category" id="parent_category">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                        @if ($category->parent == 0)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="col-xl-3 col-md-4">
                    <select class="py-2 form-control rounded-pill" name="sub_category" id="sub_category">
                        <option value="">All</option>
                        @foreach ($categories as $category)
                        @if ($category->parent != 0)
                        <option value="{{ $category->id }}" data-parent="{{ $category->parent }}">
                            {{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>

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
                                const filteredOptions = subOptions.filter(option => option.dataset.parent == selectedParent);

                                // Add filtered subcategories to the subcategory select
                                filteredOptions.forEach(option => subSelect.appendChild(option));
                            });

                            // Trigger change event on page load to set initial state
                            parentSelect.dispatchEvent(new Event('change'));
                        });
                </script>

                <div class="col-xl-2 col-md-3">
                    <button type="submit" class="px-4 py-2 border border-0 rounded-pill">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            @foreach ($products as $product)
            <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_item">
                    <div class="fp__menu_item_img">
                        <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->name }}"
                            class="img-fluid w-100">
                        <a class="category" href="#">{{ $product->category->name ?? '' }}</a>
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
                        <a class="title" href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                        <h5 class="price">
                            @if ($product->offer_price > 0)
                            {{ currencyPosition($product->offer_price) }}
                            <del>{{ currencyPosition($product->price) }}</del>
                            @else
                            {{ currencyPosition($product->price) }}
                            @endif
                        </h5>
                        <ul class="flex-wrap d-flex justify-content-center">
                            <li><a href="javascript:;" onclick="loadProductModal('{{ $product->id }}')"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="{{ route('product.show', $product->slug) }}"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach

            @if ($products->isEmpty())
            <h4 class="mt-5 text-center">No Product Found!</h4>
            @endif
        </div>

        @if ($products->hasPages())
        <div class="fp__pagination mt_60">
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
