<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">

<style>
    .testimonial {
        background: #262626;
    }

    .testimonial .stars {
        color: #ff9800;
    }

    .testimonial .profile img {
        width: 50px;
        height: 50px;
    }

    .testimonial .profile .name {
        font-weight: bold;
        color: #333;
    }

    .testimonial .profile .company {
        font-size: 12px;
        color: #999;
    }

    .slick-dots li button::before {
        font-size: 14px !important;
    }

    .slick-dots li.slick-active button::before {
        color: #000000 !important;
    }

    .slick-dots li button:hover::before {
        color: #000000 !important;
    }

    .popularfood .slick-dots {
        display: none !important;
    }

    .popularfood .slick-next::before,
    .popularfood .slick-prev::before {
        color: #4b637f !important;
        font-size: 35px !important;
    }
</style>

<div class="container pt-5">
    <div class="row wow fadeInUp" data-wow-duration="1s">
        <div class="col-md-8 col-lg-7 col-xl-6 m-auto text-center">
            <div class="fp__section_heading">
                <h4>Food Menu</h4>
                <h2>Our Popular Delicious Cakes</h2>
                <p>Objectively pontificate quality models before intuitive information. Dramatically
                    recaptiualize multifunctional materials.</p>
            </div>
        </div>
    </div>

    <div class="testimonial-slider popularfood">
        <div class="row mt-5 mx-2">
            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php
                    $products = \App\Models\Product::where([
                        'show_at_home' => 1,
                        'status' => 1,
                        'category_id' => $category->id,
                    ])
                        ->orderBy('id', 'DESC')
                        ->take(8)
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->get();

                ?>

                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 <?php echo e($category->slug); ?>">
                        <div class="fp__menu_item m-3">
                            <div class="fp__menu_item_img">
                                <img src="<?php echo e(asset($product->thumb_image)); ?>" alt="<?php echo e($product->name); ?>"
                                    class="img-fluid w-100">
                            </div>
                            <a class="category bg-light px-2 py-1" href="#"><?php echo e(@$product->category->name); ?></a>
                            <div class="fp__menu_item_text">
                                <?php if($product->reviews_avg_rating): ?>
                                    <p class="rating">
                                        <?php for($i = 1; $i <= $product->reviews_avg_rating; $i++): ?>
                                            <i class="fas fa-star"></i>
                                        <?php endfor; ?>

                                        <span><?php echo e($product->reviews_count); ?></span>
                                    </p>
                                <?php endif; ?>
                                <a class="title"
                                    href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                                <h5
                                    class="price fw-semibold text-center position-absolute py-1 px-3 rounded-pill color-light-gray top-0">
                                    <?php if($product->offer_price > 0): ?>
                                        <?php echo e(currencyPosition($product->offer_price)); ?>

                                        <del><?php echo e(currencyPosition($product->price)); ?></del>
                                    <?php else: ?>
                                        <?php echo e(currencyPosition($product->price)); ?>

                                    <?php endif; ?>
                                </h5>
                                <ul class="d-flex flex-wrap justify-content-center">
                                    <li><a class="background-light-gray" href="javascript:;"
                                            onclick="loadProductModal('<?php echo e($product->id); ?>')"><i
                                                class="fas fa-shopping-basket"></i></a></li>
                                    <li onclick="addToWishlist('<?php echo e($product->id); ?>')"><a class="background-light-gray"
                                            href="javascript:;"><i class="fal fa-heart"></i></a></li>
                                    <li><a class="background-light-gray"
                                            href="<?php echo e(route('product.show', $product->slug)); ?>"><i
                                                class="far fa-eye"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function() {
        $('.testimonial-slider .row').slick({
            dots: true,
            arrows: true,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2000,
            slidesToShow: 3,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1400,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 991,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>




<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/home/components/menu-item.blade.php ENDPATH**/ ?>