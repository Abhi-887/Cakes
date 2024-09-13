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
        <a href="index.html" id="site-logo-inner">
            <img class="" id="logo_header" alt="" src="images/logo/logo.png" data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" >
        </a>
        <div class="button-show-hide">
            <i class="icon-menu-left"></i>
        </div>
    </div>
    <div class="section-menu-left-wrap">
        <div class="center">
            <div class="center-item">
                <div class="center-heading">Main Home</div>
                <ul class="menu-list">
                    <li class="menu-item has-children active">
                        <a href="javascript:void(0);" class="menu-item-button">
                            <div class="icon"><i class="icon-grid"></i></div>
                            <div class="text">Dashboard</div>
                        </a>
                        <ul class="sub-menu" style="display: block;">
                            <li class="sub-menu-item">
                                <a href="index.html" class="active">
                                    <div class="text">Home 01</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-2.html" class="">
                                    <div class="text">Home 02</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-3.html" class="">
                                    <div class="text">Home 03</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-4.html" class="">
                                    <div class="text">Home 04</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-boxed.html" class="">
                                    <div class="text">Home Boxed</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-menu-icon-hover.html" class="">
                                    <div class="text">Home Menu Icon Hover</div>
                                </a>
                            </li>
                            <li class="sub-menu-item">
                                <a href="home-menu-icon-default.html" class="">
                                    <div class="text">Home Menu Icon Default</div>
                                </a>
                            </li>
                        </ul>
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
                    <img class="" id="logo_header_mobile" alt="" src="images/logo/logo.png"
                        data-light="images/logo/logo.png" data-dark="images/logo/logo-dark.png" data-width="154px"
                        data-height="52px" data-retina="images/logo/logo@2x.png">
                </a>
                <div class="button-show-hide">
                    <i class="icon-menu-left"></i>
                </div>
                <form class="form-search flex-grow">
                    <fieldset class="name">
                        <input type="text" placeholder="Search here..." class="show-search" name="name"
                            tabindex="2" value="" aria-required="true" required="">
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
                                                <a href="product-list.html" class="body-text">Dog Food Rachael Ray
                                                    Nutrish®</a>
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
                                                <a href="product-list.html" class="body-text">Natural Dog Food Healthy
                                                    Dog Food</a>
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
                                                <a href="product-list.html" class="body-text">Freshpet Healthy Dog Food
                                                    and Cat</a>
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
                                                <a href="product-list.html" class="body-text">Sojos Crunchy Natural
                                                    Grain Free...</a>
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-bell"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton1">
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
                                        <div class="text-tiny">Are you there? interested i this...</div>
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <span class="text-tiny">1</span>
                                <i class="icon-message-square"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton2">
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
                                        <div class="text-tiny">Morbi sapien massa, ultricies at rhoncus at, ullamcorper
                                            nec diam</div>
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton4"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="header-item">
                                <i class="icon-grid"></i>
                            </span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton4">
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
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton3"
                            data-bs-toggle="dropdown" aria-expanded="false">
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
                        <ul class="dropdown-menu dropdown-menu-end has-content" aria-labelledby="dropdownMenuButton3">
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









<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">{{ config('settings.site_name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">3D </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}"><a class="nav-link"
                    href="{{ route('admin.dashboard') }}"><i class="fas fa-fire"></i>
                    Dashboard</a>
            </li>

            <li class="menu-header">Starter</li>



            <li class="dropdown {{ setSidebarActive(['admin.slider.index']) }}">

                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-images"></i>
                    <span>Sliders </span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.slider.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider.index') }}">Slider</a></li>
                    <li class="{{ setSidebarActive(['admin.slider-category.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider-category.index') }}">Slider Category</a></li>
                </ul>

            </li>


            <li class="dropdown {{ setSidebarActive(['admin.slider2.index']) }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown">
                    <i class="fas fa-rss"></i>
                    <span>Blocks </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.slider2.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider2.index') }}">Block</a>
                    <li class="{{ setSidebarActive(['admin.slider-category2.*']) }}"><a class="nav-link"
                            href="{{ route('admin.slider-category2.index') }}">Block Category</a></li>
            </li>

        </ul>
        </li>



        <li class="{{ setSidebarActive(['admin.testimonial.*']) }}">
            <a class="nav-link" href="{{ route('admin.testimonial.index') }}"><i
                    class="far fa-regular fa-message"></i>
                <span>Testimonial</span>
            </a>
        </li>

        <li class="{{ setSidebarActive(['admin.aboutus.*']) }}">
            <a class="nav-link" href="{{ route('admin.aboutus.index') }}"><i class="far fa-regular fa-message"></i>
                <span>About Section</span>
            </a>
        </li>


        <li class="{{ setSidebarActive(['admin.consultation.*']) }}">
            <a class="nav-link" href="{{ route('admin.consultation.index') }}"><i
                    class="fa-solid fa-business-time"></i></i>
                <span>Consultation Time</span>
            </a>
        </li>
        {{-- <li class="{{ setSidebarActive(['admin.Weddingcakesdeposit.index']) }}">
            <a class="nav-link" href="{{ route('admin.Weddingcakesdeposit.index') }}"><i
                    class="fa-solid fa-bookmark"></i></i>
                <span>Wedding Booking Schedule </span>
            </a>
        </li> --}}
        <li class="{{ setSidebarActive(['admin.work-with-us.index']) }}">
            <a class="nav-link" href="{{ route('admin.work-with-us.index') }}"><i
                    class="fa-solid fa-house-laptop"></i></i>
                <span>Work With Us </span>
            </a>
        </li>
        <li class="{{ setSidebarActive(['admin.customer-feedback.*']) }}">
            <a class="nav-link" href="{{ route('admin.customer-feedback.index') }}"><i
                    class="fa-solid fa-comment-dots"></i></i>
                <span>Customer Feedback</span>
            </a>
        </li>



        <li
            class="dropdown {{ setSidebarActive([
                'admin.orders.index',
                'admin.pending-orders',
                'admin.inprocess-orders',
                'admin.delivered-orders',
                'admin.declined-orders',
            ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-box"></i>
                <span>Orders </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.orders.index']) }}"><a class="nav-link"
                        href="{{ route('admin.orders.index') }}">All Orders</a></li>
                <li class="{{ setSidebarActive(['admin.pending-orders']) }}"><a class="nav-link"
                        href="{{ route('admin.pending-orders') }}">Pending Orders</a></li>
                <li class="{{ setSidebarActive(['admin.inprocess-orders']) }}"><a class="nav-link"
                        href="{{ route('admin.inprocess-orders') }}">In Process Orders</a></li>
                <li class="{{ setSidebarActive(['admin.delivered-orders']) }}"><a class="nav-link"
                        href="{{ route('admin.delivered-orders') }}">Delivered Orders</a></li>
                <li class="{{ setSidebarActive(['admin.declined-orders']) }}"><a class="nav-link"
                        href="{{ route('admin.declined-orders') }}">Decliend Orders</a></li>
            </ul>
        </li>

        <li
            class="dropdown {{ setSidebarActive(['admin.category.*', 'admin.product.*', 'admin.product-reviews.index']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-shopping-cart"></i>
                <span>Manage Products </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                        href="{{ route('admin.category.index') }}">Product Categories</a></li>
                <li class="{{ setSidebarActive(['admin.product.*']) }}"><a class="nav-link"
                        href="{{ route('admin.product.index') }}">Products</a></li>
                <li class="{{ setSidebarActive(['admin.cakes-stand.index']) }}"><a class="nav-link"
                        href="{{ route('admin.cakes-stand.index') }}">Cakes Stand Type</a></li>
                <li class="{{ setSidebarActive(['admin.product-reviews.index']) }}"><a class="nav-link"
                        href="{{ route('admin.product-reviews.index') }}">Product Reviews</a>
                </li>
            </ul>
        </li>

        <li
            class="dropdown {{ setSidebarActive(['admin.coupon.*', 'admin.delivery-area.*', 'admin.payment-setting.index']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-store"></i>
                <span> Manage Ecommerce </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.coupon.*']) }}">
                    <a class="nav-link" href="{{ route('admin.coupon.index') }}">Coupon</a>
                    <a class="nav-link" href="{{ route('admin.coupon_usage_logs.index') }}">Coupon Usage</a>
                </li>

                <li class="{{ setSidebarActive(['admin.delivery-area.*']) }}"><a class="nav-link"
                        href="{{ route('admin.delivery-area.index') }}">Delivery Areas</a></li>
                <li class="{{ setSidebarActive(['admin.payment-setting.index']) }}"><a class="nav-link"
                        href="{{ route('admin.payment-setting.index') }}">Payment Gateways</a>
                </li>

            </ul>
        </li>

        {{-- <li class="dropdown {{ setSidebarActive(['admin.reservation-time.*', 'admin.reservation.index']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-chair"></i>
                <span>Manage Reservations </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.reservation-time.*']) }}"><a class="nav-link"
                        href="{{ route('admin.reservation-time.index') }}">Reservation Times</a></li>
                <li class="{{ setSidebarActive(['admin.reservation.index']) }}"><a class="nav-link"
                        href="{{ route('admin.reservation.index') }}">Reservation</a></li>
            </ul>
        </li> --}}

        @if (auth()->user()->id === 1)
            <li class="{{ setSidebarActive(['admin.chat.index']) }}"><a class="nav-link"
                    href="{{ route('admin.chat.index') }}"><i class="fas fa-comment-dots"></i>
                    <span>Messages</span></a></li>
        @endif

        <li
            class="dropdown {{ setSidebarActive(['admin.blog-category.*', 'admin.blogs.*', 'admin.blogs.comments.index']) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-rss"></i>
                <span> Blog </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.blog-category.*']) }}"><a class="nav-link"
                        href="{{ route('admin.blog-category.index') }}">Categories</a></li>
                <li class="{{ setSidebarActive(['admin.blogs.*']) }}"><a class="nav-link"
                        href="{{ route('admin.blogs.index') }}">All Blogs</a></li>
                <li class="{{ setSidebarActive(['admin.blogs.comments.index']) }}"><a class="nav-link"
                        href="{{ route('admin.blogs.comments.index') }}">Comments</a></li>
        </li>
        </ul>
        </li>


        <li
            class="dropdown {{ setSidebarActive([
                'admin.why-choose-us.*',
                'admin.banner-slider.*',
                'admin.chefs.*',
                'admin.app-download.index',
                'admin.testimonial.*',
                'admin.counter.index',
                'admin.aboutus.index',
            ]) }}">

        </li>

        <li
            class="dropdown {{ setSidebarActive([
                'admin.custom-page-builder.*',
                'admin.about.index',
                'admin.trams-and-conditions.index',
                'admin.contact.index',
                'admin.contact2.index',
                'admin.privacy-policy.index',
            ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-file-alt"></i>
                <span>Pages </span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.custom-page-builder.*']) }}"><a class="nav-link"
                        href="{{ route('admin.custom-page-builder.index') }}">Custom Page</a></li>

                <li class="{{ setSidebarActive(['admin.about.index']) }}"><a class="nav-link"
                        href="{{ route('admin.about.index') }}">About</a></li>
                <li class="{{ setSidebarActive(['admin.privacy-policy.index']) }}"><a class="nav-link"
                        href="{{ route('admin.privacy-policy.index') }}">Privacy Policy</a></li>
                <li class="{{ setSidebarActive(['admin.trams-and-conditions.index']) }}"><a class="nav-link"
                        href="{{ route('admin.trams-and-conditions.index') }}">Trams and
                        Conditions</a></li>
                <li class="{{ setSidebarActive(['admin.contact.index']) }}"><a class="nav-link"
                        href="{{ route('admin.contact.index') }}">Contact</a></li>

                <li class="{{ setSidebarActive(['admin.contact2.index']) }}"><a class="nav-link"
                        href="{{ route('admin.contact2.index') }}">Second Contact</a></li>

            </ul>
        </li>

        <li
            class="dropdown {{ setSidebarActive([
                'admin.footer-info.index',
                'admin.footer-info-two.index',
                'admin.footer-socials.*',
                'admin.footer-grid-two.*',
                'admin.footer-grid-three.*',
                'admin.footer-grid-four.*',
            ]) }}">
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i
                    class="fas fa-th-large"></i><span>Footer</span></a>
            <ul class="dropdown-menu">
                <li class="{{ setSidebarActive(['admin.footer-info.index']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>

                <li class="{{ setSidebarActive(['admin.footer-info-two.index']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-info-two.index') }}">Footer Info Two</a></li>

                <li class="{{ setSidebarActive(['admin.footer-socials.*']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-socials.index') }}">Footer Socials</a></li>

                <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a>
                </li>

                <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-grid-three.index') }}">Footer Grid
                        Three</a></li>

                <li class="{{ setSidebarActive(['admin.footer-grid-four.*']) }}"><a class="nav-link"
                        href="{{ route('admin.footer-grid-four.index') }}">Footer Grid Four
                    </a></li>

            </ul>
        </li>

        <li class="{{ setSidebarActive(['admin.news-letter.index']) }}"><a class="nav-link"
                href="{{ route('admin.news-letter.index') }}"><i class="fas fa-newspaper"></i>
                <span>News Letter</span></a></li>

        <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                href="{{ route('admin.social-link.index') }}"><i class="fas fa-link"></i>
                <span>Social Links</span></a></li>



        <li class="{{ setSidebarActive(['admin.menu-builder.index']) }}"><a class="nav-link"
                href="{{ route('admin.menu-builder.index') }}"><i class="fas fa-list-alt"></i>
                <span>Menu Builder</span></a></li>

        <li class="{{ setSidebarActive(['admin.admin-management.*']) }}"><a class="nav-link"
                href="{{ route('admin.admin-management.index') }}"><i class="fas fa-user-shield"></i>
                <span>Admin Management</span></a></li>

        <li class="{{ setSidebarActive(['admin.setting.index']) }}"><a class="nav-link"
                href="{{ route('admin.setting.index') }}"><i class="fas fa-cogs"></i>
                <span>Settings</span></a></li>

        {{-- <li class="{{ setSidebarActive(['admin.clear-database.index*']) }}"><a class="nav-link"
                href="{{ route('admin.clear-database.index') }}"><i class="fas fa-exclamation-triangle"></i>
                <span>Clear Database</span></a></li> --}}
    </aside>
</div>
