<nav class="navbar navbar-expand-lg main-navbar">
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

                    <a href="#" onclick="event.preventDefault();
                    this.closest('form').submit();" class="dropdown-item has-icon text-danger">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </form>

            </div>
        </li>
    </ul>
</nav>
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
            <a class="nav-link" href="{{ route('admin.testimonial.index') }}"><i class="far fa-regular fa-message"></i>
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



        <li class="dropdown {{ setSidebarActive([
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
            <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-shopping-cart"></i>
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


        <li class="dropdown {{ setSidebarActive([
                'admin.why-choose-us.*',
                'admin.banner-slider.*',
                'admin.chefs.*',
                'admin.app-download.index',
                'admin.testimonial.*',
                'admin.counter.index',
                'admin.aboutus.index',
            ]) }}">

        </li>

        <li class="dropdown {{ setSidebarActive([
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

        <li class="dropdown {{ setSidebarActive([
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
