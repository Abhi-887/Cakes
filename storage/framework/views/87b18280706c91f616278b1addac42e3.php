<section class="fp__download mt_100 xs_mt_70">
    <div class="fp__download_bg" style="background: url(<?php echo e(@$appSection->background); ?>);">
        <div class="fp__download_overlay">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-5 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_img">
                            <img src="<?php echo e(@$appSection->image); ?>" alt="download" class="img-fluid w-100">
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__download_text">
                            <div class="fp__section_heading mb_25">
                                <h2><?php echo @$appSection->title; ?></h2>
                                <p><?php echo @$appSection->short_description; ?></p>
                            </div>
                            <ul class="d-flex flex-wrap">
                                <?php if(@$appSection->play_store_link): ?>
                                <li>
                                    <a href="<?php echo e(@$appSection->play_store_link); ?>">
                                        <i class="fab fa-google-play"></i>
                                        <p> <span>download from</span> google play </p>
                                    </a>
                                </li>
                                <?php endif; ?>
                                <?php if(@$appSection->apple_store_link): ?>
                                <li>
                                    <a href="<?php echo e(@$appSection->apple_store_link); ?>">
                                        <i class="fab fa-apple"></i>
                                        <p> <span>download from</span> apple store </p>
                                    </a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/app-download.blade.php ENDPATH**/ ?>