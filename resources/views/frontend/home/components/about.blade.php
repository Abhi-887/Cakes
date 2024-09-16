<section>
    <div id="parallax" class="py-5 bg-cover parallax-item w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-10">
                    <h1 class="fw-semibold text-light display-5">{{ $aboutus->title }}
                        <span class="cakecolor fw-semibold">3D Cakes</span>
                    </h1>
                    <div class="mt-3 about-description">
                        {!! $aboutus->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    html {
        scroll-behavior: smooth;
    }

    .cakecolor {
        color: #ffffff !important;
    }

    .parallax-item {
        background-image: url({{ asset('uploads/patterned4.png') }});
        /* Sets the background image */
        background-color: #008b8b;
        /* Adds a fallback background color (Dark Cyan) */
        background-size: cover;
        /* Ensures the background image covers the entire element */
        background-position: center;
        /* Centers the background image */
    }



    .about-description p {
        color: white !important;
    }
</style>

<script>
    const parallax = document.getElementById("parallax");

    window.addEventListener("scroll", function() {
        let offset = window.pageYOffset;
        parallax.style.backgroundPositionY = offset * 0.7 + "px";
    });
</script>
