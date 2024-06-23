<?php $__env->startSection('content'); ?>
    <!--=============================
            BREADCRUMB START
        ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>about US</h1>
                    <ul>
                        <li><a href="<?php echo e(url('/')); ?>">home</a></li>
                        <li><a href="javascript:;">about us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
            BREADCRUMB END
        ==============================-->


    <!--=============================
            ABOUT PAGE START
        ============================== -->
    <section class="fp__about_us mt_120 xs_mt_90">
        <div class="container">
            <div class="row">
			   <div class="col-xl-6 col-lg-7 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__section_heading mb_40">
                        <h4><?php echo @$about->title; ?></h4>
                        <h2><?php echo @$about->main_title; ?></h2>
                        
                    </div>
                    <div class="fp__about_us_text">
                        <?php echo @$about->description; ?>

                    </div>
                </div>
                <div class="col-xl-6 col-lg-5 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__about_">
                        <img src="<?php echo e(asset(@$about->image)); ?>" alt="about us" class="img-fluid w-100">
                    </div>
                </div>
             <style>
				.fp__about_video_overlay {
					   background: url('<?php echo e(asset('frontend/images/teasere.avif')); ?>');
					   background-repeat: no-repeat;
					  background-size: cover;
					  background-position-y: center;
				}
				.fp__about_video_text p {
					color: #f86f03;
				}
				.play_btn::before {
					background: #f86f03;
					animation: play_animate 1.3s infinite;
					-webkit-animation: play_animate 1.3s infinite;
				}
			 </style>
            </div>
        </div>
    </section>

    <!--=============================
        WHY CHOOSE START
    ==============================-->
    <!-- <?php echo $__env->make('frontend.home.components.why-choose', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> -->
    <!--=============================
        WHY CHOOSE END
    ==============================-->

    <section class="fp__about_video mt_100 xs_mt_70 my-5">
        <div class="container wow fadeInUp" data-wow-duration="1s">
            <div class="fp__about_video_bg" style="background: url(<?php echo e(getYtThumbnail(@$about->video_link, 'high')); ?>);">
                <div class="fp__about_video_overlay">
                    <div class="row">
                        <div class="col-12">
                            <div class="fp__about_video_text">
                                <p>Watch Videos</p>
                                <a class="play_btn venobox" data-autoplay="true" data-vbtype="video"
                                    href="<?php echo e(@$about->video_link); ?>">
                                    <i class=" fas fa-play"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

        <!--=============================
        TEAM START
        ==============================-->
      <!--  <?php echo $__env->make('frontend.home.components.team', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <!--=============================
        TEAM END
        ==============================-->

         <!--=============================
            COUNTER START
        ==============================-->
      <!--  <?php echo $__env->make('frontend.home.components.counter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <!--=============================
                COUNTER END
        ==============================-->
        <!--=============================
           TESTIMONIAL  START
        ==============================-->
      <!--  <?php echo $__env->make('frontend.home.components.testimonial', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>-->
        <!--=============================
                TESTIMONIAL END
        ==============================-->
    <!--=============================
            ABOUT PAGE END
        ==============================-->
		
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/about.blade.php ENDPATH**/ ?>