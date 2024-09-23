<section>
    <div id="parallax" class="py-5 bg-cover parallax-item w-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="text-center col-lg-10">
                    <h1 class="fw-semibold text-light display-5">{{ $aboutus->title }}
                        <span class="text-white fw-semibold">3D Cakes</span>
                    </h1>
                    <div class="mt-3 about-description text-white">
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

    .parallax-item {
        background-image: url({{ asset('uploads/patterned200.png') }});
        background-color: #008b8b;
    }



    /* .about-description p {
        color: white !important;
    } */
</style>

<script>
    const parallax = document.getElementById("parallax");

    window.addEventListener("scroll", function() {
        let offset = window.pageYOffset;
        parallax.style.backgroundPositionY = offset * 0.7 + "px";
    });
</script>
