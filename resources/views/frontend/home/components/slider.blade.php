@php
    $selectedOption = null;
@endphp


<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach ($sliders as $key => $slider)
            @if ($slider->show_at_home == $selectedOption || $selectedOption === null || $selectedOption === '')
                <div class="carousel-item{{ $key === 0 ? ' active' : '' }} background{{ $key + 1 }}">
                    <div class="container width_Global">
                        <div class="row h-100 align-items-center">
                            <img src="{{ asset($slider->image) }}" class="d-block img-fluid front_image" alt="">
                            <h2>{{ $slider->title }}</h2>
                            {{-- <a class="mt-4" href="{{ $slider->button_link }}">{{ $slider->button_link }}</a> --}}
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <button class="carousel-control-prev ms-3 ms-md-5" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next me-3 me-md-5" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<style>
    .fp__banner {
        padding-top: 0 !important;
        height: auto !important;
    }

    .new-slider-item {
        background-color: #f8f8f8;
        border-radius: 10px;
        overflow: hidden;
        margin-bottom: 20px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .front_image {
        height: auto !important;
    }

    /* @media (max-width: 991px) {

        @foreach ($sliders as $key => $slider)
    .background{{ $key + 1 }} {
        height: 100% !important;
    }
    @endforeach
    }

    */ @foreach ($sliders as $key => $slider)
        .background {
                {
                $key +1
            }
        }

            {
            background-image: url("{{ asset($slider->background_image) }}");
            background-color: rgba(0, 0, 0, 0);
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
            position: relative;
            height: 645px !important;
        }

    @endforeach
    .slider-img {
        position: relative;
    }

    /* .background6 {
        height: 550px !important;
    } */

    .slider-img img {
        width: 100%;
        height: auto;
    }

    .offer-tag {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #ff6600;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-size: 14px;
    }

    .slider-content {
        padding: 30px;
    }

    .slider-content h1 {
        font-size: 36px;
        color: #333;
    }

    .slider-content h3 {
        font-size: 24px;
        color: #666;
        margin-bottom: 20px;
    }

    .slider-content p {
        font-size: 16px;
        color: #777;
        margin-bottom: 20px;
    }

    .custom-btn {
        background-color: #ff6600;
        color: #fff;
        padding: 10px 20px;
        border-radius: 5px;
        text-decoration: none;
        display: inline-block;
    }

    .carousel-control-next-icon {
        z-index: 100;
        cursor: pointer;
        position: relative;
        background: url('{{ asset(' uploads/arrow4.png') }}') no-repeat 0 0 !important;
        width: 60px;
        height: 60px;
        /* left: 20px !important; */
    }

    .carousel-control-prev-icon {
        z-index: 100;
        cursor: pointer;
        position: relative;
        background: url('{{ asset(' uploads/arrow3.png') }}') no-repeat 0 0 !important;
        width: 60px;
        height: 60px;
        /* left: 20px !important; */
    }

    .carousel-control-prev-icon:hover {
        background: url('{{ asset(' uploads/arrow1.png') }}') no-repeat 0 0 !important;
    }

    .carousel-control-next-icon:hover {
        background: url('{{ asset(' uploads/arrow2.png') }}') no-repeat 0 0 !important;
    }
</style>
