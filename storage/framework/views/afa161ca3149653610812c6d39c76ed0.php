<?php $__env->startSection('og_metatag_section'); ?>
<meta property="og:title" content="<?php echo e($blog->seo_title); ?>">
<meta property="og:description" content="<?php echo e($blog->seo_description); ?>">
<meta property="og:url" content="<?php echo e(url()->current()); ?>">
<meta property="og:image" content="<?php echo e(asset($blog->image)); ?>">
<meta property="og:site_name" content="<?php echo e(config('settings.site_name')); ?>">
<meta property="og:type" content="website">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <!--=============================
        BREADCRUMB START
    ==============================-->
    <section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
        <div class="fp__breadcrumb_overlay">
            <div class="container">
                <div class="fp__breadcrumb_text">
                    <h1>blog details</h1>
                    <ul>
                        <li><a href="index.html">home</a></li>
                        <li><a href="#">blog details</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
        BREADCRUMB END
    ==============================-->


    <!--=========================
        BLOG DETAILS START
    ==========================-->
    <section class="fp__blog_details mt_120 xs_mt_90 mb_100 xs_mb_70">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="fp__blog_det_area">
                        <div class="fp__blog_details_img wow fadeInUp" data-wow-duration="1s">
                            <img src="<?php echo e(asset($blog->image)); ?>" alt="<?php echo e($blog->title); ?>" class="imf-fluid w-100">
                        </div>
                        <div class="fp__blog_details_text wow fadeInUp" data-wow-duration="1s">
                            <ul class="details_bloger d-flex flex-wrap">
                                <li><i class="far fa-user"></i> By <?php echo e($blog->user->name); ?></li>
                                <li><i class="far fa-comment-alt-lines"></i> 12 Comments</li>
                                <li><i class="far fa-calendar-alt"></i> <?php echo e(date('d m Y', strtotime($blog->created_at))); ?></li>
                            </ul>
                            <h2><?php echo $blog->title; ?></h2>

                            <?php echo $blog->description; ?>


                            <div class="blog_tags_share d-flex flex-wrap justify-content-between align-items-center">
                                <div class="tags d-flex flex-wrap align-items-center">

                                </div>
                                <div class="share d-flex flex-wrap align-items-center">
                                    <span>share:</span>
                                    <ul class="d-flex flex-wrap">
                                        <li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(url()->current()); ?>"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo e(url()->current()); ?>&title=<?php echo e($blog->title); ?>"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="http://twitter.com/share?text=<?php echo e($blog->title); ?>&url=<?php echo e(url()->current()); ?>"><i class="fab fa-twitter"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <ul class="blog_det_button mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <?php if($nextBlog): ?>
                        <li>
                            <a href="<?php echo e(route('blogs.details', $nextBlog->slug)); ?>">
                                <img src="<?php echo e(asset($nextBlog->image)); ?>" alt="button img" class="img-fluid w-100">
                                <p><?php echo e(truncate($nextBlog->title)); ?>

                                    <span> <i class="far fa-long-arrow-left"></i> Previous</span>
                                </p>
                            </a>
                        </li>
                        <?php endif; ?>
                        <?php if($previousBlog): ?>
                        <li>
                            <a href="<?php echo e(route('blogs.details', $previousBlog->slug)); ?>">
                                <p><?php echo e(truncate($previousBlog->title)); ?>

                                    <span>next <i class="far fa-long-arrow-right"></i></span>
                                </p>
                                <img src="<?php echo e(asset($previousBlog->image)); ?>" alt="button img" class="img-fluid w-100">
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>

                    <div class="fp__comment mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4><?php echo e(count($comments)); ?> Comments</h4>
                        <?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="fp__single_comment m-0 border-0">
                            <img src="<?php echo e(asset($comment->user->avatar)); ?>" alt="review" class="img-fluid">
                            <div class="fp__single_comm_text">
                                <h3><?php echo e($comment->user->name); ?> <span><?php echo e(date('d M Y', strtotime($comment->created_at))); ?> </span></h3>
                                <p><?php echo e($comment->comment); ?></p>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php if($comments->hasPages()): ?>
                        <div class="fp__pagination mt_60">
                            <div class="row">
                                <div class="col-12">
                                    <?php echo e($comments->links()); ?>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                    </div>

                    <div class="comment_input mt_100 xs_mt_70 wow fadeInUp" data-wow-duration="1s">
                        <h4>Leave A Comment</h4>
                        <p>Required fields are marked *</p>
                        <form action="<?php echo e(route('blogs.comment.store', $blog->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="row">

                                <div class="col-xl-12">
                                    <label>comment *</label>
                                    <div class="fp__contact_form_input textarea">
                                        <span><i class="fal fa-user-alt"></i></span>
                                        <textarea rows="5" placeholder="Your Comment" name="comment"></textarea>
                                    </div>
                                    <button type="submit" class="common_btn mt_20">Submit comment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div id="sticky_sidebar">
                        <div class="fp__blog_search blog_sidebar m-0 wow fadeInUp" data-wow-duration="1s">
                            <h3>Search</h3>
                            <form action="<?php echo e(route('blogs')); ?>">
                                <input type="text" placeholder="Search" name="search">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="fp__related_blog blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Latest Post</h3>
                            <ul>
                                <?php $__currentLoopData = $latestBlogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $latestBlog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <img src="<?php echo e($latestBlog->image); ?>" alt="<?php echo e($latestBlog->title); ?>" class="img-fluid w-100">
                                    <div class="text">
                                        <a href="<?php echo e(route('blogs.details', $latestBlog->slug)); ?>"><?php echo e(truncate($latestBlog->title, 50)); ?></a>
                                        <p><i class="far fa-calendar-alt"></i> <?php echo e(date('d m Y', strtotime($latestBlog->created_at))); ?></p>
                                    </div>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                        <div class="fp__blog_categori blog_sidebar wow fadeInUp" data-wow-duration="1s">
                            <h3>Categories</h3>
                            <ul>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('blogs', ['category' => $category->slug])); ?>"><?php echo e($category->name); ?> <span><?php echo e($category->blogs_count); ?></span></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
        BLOG DETAILS END
    ==========================-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/blog-details.blade.php ENDPATH**/ ?>