<?php $__env->startSection('content'); ?>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>Our Latest Food Blogs</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">blogs</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=============================
        BLOG PAGE START
    ==============================-->
    <section class="fp__blog_page fp__blog2 mt_120 xs_mt_65 mb_100 xs_mb_70">
        <div class="container">
            <form class="fp__search_menu_form mb-4" action="<?php echo e(route('blogs')); ?>" method="GET">
                <div class="row">
                    <div class="col-xl-6 col-md-5">
                        <input type="text" placeholder="Search..." name="search" value="<?php echo e(@request()->search); ?>">
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <select class="nice-select" name="category">
                            <option value="">All</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option <?php if(@request()->category == $category->slug): echo 'selected'; endif; ?> value="<?php echo e($category->slug); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </select>
                    </div>
                    <div class="col-xl-2 col-md-3">
                        <button type="submit" class="common_btn">search</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-xl-4 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                    <div class="fp__single_blog">
                        <a href="<?php echo e(route('blogs.details', $blog->slug)); ?>" class="fp__single_blog_img">
                            <img src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>" class="img-fluid w-100">
                        </a>
                        <div class="fp__single_blog_text">
                            <a class="category" href="#"><?php echo e($blog->category->name); ?></a>
                            <ul class="d-flex flex-wrap mt_15">
                                <li><i class="fas fa-user"></i><?php echo e($blog->user->name); ?></li>
                                <li><i class="fas fa-calendar-alt"></i> <?php echo e(date('d m Y', strtotime($blog->created_at))); ?></li>
                                <li><i class="fas fa-comments"></i> <?php echo e($blog->comments_count); ?> comment</li>
                            </ul>
                            <a class="title" href="<?php echo e(route('blogs.details', $blog->slug)); ?>"><?php echo truncate($blog->title, 30); ?></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if($blogs->isEmpty()): ?>
                    <h5 class="text-center">No Blog Found!</h5>
                <?php endif; ?>

            </div>
            <?php if($blogs->hasPages()): ?>
            <div class="fp__pagination mt_60">
                <div class="row">
                    <div class="col-12">
                        <?php echo e($blogs->links()); ?>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section>
    <!--=============================
        BLOG PAGE END
    ==============================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/blog.blade.php ENDPATH**/ ?>