<section class="fp__blog fp__blog2 pb-5">
    <div class="fp__blog_overlay">
        <div class="container">
            <div class="row wow fadeInUp" data-wow-duration="1s">
                <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
                    <div class="fp__section_heading mb_25">
                        <h4>Our Blogs</h4>
                        <h2>Our Latest 3D Cakes Blogs</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                        <div class="fp__single_blog">
                            <a href="<?php echo e(route('blogs.details', $blog->slug)); ?>" class="fp__single_blog_img">
                                <img src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid w-100">
                            </a>
                            <div class="fp__single_blog_text">
                                <a class="category"
                                    href="<?php echo e(route('blogs', ['category' => $blog->category->slug])); ?>"><?php echo e($blog->category->name); ?></a>
                                <ul class="d-flex flex-wrap mt_15">
                                    <li><i class="fas fa-user"></i><?php echo e($blog->user->name); ?></li>
                                    <li><i class="fas fa-calendar-alt"></i>
                                        <?php echo e(date('d M Y', strtotime($blog->created_at))); ?></li>
                                    <li><i class="fas fa-comments"></i> <?php echo e($blog->comments_count); ?> comment</li>
                                </ul>
                                <a class="title"
                                    href="<?php echo e(route('blogs.details', $blog->slug)); ?>"><?php echo e(truncate($blog->title, 30)); ?></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</section>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/blog.blade.php ENDPATH**/ ?>