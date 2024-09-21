<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>{{ config('settings.site_name') }} | Dashboard</title>
    <link rel="icon" href="{{ asset('frontend/images/3d-cakes-favicon.png') }}" type="image/x-icon">
    <!-- General CSS Files -->


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin2/assets/css/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin2/assets/css/animation.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin2/assets/css/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin2/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin2/assets/css/style.css') }}">




    <link rel="stylesheet" href="{{ asset('admin/assets/css/toastr.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-iconpicker.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('admin/assets/modules/select2/dist/css/select2.min.css') }}">

    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}"> --}}

    <!-- Font -->

    <link rel="stylesheet" href="{{ asset('admin2/assets/font/fonts.css') }}">

    <!-- Icon -->
    <link rel="stylesheet" href="{{ asset('admin2/assets/icon/style.css') }}">



    <link rel="stylesheet" href="{{ asset('admin/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/components.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        var pusherKey = "{{ config('settings.pusher_key') }}";
        var pusherCluster = "{{ config('settings.pusher_cluster') }}";
        var loggedInUserId = "{{ auth()->user()->id }}";
    </script>

    {{-- <!-- /END GA -->
    @vite(['resources/js/app.js', 'resources/js/admin.js']) --}}

</head>

<body>

    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <!-- layout-wrap -->
            <div class="layout-wrap">
                <!-- preload -->
                <div id="preload" class="preload-container">
                    <div class="preloading">
                        <span></span>
                    </div>
                </div>

                @include('admin.layouts.sidebar')

                <!-- /section-content-right -->

                <div class="section-content-right">

                    <div class="header-dashboard">
                        <div class="wrap">
                            <div class="header-left">
                                <div class="button-show-hide">
                                    <i class="icon-menu-left"></i>
                                </div>
                                {{-- <form class="form-search flex-grow" method="GET" action="{{ route('search') }}">
                                        <fieldset class="name">
                                            <input type="text" placeholder="Search here..." class="show-search"
                                                name="query" tabindex="2" value="" aria-required="true" required>
                                        </fieldset>
                                        <div class="button-submit">
                                            <button type="submit"><i class="icon-search"></i></button>
                                        </div>
                                    </form> --}}
                            </div>

                            <div class="header-grid">
                                @php
                                    $notifications = \App\Models\OrderPlacedNotification::where('seen', 0)
                                        ->latest()
                                        ->take(10)
                                        ->get();
                                    $unseenMessages = \App\Models\Chat::where([
                                        'receiver_id' => auth()->user()->id,
                                        'seen' => 0,
                                    ])->count();
                                @endphp

                                <div class="header-item button-dark-light">
                                    <i class="icon-moon"></i>
                                </div>

                                <div class="popup-wrap noti type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">{{ count($notifications) }}</span>
                                                <i class="icon-bell"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton1">
                                            <li>
                                                <h6>Notifications</h6>
                                            </li>
                                            @foreach ($notifications as $notification)
                                                <li>
                                                    <div class="noti-item w-full wg-user active">
                                                        <div class="image">
                                                            <i class="icon-noti-{{ $loop->index + 1 }}"></i>
                                                        </div>
                                                        <div class="flex-grow">
                                                            <div class="flex items-center justify-between">
                                                                <a href="{{ route('admin.orders.show', $notification->order_id) }}"
                                                                    class="body-title">{{ $notification->message }}</a>
                                                                <div class="time">
                                                                    {{ date('h:i A', strtotime($notification->created_at)) }}
                                                                </div>
                                                            </div>
                                                            <div class="text-tiny">
                                                                {{ date('d-F-Y', strtotime($notification->created_at)) }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            <li><a href="{{ route('admin.orders.index') }}"
                                                    class="tf-button w-full">View all</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="popup-wrap message type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-item">
                                                <span class="text-tiny">{{ $unseenMessages }}</span>
                                                <i class="icon-message-square"></i>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton2">
                                            <li>
                                                <h6>Messages</h6>
                                            </li>
                                            <!-- Loop through messages here -->
                                            <li><a href="{{ route('admin.chat.index') }}" class="tf-button w-full">View
                                                    all</a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="header-item button-zoom-maximize">
                                    <i class="icon-maximize"></i>
                                </div>

                                <div class="popup-wrap user type-header">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                            id="dropdownMenuButton3" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="header-user wg-user">
                                                <span class="image">
                                                    <img src="{{ asset(auth()->user()->avatar) }}" alt="">
                                                </span>
                                                <span class="flex flex-column">
                                                    <span class="body-title mb-2">{{ auth()->user()->name }}</span>
                                                    <span class="text-tiny">Admin</span>
                                                </span>
                                            </span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end has-content"
                                            aria-labelledby="dropdownMenuButton3">
                                            <li><a href="{{ route('admin.profile') }}" class="user-item"><i
                                                        class="icon-user"></i> Account</a></li>
                                            {{-- <li><a href="{{ route('admin.inbox') }}" class="user-item"><i
                                                            class="icon-mail"></i> Inbox <span
                                                            class="number">{{ $unseenMessages }}</span></a></li> --}}
                                            <li><a href="{{ route('admin.setting.index') }}" class="user-item"><i
                                                        class="icon-settings"></i> Settings</a></li>
                                            <li><a href="{{ route('logout') }}" class="user-item"><i
                                                        class="icon-log-out"></i> Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Main Content -->
                    <div class="main-content">
                        <div class="main-content-inner">
                            @yield('content')
                        </div>
                        <div class="bottom-page">
                            <div class="body-text">Copyright © 2024 3d cakes</div>
                            <i class="icon-heart"></i>
                            <div class="body-text">by - </a> All rights reserved.</div>
                        </div>
                    </div>

                </div>



            </div>

        </div>

    </div>





    <!-- General JS Scripts -->
    <script src="{{ asset('admin/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/stisla.js') }}"></script>

    <script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/bootstrap-iconpicker.bundle.min.js') }}"></script>



    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('admin/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>

    <script src="{{ asset('admin/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('admin/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>


    <!-- Javascript -->
    <script src="{{ asset('admin2/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/zoom.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-1.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-2.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-3.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-4.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-5.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/apexcharts/line-chart-6.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/switcher.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/theme-settings.js') }}"></script>
    <script src="{{ asset('admin2/assets/js/main.js') }}"></script>
    <script src="{{ asset('admin/assets/modules/summernote/summernote-bs4.js') }}"></script>




    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>


    <!-- show dynamic validation message-->
    <script>
        toastr.options.progressBar = true;

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}")
            @endforeach
        @endif
    </script>

    <script>
        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null // Default: null
        });

        $(document).ready(function() {

            $('body').on('click', '.delete-item', function(e) {
                e.preventDefault()

                let url = $(this).attr('href');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            method: 'DELETE',
                            url: url,
                            data: {
                                _token: "{{ csrf_token() }}"
                            },
                            success: function(response) {
                                if (response.status === 'success') {
                                    toastr.success(response.message)

                                    window.location.reload();

                                } else if (response.status === 'error') {
                                    toastr.error(response.message)
                                }
                            },
                            error: function(error) {
                                console.error(error);
                            }
                        })
                    }
                })
            })

        })
    </script>

    @stack('scripts')
</body>

</html>
