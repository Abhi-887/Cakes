{{-- <nav class="navbar navbar-expand-lg main-navbar">
    <form class="mr-auto form-inline">
        <ul class="mr-3 navbar-nav">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>

    </form>
    <ul class="navbar-nav navbar-right">
        @php
            $notifications = \App\Models\OrderPlacedNotification::where('seen', 0)->latest()->take(10)->get();
            $unseenMessages = \App\Models\Chat::where(['receiver_id' => auth()->user()->id, 'seen' => 0])->count();
        @endphp
        @if (auth()->user()->id === 1)
            <li class="dropdown dropdown-list-toggle">
                <a href="{{ route('admin.chat.index') }}" data-toggle="dropdown"
                    class="nav-link nav-link-lg message-envelope {{ $unseenMessages > 0 ? 'beep' : '' }}"><i
                        class="far fa-envelope"></i></a>
            </li>
        @endif

        <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
                class="nav-link notification-toggle nav-link-lg notification_beep {{ count($notifications) > 0 ? 'beep' : '' }}"><i
                    class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="{{ route('admin.clear-notification') }}">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons rt_notification">
                    @foreach ($notifications as $notification)
                        <a href="{{ route('admin.orders.show', $notification->order_id) }}" class="dropdown-item">
                            <div class="text-white dropdown-item-icon bg-info">
                                <i class="fas fa-bell"></i>
                            </div>
                            <div class="dropdown-item-desc">
                                {{ $notification->message }}
                                <div class="time">{{ date('h:i A | d-F-Y', strtotime($notification->created_at)) }}
                                </div>
                            </div>
                        </a>
                    @endforeach

                </div>
                <div class="text-center dropdown-footer">
                    <a href="{{ route('admin.orders.index') }}">View All <i class="fas fa-chevron-right"></i></a>
                </div>
            </div>
        </li>

        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset(auth()->user()->avatar) }}" class="mr-1 rounded-circle">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <a href="{{ route('admin.profile') }}" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="{{ route('admin.setting.index') }}" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <a href="#"
                        onclick="event.preventDefault();
                    this.closest('form').submit();"
                        class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav> --}}

<div class="section-menu-left">
    <div class="box-logo">
        <a href="{{ route('admin.dashboard') }}" id="site-logo-inner">
            <img id="logo_header" alt="Logo" src="images/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png">
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="section-menu-left-wrap">
        <div class="center">
            <div class="center-item">
                <div class="center-heading">Dashboard</div>
                <ul class="menu-list">
                    <li class="menu-item {{ setSidebarActive(['admin.dashboard']) }}">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">
                            <div class="icon"><i class="fas fa-fire"></i></div>
                            <div class="text">Dashboard</div>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Starter</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive(['admin.slider.index', 'admin.slider-category.index']) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-images"></i></div>
                            <div class="text">Sliders</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.slider.index']) }}">
                                <a href="{{ route('admin.slider.index') }}" class="">
                                    <div class="text">Slider</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.slider-category.index']) }}">
                                <a href="{{ route('admin.slider-category.index') }}" class="">
                                    <div class="text">Slider Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item has-children {{ setSidebarActive(['admin.slider2.index', 'admin.slider-category2.index']) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-rss"></i></div>
                            <div class="text">Blocks</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.slider2.index']) }}">
                                <a href="{{ route('admin.slider2.index') }}" class="">
                                    <div class="text">Block</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.slider-category2.index']) }}">
                                <a href="{{ route('admin.slider-category2.index') }}" class="">
                                    <div class="text">Block Category</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Content</div>
                <ul class="menu-list">
                    <li class="menu-item {{ setSidebarActive(['admin.testimonial.index']) }}">
                        <a class="menu-item-button" href="{{ route('admin.testimonial.index') }}">
                            <div class="icon"><i class="far fa-regular fa-message"></i></div>
                            <div class="text">Testimonial</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.aboutus.index']) }}">
                        <a class="menu-item-button" href="{{ route('admin.aboutus.index') }}">
                            <div class="icon"><i class="far fa-regular fa-message"></i></div>
                            <div class="text">About Section</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.consultation.index']) }}">
                        <a class="menu-item-button" href="{{ route('admin.consultation.index') }}">
                            <div class="icon"><i class="fa-solid fa-business-time"></i></div>
                            <div class="text">Consultation Time</div>
                        </a>
                    </li>
                </ul>
            </div>


            <div class="center-item">
                <div class="center-heading">Orders</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive([
                        'admin.orders.index',
                        'admin.pending-orders',
                        'admin.inprocess-orders',
                        'admin.delivered-orders',
                        'admin.declined-orders'
                    ]) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-box"></i></div>
                            <div class="text">Orders</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.orders.index']) }}">
                                <a href="{{ route('admin.orders.index') }}" class="">
                                    <div class="text">All Orders</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.pending-orders']) }}">
                                <a href="{{ route('admin.pending-orders') }}" class="">
                                    <div class="text">Pending Orders</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.inprocess-orders']) }}">
                                <a href="{{ route('admin.inprocess-orders') }}" class="">
                                    <div class="text">In Process Orders</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.delivered-orders']) }}">
                                <a href="{{ route('admin.delivered-orders') }}" class="">
                                    <div class="text">Delivered Orders</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.declined-orders']) }}">
                                <a href="{{ route('admin.declined-orders') }}" class="">
                                    <div class="text">Declined Orders</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <div class="center-item">
                <div class="center-heading">Manage Products</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive([
                        'admin.category.index',
                        'admin.product.index',
                        'admin.cakes-stand.index',
                        'admin.product-reviews.index'
                    ]) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-shopping-cart"></i></div>
                            <div class="text">Manage Products</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.category.index']) }}">
                                <a href="{{ route('admin.category.index') }}" class="">
                                    <div class="text">Product Categories</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.product.index']) }}">
                                <a href="{{ route('admin.product.index') }}" class="">
                                    <div class="text">Products</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.cakes-stand.index']) }}">
                                <a href="{{ route('admin.cakes-stand.index') }}" class="">
                                    <div class="text">Cakes Stand Type</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.product-reviews.index']) }}">
                                <a href="{{ route('admin.product-reviews.index') }}" class="">
                                    <div class="text">Product Reviews</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <div class="center-item">
                <div class="center-heading">Manage Ecommerce</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive([
                        'admin.coupon.index',
                        'admin.delivery-area.index',
                        'admin.payment-setting.index'
                    ]) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-store"></i></div>
                            <div class="text">Manage Ecommerce</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.coupon.index']) }}">
                                <a href="{{ route('admin.coupon.index') }}" class="">
                                    <div class="text">Coupon</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.delivery-area.index']) }}">
                                <a href="{{ route('admin.delivery-area.index') }}" class="">
                                    <div class="text">Delivery Areas</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.payment-setting.index']) }}">
                                <a href="{{ route('admin.payment-setting.index') }}" class="">
                                    <div class="text">Payment Gateways</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Pages</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive([
                        'admin.custom-page-builder.index',
                        'admin.about.index',
                        'admin.trams-and-conditions.index',
                        'admin.contact.index',
                        'admin.contact2.index',
                        'admin.privacy-policy.index'
                    ]) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-file-alt"></i></div>
                            <div class="text">Pages</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.custom-page-builder.index']) }}">
                                <a href="{{ route('admin.custom-page-builder.index') }}" class="">
                                    <div class="text">Custom Page</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.about.index']) }}">
                                <a href="{{ route('admin.about.index') }}" class="">
                                    <div class="text">About</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.privacy-policy.index']) }}">
                                <a href="{{ route('admin.privacy-policy.index') }}" class="">
                                    <div class="text">Privacy Policy</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.trams-and-conditions.index']) }}">
                                <a href="{{ route('admin.trams-and-conditions.index') }}" class="">
                                    <div class="text">Trams and Conditions</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.contact.index']) }}">
                                <a href="{{ route('admin.contact.index') }}" class="">
                                    <div class="text">Contact</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.contact2.index']) }}">
                                <a href="{{ route('admin.contact2.index') }}" class="">
                                    <div class="text">Second Contact</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="center-item">
                <div class="center-heading">Footer</div>
                <ul class="menu-list">
                    <li class="menu-item has-children {{ setSidebarActive([
                        'admin.footer-info.index',
                        'admin.footer-info-two.index',
                        'admin.footer-socials.index',
                        'admin.footer-grid-two.index',
                        'admin.footer-grid-three.index',
                        'admin.footer-grid-four.index'
                    ]) }}">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="fas fa-th-large"></i></div>
                            <div class="text">Footer</div>
                        </a>
                        <ul class="sub-menu">
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-info.index']) }}">
                                <a href="{{ route('admin.footer-info.index') }}" class="">
                                    <div class="text">Footer Info</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-info-two.index']) }}">
                                <a href="{{ route('admin.footer-info-two.index') }}" class="">
                                    <div class="text">Footer Info Two</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-socials.index']) }}">
                                <a href="{{ route('admin.footer-socials.index') }}" class="">
                                    <div class="text">Footer Socials</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-grid-two.index']) }}">
                                <a href="{{ route('admin.footer-grid-two.index') }}" class="">
                                    <div class="text">Footer Grid Two</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-grid-three.index']) }}">
                                <a href="{{ route('admin.footer-grid-three.index') }}" class="">
                                    <div class="text">Footer Grid Three</div>
                                </a>
                            </li>
                            <li class="sub-menu-item {{ setSidebarActive(['admin.footer-grid-four.index']) }}">
                                <a href="{{ route('admin.footer-grid-four.index') }}" class="">
                                    <div class="text">Footer Grid Four</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>


            <div class="center-item">
                <ul class="menu-list">
                    @if (auth()->user()->id === 1)
                        <li class="menu-item {{ setSidebarActive(['admin.chat.index']) }}">
                            <a class="nav-link" href="{{ route('admin.chat.index') }}">
                                <div class="icon"><i class="fas fa-comment-dots"></i></div>
                                <div class="text">Messages</div>
                            </a>
                        </li>
                    @endif

                    <li class="menu-item {{ setSidebarActive(['admin.news-letter.index']) }}">
                        <a class="nav-link" href="{{ route('admin.news-letter.index') }}">
                            <div class="icon"><i class="fas fa-newspaper"></i></div>
                            <div class="text">News Letter</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.social-link.index']) }}">
                        <a class="nav-link" href="{{ route('admin.social-link.index') }}">
                            <div class="icon"><i class="fas fa-link"></i></div>
                            <div class="text">Social Links</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.menu-builder.index']) }}">
                        <a class="nav-link" href="{{ route('admin.menu-builder.index') }}">
                            <div class="icon"><i class="fas fa-list-alt"></i></div>
                            <div class="text">Menu Builder</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.admin-management.index']) }}">
                        <a class="nav-link" href="{{ route('admin.admin-management.index') }}">
                            <div class="icon"><i class="fas fa-user-shield"></i></div>
                            <div class="text">Admin Management</div>
                        </a>
                    </li>

                    <li class="menu-item {{ setSidebarActive(['admin.setting.index']) }}">
                        <a class="nav-link" href="{{ route('admin.setting.index') }}">
                            <div class="icon"><i class="fas fa-cogs"></i></div>
                            <div class="text">Settings</div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="section-content-right">

    <div class="header-dashboard">
        <div class="wrap">
            <div class="header-left">
                <a href="index.html">
                    <img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" data-width="154px" data-height="52px" data-retina="images/logo/logo@2x.png">
                </a>
                <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                </div>
                <form class="form-search flex-grow">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="show-search" name="name" tabindex="2" value="" aria-required="true" required="">
                    </fieldset>
                    <div class="button-submit">
                        <button class="" type="submit"><i class="icon-search"></i></button>
                    </div>
                    <div class="box-content-search" id="box-content-search">
                        <ul class="mb-24">
                            <li class="mb-14">
                                <div class="body-title">Top selling product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/17.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Dog Food Rachael Ray Nutrish®</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/18.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Natural Dog Food Healthy Dog Food</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="images/products/19.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Freshpet Healthy Dog Food and Cat</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="">
                            <li class="mb-14">
                                <div class="body-title">Order product</div>
                            </li>
                            <li class="mb-14">
                                <div class="divider"></div>
                            </li>
                            <li>
                                <ul>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/20.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Sojos Crunchy Natural Grain Free...</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/21.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Kristin Watson</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14 mb-10">
                                        <div class="image no-bg">
                                            <img src="images/products/22.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Mega Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mb-10">
                                        <div class="divider"></div>
                                    </li>
                                    <li class="product-item gap14">
                                        <div class="image no-bg">
                                            <img src="images/products/23.png" alt="">
                                        </div>
                                        <div class="flex items-center justify-between gap20 flex-grow">
                                            <div class="name">
                                                <a href="product-list.html" class="body-text">Mega Pumpkin Bone</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </form>
            </div>
            <div class="header-grid">
                <div class="header-item country">
                    <select class="image-select no-text">
                        <option data-thumbnail="images/country/1.png">ENG</option>
                        <option data-thumbnail="images/country/9.png">VIE</option>
                    </select>
                </div>
                <div class="header-item button-dark-light">
                    <i class="icon-moon"></i>
                </div>
                <div class="popup-wrap noti type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-bell"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1" >
                            <li>
                                <h6>Message</h6>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-11.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Cameron Williamson</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Hello?</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-12.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Ralph Edwards</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Are you there?  interested i this...</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-13.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Eleanor Pena</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Interested in this loads?</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="noti-item w-full wg-user active">
                                    <div class="image">
                                        <img src="images/avatar/user-11.png" alt="">
                                    </div>
                                    <div class="flex-grow">
                                        <div class="flex items-center justify-between">
                                            <a href="#" class="body-title">Jane Cooper</a>
                                            <div class="time">10:13 PM</div>
                                        </div>
                                        <div class="text-tiny">Okay...Do we have a deal?</div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap message type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-message-square"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2" >
                            <li>
                                <h6>Notifications</h6>
                            </li>
                            <li>
                                <div class="message-item item-1">
                                    <div class="image">
                                        <i class="icon-noti-1"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Discount available</div>
                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper nec diam</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-2">
                                    <div class="image">
                                        <i class="icon-noti-2"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Account has been verified</div>
                                        <div class="text-tiny">Mauris libero ex, iaculis vitae rhoncus et</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-3">
                                    <div class="image">
                                        <i class="icon-noti-3"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order shipped successfully</div>
                                        <div class="text-tiny">Integer aliquam eros nec sollicitudin sollicitudin</div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="message-item item-4">
                                    <div class="image">
                                        <i class="icon-noti-4"></i>
                                    </div>
                                    <div>
                                        <div class="body-title-2">Order pending: <span>ID 305830</span></div>
                                        <div class="text-tiny">Ultricies at rhoncus at ullamcorper</div>
                                    </div>
                                </div>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-item button-zoom-maximize">
                    <div class="">
                        <i class="icon-maximize"></i>
                    </div>
                </div>
                <div class="popup-wrap apps type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <i class="icon-grid"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton4" >
                            <li>
                                <h6>Related apps</h6>
                            </li>
                            <li>
                                <ul class="list-apps">
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-1.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Photoshop</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-2.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">illustrator</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-3.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Sheets</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-4.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Gmail</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-5.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Messenger</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-6.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Youtube</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-7.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Flaticon</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-8.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">Instagram</div>
                                        </a>
                                    </li>
                                    <li class="item">
                                        <div class="image">
                                            <img src="images/apps/item-9.png" alt="">
                                        </div>
                                        <a href="#">
                                            <div class="text-tiny">PDF</div>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#" class="tf-button w-full">View all app</a></li>
                        </ul>
                    </div>
                </div>
                <div class="popup-wrap user type-header">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-user wg-user">
                                <span class="image">
                                    <img src="images/avatar/user-1.png" alt="">
                                </span>
                                <span class="flex flex-column">
                                    <span class="body-title mb-2">Kristin Watson</span>
                                    <span class="text-tiny">Admin</span>
                                </span>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3" >
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-user"></i>
                                    </div>
                                    <div class="body-title-2">Account</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-mail"></i>
                                    </div>
                                    <div class="body-title-2">Inbox</div>
                                    <div class="number">27</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-file-text"></i>
                                    </div>
                                    <div class="body-title-2">Taskboard</div>
                                </a>
                            </li>
                            <li>
                                <a href="setting.html" class="user-item">
                                    <div class="icon">
                                        <i class="icon-settings"></i>
                                    </div>
                                    <div class="body-title-2">Setting</div>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="user-item">
                                    <div class="icon">
                                        <i class="icon-headphones"></i>
                                    </div>
                                    <div class="body-title-2">Support</div>
                                </a>
                            </li>
                            <li>
                                <a href="login.html" class="user-item">
                                    <div class="icon">
                                        <i class="icon-log-out"></i>
                                    </div>
                                    <div class="body-title-2">Log out</div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
