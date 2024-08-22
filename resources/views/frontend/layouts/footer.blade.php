@php
$footerInfo = \App\Models\FooterInfo::first();
$footerInfoTwo = \App\Models\FooterInfoTwo::first();
$footerSocials = \App\Models\FooterSocial::where('status', 1)->get();
$footerGridTwoLinks = \App\Models\FooterGridTwo::where('status', 1)->get();
$footerTitle = \App\Models\FooterTitle::first();
$footerGridThreeLinks = \App\Models\FooterGridThree::where('status', 1)->get();
$footerGridFourLinks = \App\Models\FooterGridFour::where('status', 1)->get();
@endphp

<footer>
    <div class="">
        <div class="py-5 mx-auto footer-sub wrapper w-100">


                    <div class="text-center">
                        <h2 class="text-black">Subscribe FREE to 3D Cakes Special Offers</h2>
                        <p class="mt-3 footer-color">Receive discount codes, view our latest designs and find out about special offers</p>
                    </div>


                  <form class="mt-4 subscribe_form position-relative row justify-content-center">
                     @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-4 ps-xl-5">
                            <input class="form-control" type="text" name="email" placeholder="Email Address">
                        </div>
                        <div class="mt-3 text-center col-md-2 text-md-start mt-md-0">
                            <button type="submit"
                                class="px-5 text-white border border-0 subscribe_btn background-dark-gray btn btn-dark subscribe">
                                Subscribe
                            </button>
                        </div>
                     </div>
                  </form>


        </div>

        <div class="text-white footer-menu">
            <div class="pt-5 pb-0 mx-auto pb-lg-5 wrapper w-100 row">
                <div class="col-lg-3 col-md-12 footer-info">
                    <h5 class="mt-2 mb-1 text-white mb-xl-3 fw-normal mt-xl-0">{{ @$footerInfo->name }}</h5>
                    <div class="">{!! @$footerInfo->address !!}</div>
                    <div><strong class="me-2 fal fa-solid fa-envelope "> : </strong><span class="text-white ">{{ @$footerInfo->email }}</span>
                    </div>
                    <div><strong class="me-2 fa-solid fa-phone"> : </strong><span class="text-white">{{ @$footerInfo->phone }}</span>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12 footer-info">
                    <h5 class="mt-2 mb-1 text-white mb-xl-3 fw-normal mt-xl-0">{{ @$footerInfoTwo->name }}</h5>
                    <div class="">{!! @$footerInfoTwo->address !!}</div>
                    <div><strong class="me-2 fal fa-solid fa-envelope "> : </strong>{{ @$footerInfoTwo->email }}</div>
                    <div><strong class="me-2 fa-solid fa-phone"> : </strong>{{ @$footerInfoTwo->phone }}</div>
                </div>

                <div class="col-lg-2 col-md-12 lh-lg footer-hover">
                    <h5 class="mt-2 mb-1 text-white mb-xl-3 fw-normal mt-xl-0">
                        {{ @$footerTitle->footer_grid_two_title }}</h5>
                    <div class="text-white">
                        @foreach ($footerGridTwoLinks as $link)
                        <a class="text-white text-decoration-none" href="{{ $link->url }}">{{ $link->name }}</a><br>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-2 col-md-12 lh-lg footer-hover">
                    <h5 class="mt-3 mb-0 text-white mb-xl-3 fw-normal mt-xl-0">
                        {{ @$footerTitle->footer_grid_three_title }}</h5>
                    <div class="text-white">
                        @foreach ($footerGridThreeLinks as $link)
                        <a class="text-white text-decoration-none" href="{{ $link->url }}">{{ $link->name }}</a><br>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-2 col-md-12 lh-lg footer-hover">
                    <h5 class="mt-3 mb-0 text-white mb-xl-3 fw-normal mt-xl-0">
                        {{ @$footerTitle->footer_grid_four_title }}</h5>
                    <div class="text-white">
                        @foreach ($footerGridFourLinks as $link)
                        <a class="text-white text-decoration-none" href="{{ $link->url }}">{{ $link->name }}</a><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>






        <div class="text-white footer-tile">
            <div class="py-4 mx-auto wrapper w-100 row d-flex justify-content-center align-items-center">
                <div class="col-auto col-sm-7">
                    <span class="color-white fw-semibold">© 3D Cakes. All Rights Reserved.</span>
                </div>
                <div class="col-auto text-white col-sm-5 text-end">
                    <div class="social-links">
                        @foreach ($footerSocials as $link)
                        <a href="{{ $link->url }}" class="{{ $link->icon }} fs-3 ms-2"></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>

<style>
    .social-links a {
        color: #ffffff !important;
    }

    footer {
        background-color: #f9f9f9 !important;
    }

    .form-control:focus {
        border-color: #ced4da !important;
        box-shadow: none !important;
    }

    .subscribe:hover {
        background: #8daabc !important;
    }

    .footer-tile {
        background: #253547 !important;
    }

    .footer-menu{
        background:#4b637f !important;
    }
</style>

@push('scripts')
<script>
    $(document).ready(function() {
            $('.subscribe_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '{{ route('subscribe-newsletter') }}',
                    data: formData,
                    beforeSend: function() {
                        $('.subscribe_btn').attr('disabled', true);
                        $('.subscribe_btn').html(
                            '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>'
                        );
                    },
                    success: function(response) {
                        $('.subscribe_form').trigger("reset");
                        $('.subscribe_btn').attr('disabled', false);
                        $('.subscribe_btn').html('Subscribe');
                        toastr.success(response.message);
                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                        $('.subscribe_btn').attr('disabled', false);
                        $('.subscribe_btn').html('Subscribe');
                    }
                })
            })
        })
</script>
@endpush
