@php
    $selectedOption = $selectedOption ?? null;
@endphp

<section class="pt-4 pb-5">
    <div class="container mt-md-5">
        <div class="row wow fadeInUp" data-wow-duration="1s">
            <div class="m-auto text-center col-md-8 col-lg-7 col-xl-6">
                <div class="fp__section_heading">
                    <h2>Explore Our Delicious Creations & Services</h2>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            @foreach ($sliders2 as $slider)
                @if ($slider->show_at_home == $selectedOption || is_null($selectedOption) || $selectedOption === '')
                    <div class="col-12 col-md-6 col-lg-4 my-2">
                        <a class="w-100" href="{{ $slider->button_link }}">
                            <div
                                class="image-block position-relative overflow-hidden rounded-3 d-flex justify-content-center align-items-center">
                                <img src="{{ asset($slider->image) }}" class="img-fluid w-100 h-100"
                                    alt="{{ $slider->title }}">
                                <div class="gradient-overlay position-absolute w-100 h-100"></div>
                                <h3 class="overlay-text text-white text-center position-absolute">
                                    {{ $slider->title }}
                                </h3>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</section>


<style>
    /* .image-block {
        position: relative;
    }

    .image-block:hover .gradient-overlay {
        background: linear-gradient(to bottom, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
        transition: 0.7s ease;
    }

    .gradient-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        transition: 0.7s ease;
        z-index: 1;
    }

    .overlay-text {
        color: #ffffffd1 !important;
        z-index: 2;
        text-shadow: 0px -2px 25px rgba(0, 0, 0, 1),
            8px 20px 25px rgba(0, 0, 0, 1),
            1px -10px 25px rgba(0, 0, 0, 1),
            20px 20px 25px rgba(0, 0, 0, 0),
            20px 20px 25px rgba(0, 0, 0, 1);
    }

    .image-block:hover .overlay-text {
        color: #fff !important;
        transition: 0.4s ease-in-out;
    } */

    /* .image-block {
        height: 300px;
    }

    .image-textblock {
        background-color: rgba(0, 0, 0, 0.5);
        transition: opacity 0.3s ease;
        z-index: 0 !important;
    }

    .image-block:hover .image-textblock {
        opacity: 1;
    }

    .overlay-text {
        transform: translateY(100%);
        transition: transform 0.5s ease-out, opacity 0.5s ease-out;
        opacity: 0;
    }

    .image-block:hover .overlay-text {
        transform: translateY(0);
        opacity: 1;
    } */
</style>
