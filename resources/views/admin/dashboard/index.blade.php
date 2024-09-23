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
                                    fill="#4cd0e1" />
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
        <div class="tf-section-4 mb-30">
            <!-- New Customers -->
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
                            <i class="icon-users"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">New Customers (Last Week)</div>
                            <h4>{{ number_format($newCustomers) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Customers -->
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
                            <i class="icon-users"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Total Customers</div>
                            <h4>{{ number_format($totalCustomers) }}</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Conversion Rate -->
            <div class="wg-chart-default">
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap14">
                        <div class="image type-white">
                            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="52" viewBox="0 0 48 52"
                                fill="none">
                                <path
                                    d="M19.1094 2.12943C22.2034 0.343099 26.0154 0.343099 29.1094 2.12943L42.4921 9.85592C45.5861 11.6423 47.4921 14.9435 47.4921 18.5162V33.9692C47.4921 37.5418 45.5861 40.8431 42.4921 42.6294L29.1094 50.3559C26.0154 52.1423 22.2034 52.1423 19.1094 50.3559L5.72669 42.6294C2.63268 40.8431 0.726688 37.5418 0.726688 33.9692V18.5162C0.726688 14.9435 2.63268 11.6423 5.72669 9.85592L19.1094 2.12943Z"
                                    fill="#4cd0e1" />
                            </svg>
                            <i class="icon-stats"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Conversion Rate</div>
                            <h4>{{ number_format($conversionRate, 2) }}%</h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bounce Rate -->
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
                            <i class="icon-stats"></i>
                        </div>
                        <div>
                            <div class="body-text mb-2">Bounce Rate</div>
                            <h4>{{ number_format($bounceRate, 2) }}%</h4>
                        </div>
                    </div>
                </div>
            </div>








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
                <div class="wg-table table-top-product" style="max-height: 320px; overflow-y: auto;">
                    <ul class="flex flex-column gap14">
                        @foreach ($topSellingProducts as $product)
                            <li class="product-item">
                                <div class="image">
                                    <!-- Display the product's thumbnail image -->
                                    <img src="{{ asset($product->thumb_image) }}" alt="{{ $product->product_name }}">
                                </div>
                                <div class="flex items-center justify-content-evenly flex-grow">
                                    <div class="name">
                                        <a href="product-list.html"
                                            class="body-title-2">{{ Str::limit($product->product_name, 30, '...') }}</a>
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




            <!-- Orders by Status -->
            <div class="wg-box">
                <h5>Orders by Status</h5>
                <div class="card-body">
                    <canvas id="ordersByStatusChart"></canvas>
                </div>
            </div>

            <!-- /top-countries -->
        </div>
        <div class="tf-section-6 mb-30">



            <!-- category -->
            <!-- Sales Trend Chart -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Sales Trend by Month</h5>
                </div>

                <div class="text-center">
                    <canvas id="salesTrendChart"></canvas>
                </div>
            </div>




            <!-- product-overview -->
            {{-- <div class="wg-box table-product-overview">
                <ul class="table-title flex gap20 mb-14">
                    <li>
                        <div class="body-title">Product Name</div>
                    </li>
                    <li>
                        <div class="body-title">Available Quantity</div>
                    </li>
                    <li>
                        <div class="body-title">Status</div>
                    </li>
                </ul>

                <ul class="flex flex-column gap10">
                    @foreach ($lowStockAlerts as $product)
                        <li class="product-item gap14">
                            <div class="flex items-center justify-between flex-grow">
                                <div class="name">
                                    <span class="body-text">{{ $product->name }}</span>
                                </div>
                                <div class="body-text">{{ $product->quantity }}</div>
                                <div class="body-text">
                                    @if ($product->quantity == 0)
                                        <span class="text-danger">Out of Stock</span>
                                    @else
                                        <span class="text-warning">Low Stock</span>
                                    @endif
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div> --}}


        </div>
        <div class="tf-section mb-30">
            <!-- orders -->
            <div class="wg-box">
                <div class="flex items-center justify-between">
                    <h5>Recent orders</h5>

                </div>
                <div class="wg-table table-product-overview t2">
                    {{ $dataTable->table() }}
                </div>
                <!-- /orders -->
            </div>
        </div>

        <div class="tf-section-3 mb-30">
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
        </div>








        <h3>System Notifications</h3>

        <!-- Server Status -->
        <div class="status-container">
            <h4>Server Status</h4>
            <div class="status">
                <div class="status-indicator @if ($serverStatus) online @else offline @endif"></div>
                <span class="status-text">
                    @if ($serverStatus)
                        Server is running smoothly
                    @else
                        Server is down!
                    @endif
                </span>
            </div>
        </div>

        <!-- Styles -->
        <style>
            .status-container {
                font-family: Arial, sans-serif;
                margin-bottom: 20px;
            }

            .status {
                display: flex;
                align-items: center;
                gap: 10px;
            }

            .status-indicator {
                width: 10px;
                height: 10px;
                border-radius: 50%;
                background-color: grey;
                position: relative;
            }

            .online {
                background-color: green;
                animation: blink 1.5s infinite;
            }

            .offline {
                background-color: red;
            }

            .status-text {
                font-size: 14px;
                font-weight: bold;
            }

            .wg-table {
                width: 100%;
                border-collapse: collapse;
            }

            .wg-table thead th {
                background-color: #ff8282;
            }

            .wg-table tbody tr {
                border-bottom: 1px solid #eaeaea;
            }


            @keyframes blink {

                0%,
                100% {
                    opacity: 1;
                }

                50% {
                    opacity: 0.3;
                }
            }
        </style>





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



         <!-- Average Session Duration -->
         <div>
            <h3>Average Session Duration</h3>
            <p>{{ number_format($averageSessionDuration, 2) }} minutes</p>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}

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





    <script>
        var ctx = document.getElementById('ordersByStatusChart').getContext('2d');
        var ordersByStatusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: {!! json_encode($ordersByStatus->keys()) !!},
                datasets: [{
                    label: 'Orders by Status',
                    data: {!! json_encode($ordersByStatus->values()) !!},
                    backgroundColor: [
                        'rgba(63, 81, 181, 0.7)', // Indigo
                        'rgba(0, 188, 212, 0.7)', // Cyan
                        'rgba(255, 193, 7, 0.7)', // Amber
                        'rgba(76, 175, 80, 0.7)', // Green
                        'rgba(156, 39, 176, 0.7)', // Purple
                        'rgba(244, 67, 54, 0.7)' // Red
                    ],
                    borderColor: [
                        'rgba(63, 81, 181, 1)',
                        'rgba(0, 188, 212, 1)',
                        'rgba(255, 193, 7, 1)',
                        'rgba(76, 175, 80, 1)',
                        'rgba(156, 39, 176, 1)',
                        'rgba(244, 67, 54, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: 'rgba(0, 0, 0, 0.85)', // Dark mode consideration
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
    </script>







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

    {{-- <script>
        function loadLowStockAlerts(page) {
            $.ajax({
                url: "{{ route('admin.getLowStockAlerts') }}?page=" + page,
                success: function(data) {
                    $('#loading').hide(); // Hide loading spinner
                    $('#low-stock-alerts').html(data); // Update content
                }
            });
        }

        $(document).ready(function() {
            loadLowStockAlerts(1); // Initial load for page 1

            // Handle pagination click events
            $(document).on('click', '.wg-pagination a', function(e) {
                e.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                loadLowStockAlerts(page);
            });
        });
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
