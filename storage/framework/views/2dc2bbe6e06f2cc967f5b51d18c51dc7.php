<section>
    <div id="parallax" class="parallax-item py-5 w-100 bg-cover">
        <div class="container">
            <div class="text-center">
                <h1 class="fw-bold text-light display-5"><?php echo e($aboutus->title); ?><span
                        class="cakecolor fw-semibold display-6 ms-3">3D Cakes</span></h1>
                <div class="about-description mt-3"><?php echo $aboutus->description; ?></div>
            </div>
        </div>
    </div>
</section>


<style>
    html {
        scroll-behavior: smooth;
    }

    .cakecolor {
        color: #90afc4 !important;
    }

    .parallax-item {
        background: url(<?php echo e(asset('uploads/nav-bg.jpg')); ?>);
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
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/about.blade.php ENDPATH**/ ?>