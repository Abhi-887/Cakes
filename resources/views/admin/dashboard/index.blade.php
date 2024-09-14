@extends('admin.layouts.master')

@section('content')
    {{-- <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

    </section> --}}




    <!-- main-content-wrap -->
    <div class="main-content-wrap">
        <div class="tf-section-4 mb-30">
            <!-- chart-default -->
            <div class="wg-chart-default">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap14">
                        <div class="image type-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52"
                                fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#22C55E" />
                            </svg>
                            <i class="icon-shopping-bag"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Total Sales</div>
                            <h4>{{ currencyPosition(number_format($totalSales, 2)) }}</h4>
                        </div>

                    </div>
                    <div class="box-icon-trending {{ $salesGrowth >= 0 ? 'up' : 'down' }}">
                        <i class="icon-trending-{{ $salesGrowth >= 0 ? 'up' : 'down' }}"></i>
                        <div class="body-title number">{{ number_format($salesGrowth, 2) }}%</div>
                    </div>
                </div>
                <div class="wrap-chart">
                    <div id="line-chart-1"></div>
                </div>
            </div>

            <!-- /chart-default -->
            <!-- chart-default -->
            <div class="wg-chart-default">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap14">
                        <div class="image type-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52"
                                fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#FF5200" />
                            </svg>
                            <i class="icon-dollar-sign"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Total Income</div>
                            <h4>$37,802</h4>
                        </div>
                    </div>
                    <div class="box-icon-trending down">
                        <i class="icon-trending-down"></i>
                        <div class="body-title number">1.56%</div>
                    </div>
                </div>
                <div class="wrap-chart">
                    <div id="line-chart-2"></div>
                </div>
            </div>
            <!-- /chart-default -->
            <!-- chart-default -->
            <!-- Chart Section -->
            <div class="wg-chart-default">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap14">
                        <div class="image type-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52"
                                fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#CBD5E1" />
                            </svg>
                            <i class="icon-file"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Orders Paid</div>
                            <h4>{{ number_format($totalOrders) }}</h4>
                        </div>
                    </div>
                    <div class="box-icon-trending">
                        <i class="icon-trending-up"></i>
                        <div class="body-title number">{{ number_format($percentageChange, 2) }}%</div>
                    </div>
                </div>
                <div class="wrap-chart">
                    <div id="line-chart-3"></div>
                </div>
            </div>

            <!-- /chart-default -->
            <!-- chart-default -->
            <div class="wg-chart-default">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap14">
                        <div class="image type-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52"
                                fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#2377FC" />
                            </svg>
                            <i class="icon-users"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Total Visitor</div>
                            <h4>{{ number_format($totalVisitors) }}</h4>
                        </div>
                    </div>
                    <div class="box-icon-trending {{ $percentageChange2 >= 0 ? 'up' : 'down' }}">
                        <i class="icon-trending-{{ $percentageChange2 >= 0 ? 'up' : 'down' }}"></i>
                        <div class="body-title number">{{ number_format(abs($percentageChange2), 2) }}%</div>
                    </div>

                </div>
                <div class="wrap-chart">
                    <div id="line-chart-4"></div>
                </div>
            </div>

            <!-- /chart-default -->
        </div>
        <div class="tf-section-5 mb-30">
            <!-- chart -->
            {{-- <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recent Order</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="line-chart-5"></div>
            </div> --}}
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Top Customers</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">3 days</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7 days</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="wg-table">
                    <ul class="table-title flex justify-between gap20 mb-14">
                        <li>
                            <div class="body-title">Name</div>
                        </li>
                        <li>
                            <div class="body-title">Total money</div>
                        </li>
                    </ul>

                    <ul class="flex flex-column gap18">
                        @foreach ($topCustomers as $customer)
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset($customer->avatar) }}" alt="{{ $customer->name }}">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="tf-color-3 body-text name">{{ $customer->name }}</a>
                                    <div class="text-tiny mt-4">{{ $customer->total_purchases }} Purchases</div>
                                </div>
                                <div class="body-text tf-color-3">${{ number_format($customer->total_spent, 2) }}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- /chart -->
            <!-- top-product -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Top-Selling Products</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="javascript:void(0);">3 days</a></li>
                            <li><a href="javascript:void(0);">7 days</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Set a max height and enable scrolling for product list -->
                <div class="wg-table table-top-product" style="max-height: 312px; overflow-y: auto;">
                    <ul class="flex flex-column gap14">
                        @foreach ($topSellingProducts as $product)
                            <li class="product-item">
                                <div class="image">
                                    <!-- Display the product's thumbnail image -->
                                    <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->product_name }}">
                                </div>
                                <div class="flex items-center justify-between flex-grow">
                                    <div class="name">
                                        <a href="product-list.html"
                                            class="body-title-2">{{ Str::limit($product->product_name, 20, '...') }}</a>
                                        <div class="text-tiny mt-3">{{ $product->total_qty }} Items Sold</div>
                                    </div>
                                    <div>
                                        <div class="text-tiny mb-3">Revenue</div>
                                        <div class="body-text">${{ number_format($product->total_revenue, 2) }}</div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>


            <!-- /top-product -->
            <!-- top-countries -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Top Countries By Sales</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">3 days</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7 days</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex items-center gap10">
                    <h4>$37,802</h4>
                    <div class="box-icon-trending up">
                        <i class="icon-trending-up"></i>
                        <div class="body-title number">1.56%</div>
                    </div>
                    <div class="text-tiny">since last weekend</div>
                </div>
                <ul class="flex flex-column justify-between gap10 h-full">
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/6.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Turkish Flag</a>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/7.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Belgium</a>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/8.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Sweden</a>
                            <div class="box-icon-trending down">
                                <i class="icon-trending-down"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/9.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Vietnamese</a>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/10.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Australia</a>
                            <div class="box-icon-trending down">
                                <i class="icon-trending-down"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                    <li class="country-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/country/11.png') }}" alt="">
                        </div>
                        <div class="flex-grow flex items-center justify-between">
                            <a href="countries.html" class="body-text name">Saudi Arabia</a>
                            <div class="box-icon-trending down">
                                <i class="icon-trending-down"></i>
                            </div>
                            <div class="body-text number">6,972</div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /top-countries -->
        </div>
        <div class="tf-section-6 mb-30">
            <!-- best-shop-sellers -->
            {{-- <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Best Shop Sellers</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">3 days</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7 days</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wg-table table-best-shop-sellers">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Shop</div>
                        </li>
                        <li>
                            <div class="body-title">Categories</div>
                        </li>
                        <li>
                            <div class="body-title">Total</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column gap18">
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/1.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Robert</a>
                                    <div class="text-tiny mt-4">73 Purchases</div>
                                </div>
                                <div class="body-text">Kitchen, Pets</div>
                                <div class="body-text">$1,000</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar">
                                        <span data-progress="29" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/2.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Calvin</a>
                                    <div class="text-tiny mt-4">66 Purchases</div>
                                </div>
                                <div class="body-text">Health, Grocery</div>
                                <div class="body-text">$4,000</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar t1">
                                        <span data-progress="59" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/3.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Dwight</a>
                                    <div class="text-tiny mt-4">15,890 Purchases</div>
                                </div>
                                <div class="body-text">Electronics</div>
                                <div class="body-text">$2,700</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar t2">
                                        <span data-progress="29" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/4.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Cody</a>
                                    <div class="text-tiny mt-4">15 Purchases</div>
                                </div>
                                <div class="body-text">Movies, Music</div>
                                <div class="body-text">$2,100</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar">
                                        <span data-progress="25" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/5.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Bruce</a>
                                    <div class="text-tiny mt-4">127 Purchases</div>
                                </div>
                                <div class="body-text">Sports, Fitness</div>
                                <div class="body-text">$4,400</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar t3">
                                        <span data-progress="52" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/6.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Jorge</a>
                                    <div class="text-tiny mt-4">30 Purchases</div>
                                </div>
                                <div class="body-text">Toys, Baby</div>
                                <div class="body-text">$4,750</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar t4">
                                        <span data-progress="23" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                        <li class="shop-item">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/shop/7.png') }}" alt="">
                            </div>
                            <div class="flex-grow flex items-center justify-between gap20">
                                <div>
                                    <a href="#" class="body-text name">Kristin Watson</a>
                                    <div class="text-tiny mt-4">93 Purchases</div>
                                </div>
                                <div class="body-text">Gift Cards</div>
                                <div class="body-text">$1,000</div>
                                <div class="flex items-center justify-between gap10">
                                    <div class="progress-level-bar t5">
                                        <span data-progress="45" data-max="70" class=""></span>
                                    </div>
                                    <div class="text-tiny">100%</div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> --}}
            <!-- /best-shop-sellers -->


<!-- category -->
<div class="wg-box ">
    <div class="flex items-center justify-between">
        <h5>Sales Trend by Month</h5>


    {{-- <div class="flex gap10 justify-between flex-wrap">
        <div>
            <div class="text-tiny mb-2">Total {{ \Carbon\Carbon::now()->format('M d, Y') }}</div>
            <div class="flex items-center gap10">
                <h4>${{ number_format($totalSales, 2) }}</h4>
                <div class="box-icon-trending {{ $salesGrowth > 0 ? 'up' : 'down' }}">
                    <i class="icon-trending-{{ $salesGrowth > 0 ? 'up' : 'down' }}"></i>
                    <div class="body-title number">{{ number_format($salesGrowth, 2) }}%</div>
                </div>
            </div>
        </div>
        <div class="dropdown default style-box">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <a href="product-list.html" class="view-all">Week<i class="icon-chevron-down"></i></a>
            </button>
            <ul class="dropdown-menu">
                <li>
                    <a href="javascript:void(0);">Month</a>
                </li>
                <li>
                    <a href="javascript:void(0);">Year</a>
                </li>
            </ul>
        </div>
    </div> --}}

    <div class="text-center">
        <canvas id="salesTrendChart"></canvas>
    </div>

    {{-- <div class="flex gap20 mt-4">
        @foreach($categoryLabels as $index => $label)
        <div class="block-legend style-1 w-full">
            <div class="dot t{{ $index + 1 }}"></div>
            <div class="text-tiny">{{ $label }}</div>
        </div>
        @endforeach
    </div> --}}
</div>
<!-- /category -->

{{-- <div class="wg-box">

        <div class="card-header">
            <h5 class="card-title">Orders by Status</h5>
        </div>
        <div class="card-body">
            <canvas id="ordersByStatusChart"></canvas>
        </div>

</div> --}}



            <!-- product-overview -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Product overview</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="view-all">View all<i class="icon-chevron-down"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">3 days</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">7 days</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wg-table table-product-overview">
                    <ul class="table-title flex gap20 mb-14">
                        <li>
                            <div class="body-title">Name</div>
                        </li>
                        <li>
                            <div class="body-title">Product ID</div>
                        </li>
                        <li>
                            <div class="body-title">Price</div>
                        </li>
                        <li>
                            <div class="body-title">Quantity</div>
                        </li>
                        <li>
                            <div class="body-title">Sale</div>
                        </li>
                        <li>
                            <div class="body-title">Revenue</div>
                        </li>
                        <li>
                            <div class="body-title">Status</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column gap10">
                        <li class="product-item gap14">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/products/6.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Soft Fluffy Cats</a>
                                </div>
                                <div class="body-text">#327</div>
                                <div class="body-text">$11.70</div>
                                <div class="body-text">28</div>
                                <div class="body-text">On sale</div>
                                <div class="body-text">$328.85</div>
                                <div class="block-not-available">Not Available</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/products/7.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Taste of the Wild Formula
                                        Finder</a>
                                </div>
                                <div class="body-text">#380</div>
                                <div class="body-text">$8.99</div>
                                <div class="body-text">10</div>
                                <div class="body-text">On sale</div>
                                <div class="body-text">$105.55</div>
                                <div class="block-not-available">Not Available</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/products/8.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Wellness Natural Food</a>
                                </div>
                                <div class="body-text">#126</div>
                                <div class="body-text">$5.22</div>
                                <div class="body-text">578</div>
                                <div class="body-text">--/--</div>
                                <div class="body-text">$202.87</div>
                                <div class="block-not-available">Not Available</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/products/9.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Dog Food Rachael Ray</a>
                                </div>
                                <div class="body-text">#582</div>
                                <div class="body-text">$14.81</div>
                                <div class="body-text">36</div>
                                <div class="body-text">--/--</div>
                                <div class="body-text">$475.22</div>
                                <div>
                                    <div class="block-available">Available</div>
                                </div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image">
                                <img src="{{ asset('admin2/assets/images/products/10.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Best Buddy Bits Dog
                                        Treats</a>
                                </div>
                                <div class="body-text">#293</div>
                                <div class="body-text">$6.48</div>
                                <div class="body-text">84</div>
                                <div class="body-text">--/--</div>
                                <div class="body-text">$219.78</div>
                                <div class="block-not-available">Not Available</div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="divider"></div>
                <div class="flex items-center justify-between flex-wrap gap10">
                    <div class="text-tiny">Showing 5 entries</div>
                    <ul class="wg-pagination">
                        <li>
                            <a href="#"><i class="icon-chevron-left"></i></a>
                        </li>
                        <li>
                            <a href="#">1</a>
                        </li>
                        <li class="active">
                            <a href="#">2</a>
                        </li>
                        <li>
                            <a href="#">3</a>
                        </li>
                        <li>
                            <a href="#"><i class="icon-chevron-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /product-overview -->
        </div>
        <div class="tf-section-3">
            <!-- orders -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Orders</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="wg-table table-orders">
                    <ul class="table-title flex gap10 mb-14">
                        <li>
                            <div class="body-title">Product</div>
                        </li>
                        <li>
                            <div class="body-title">Price</div>
                        </li>
                        <li>
                            <div class="body-title">Delivery date</div>
                        </li>
                    </ul>
                    <ul class="flex flex-column gap18">
                        <li class="product-item gap14">
                            <div class="image small">
                                <img src="{{ asset('admin2/assets/images/products/11.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow gap10">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Prodotti per il tuo
                                        cane...</a>
                                </div>
                                <div class="body-text">20 Nov 2023</div>
                                <div class="body-text">20 Nov 2023</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image small">
                                <img src="{{ asset('admin2/assets/images/products/12.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow gap10">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Wholesome Pride...</a>
                                </div>
                                <div class="body-text">20 Nov 2023</div>
                                <div class="body-text">20 Nov 2023</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image small">
                                <img src="{{ asset('admin2/assets/images/products/13.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow gap10">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Beneful Baked
                                        Delights...</a>
                                </div>
                                <div class="body-text">20 Nov 2023</div>
                                <div class="body-text">20 Nov 2023</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image small">
                                <img src="{{ asset('admin2/assets/images/products/14.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow gap10">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Taste of the Wild...</a>
                                </div>
                                <div class="body-text">20 Nov 2023</div>
                                <div class="body-text">20 Nov 2023</div>
                            </div>
                        </li>
                        <li class="product-item gap14">
                            <div class="image small">
                                <img src="{{ asset('admin2/assets/images/products/15.png') }}" alt="">
                            </div>
                            <div class="flex items-center justify-between flex-grow gap10">
                                <div class="name">
                                    <a href="product-list.html" class="body-text">Canagan - Britain's...</a>
                                </div>
                                <div class="body-text">20 Nov 2023</div>
                                <div class="body-text">20 Nov 2023</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /orders -->
            <!-- earnings -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Earnings</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-wrap gap40">
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t1"></div>
                                <div class="text-tiny">Revenue</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>$37,802</h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="mb-2">
                            <div class="block-legend">
                                <div class="dot t2"></div>
                                <div class="text-tiny">Profit</div>
                            </div>
                        </div>
                        <div class="flex items-center gap10">
                            <h4>$28,305</h4>
                            <div class="box-icon-trending up">
                                <i class="icon-trending-up"></i>
                                <div class="body-title number">0.56%</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="line-chart-6"></div>
            </div>
            <!-- /earnings -->
            <!-- new-comment -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>New Comments</h5>
                    <div class="dropdown default">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="icon-more"><i class="icon-more-horizontal"></i></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <a href="javascript:void(0);">This Week</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">Last Week</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <ul class="flex flex-column gap20 overflow-h">
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-2.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Kathryn Murphy</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Cras nec dolor vel est interdum</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-3.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Leslie Alexander</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Cras nec viverra justo, a mattis lacus. Vestibulum eleifend,
                                leo sit amet aliquam laoreet, turpis leo vulputate orci</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-4.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Devon Lane</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Morbi eget commodo diam. Praesent dignissim purus ac turpis
                                porta</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-5.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Eleanor Pena</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Phasellus et eros ullamcorper, efficitur eros eget, pharetra
                                ante. Sed blandit risus vitae dolor feugiat, eu vulputate elit rhoncus</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-2.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Kathryn Murphy</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                Cras nec dolor vel est interdum</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-3.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Leslie Alexander</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Cras nec viverra justo, a mattis lacus. Vestibulum eleifend,
                                leo sit amet aliquam laoreet, turpis leo vulputate orci</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-4.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Devon Lane</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Morbi eget commodo diam. Praesent dignissim purus ac turpis
                                porta</div>
                        </div>
                    </li>
                    <li class="comment-item">
                        <div class="image">
                            <img src="{{ asset('admin2/assets/images/avatar/user-5.png') }}" alt="">
                        </div>
                        <div class="">
                            <div class="mb-4 name">
                                <a href="all-user.html" class="body-title-2">Eleanor Pena</a>
                            </div>
                            <div class="ratings mb-10">
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1 active"></i>
                                <i class="icon-star1"></i>
                            </div>
                            <div class="text-tiny">Phasellus et eros ullamcorper, efficitur eros eget, pharetra
                                ante. Sed blandit risus vitae dolor feugiat, eu vulputate elit rhoncus</div>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- /new-comment -->
        </div>

    </div>

    {{-- <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Todays Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $todaysOrders }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Todays Earnings</h4>
                    </div>
                    <div class="card-body">
                        {{ currencyPosition($todaysEarnings) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>This Month Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $thisMonthsOrders }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>This Months Earnings</h4>
                    </div>
                    <div class="card-body">
                        {{ currencyPosition($thisMonthsEarnings) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>This Year Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $thisYearOrders }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>This Year Earnings</h4>
                    </div>
                    <div class="card-body">
                        {{ currencyPosition($thisYearEarnings) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-cart-plus"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Orders</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalOrders }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-dollar-sign"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Earnings</h4>
                    </div>
                    <div class="card-body">
                        {{ currencyPosition($totalEarnings) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-users"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Users</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalUsers }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-user-shield"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admins</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalAdmins }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-th"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Products</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalProducts }}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="fas fa-rss"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Blogs</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalBlogs }}
                    </div>
                </div>
            </div>
        </div>


    </div>

    <!-- Modal -->
    <div class="modal fade" id="order_modal" tabindex="-1" role="dialog" aria-labelledby="order_modal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" class="order_status_form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="">Payment Status</label>
                            <select class="form-control payment_status" name="payment_status" id="">
                                <option value="pending">Pending</option>
                                <option value="completed">Completed</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label for="">Order Status</label>
                            <select class="form-control order_status" name="order_status" id="">
                                <option value="pending">Pending</option>
                                <option value="in_process">In Process</option>
                                <option value="delivered">Delivered</option>
                                <option value="declined">Declined</option>

                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary submit_btn">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}

    <h3>System Notifications</h3>

    <!-- Server Status -->
    <div>
        <h4>Server Status</h4>
        @if ($serverStatus)
            <span style="color: green;">Server is running smoothly</span>
        @else
            <span style="color: red;">Server is down!</span>
        @endif
    </div>

    <div class="container mt-4">
        <div class="row">
            <!-- Orders by Status -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Orders by Status</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="ordersByStatusChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Site Traffic -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Site Traffic</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="trafficChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Product Categories -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Product Categories</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="categoriesChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Out of Stock Products -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Out of Stock Products</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($outOfStockProducts as $product)
                                <li class="list-group-item">
                                    {{ $product->name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Low Stock Products -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Low Stock Products</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($lowStockProducts as $product)
                                <li class="list-group-item">
                                    {{ $product->name }} - {{ $product->quantity }} in stock
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Top-Selling Products</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Quantity Sold</th>
                            <th>Revenue Generated</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topSellingProducts as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->total_qty }}</td>
                                <td>${{ number_format($product->total_revenue, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-12 mb-4">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Low Stock Alerts</h5>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Available Quantity</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($lowStockAlerts as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    @if ($product->quantity == 0)
                                        <span class="text-danger">Out of Stock</span>
                                    @else
                                        <span class="text-warning">Low Stock</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <h3>Top Customers</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Total Purchases</th>
                    <th>Total Spent</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($topCustomers as $customer)
                    <tr>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->total_purchases }}</td>
                        <td>${{ number_format($customer->total_spent, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        <h3>New Customers (Last Week)</h3>
        <p>{{ $newCustomers }}</p>
    </div>
    <div>
        <h3>Total Customers</h3>
        <p>{{ $totalCustomers }}</p>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('salesTrendChart').getContext('2d');
    var salesTrendChart = new Chart(ctx, {
        type: 'line', // Use 'line' for a trend chart
        data: {
            labels: @json($salesTrendLabels), // Array of month labels
            datasets: [{
                label: 'Sales Trend',
                data: @json($salesTrendData), // Array of sales data
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return 'Sales: $' + tooltipItem.raw.toFixed(2);
                        }
                    }
                }
            }
        }
    });
</script>




    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('ordersByStatusChart').getContext('2d');
        var ordersByStatusChart = new Chart(ctx, {
            type: 'doughnut', // or 'pie'
            data: {
                labels: {!! json_encode($ordersByStatus->keys()) !!},
                datasets: [{
                    label: 'Orders by Status',
                    data: {!! json_encode($ordersByStatus->values()) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
            }
        });
    </script>





    <!-- Conversion Rate -->
    <div>
        <h3>Conversion Rate</h3>
        <p>{{ number_format($conversionRate, 2) }}%</p>
    </div>

    <!-- Bounce Rate -->
    <div>
        <h3>Bounce Rate</h3>
        <p>{{ number_format($bounceRate, 2) }}%</p>
    </div>

    <!-- Average Session Duration -->
    <div>
        <h3>Average Session Duration</h3>
        <p>{{ number_format($averageSessionDuration, 2) }} minutes</p>
    </div>

    <!-- JavaScript for Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('trafficChart').getContext('2d');
        var trafficChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($trafficData->pluck('date')),
                datasets: [{
                    label: 'Number of Visitors',
                    data: @json($trafficData->pluck('count')),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
    {{--
                <script>
                    var options = {
                        chart: {
                            type: 'line',
                            height: 350
                        },
                        series: [{
                            name: 'Sales',
                            data: @json($salesData) // Pass data from controller
                        }],
                        xaxis: {
                            categories: @json($salesCategories) // Pass categories (e.g., months)
                        }
                    }

                    var chart = new ApexCharts(document.querySelector("#line-chart-1"), options);
                    chart.render();
                </script> --}}


    <script>
        $(document).ready(function() {
            var orderId = '';

            $(document).on('click', '.order_status_btn', function() {
                let id = $(this).data('id');

                orderId = id;

                let paymentStatus = $('.payment_status option');
                let orderStatus = $('.order_status option');

                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.orders.status', ':id') }}'.replace(":id", id),
                    beforeSend: function() {
                        $('.submit_btn').prop('disabled', true);
                    },
                    success: function(response) {
                        paymentStatus.each(function() {
                            if ($(this).val() == response.payment_status) {
                                $(this).attr('selected', 'selected');
                            }
                        })

                        orderStatus.each(function() {
                            if ($(this).val() == response.order_status) {
                                $(this).attr('selected', 'selected');
                            }
                        })

                        $('.submit_btn').prop('disabled', false);
                    },
                    error: function(xhr, status, error) {

                    }
                })
            })

            $('.order_status_form').on('submit', function(e) {
                e.preventDefault();
                let formContent = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('admin.orders.status-update', ':id') }}'.replace(":id",
                        orderId),
                    data: formContent,
                    success: function(response) {
                        $('#order_modal').modal("hide");
                        $('#order-table').DataTable().draw();

                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        toastr.error(xhr.responseJSON.message);
                    }
                })
            })
        })
    </script>
@endpush

<!-- /main-content-wrap -->
