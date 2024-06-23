<?php $__env->startSection('content'); ?>
<!--=============================
                            BREADCRUMB START
                        ==============================-->
<section class="fp__breadcrumb" style="background: url(<?php echo e(asset(config('settings.breadcrumb'))); ?>);">
    <div class="fp__breadcrumb_overlay">
        <div class="container">
            <div class="fp__breadcrumb_text">
                <h1>Wedding Cakes</h1>
                <ul>
                    <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                    <li><a href="javascript:;">Wedding Cakes</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--=============================
                            BREADCRUMB END
                        ==============================-->
<style>
    .form-control {
        -webkit-appearance: button;
        -moz-appearance: button;
    }
</style>

<!--=============================
                            SEARCH MENU START
                        ==============================-->
<section class="fp__search_menu mt_120 xs_mt_90 mb_100 xs_mb_70">
    <div class="container">
        <form class="fp__search_menu_form" method="GET" action="<?php echo e(route('product.index')); ?>">
            <div class="row align-items-center">
                <div class="col-xl-3 col-md-5">
                    <input class="form-control rounded-pill py-2" type="text" placeholder="Search..." name="search"
                        value="<?php echo e(request()->search); ?>">
                </div>
                <div class="col-xl-3 col-md-4">
                    <select class="form-control rounded-pill py-2" name="parent_category" id="parent_category">
                        <option value="">All</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->parent == 0): ?>
                        <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="col-xl-3 col-md-4">
                    <select class="form-control rounded-pill py-2" name="sub_category" id="sub_category">
                        <option value="">All</option>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($category->parent != 0): ?>
                        <option value="<?php echo e($category->id); ?>" data-parent="<?php echo e($category->parent); ?>">
                            <?php echo e($category->name); ?></option>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                            const parentSelect = document.getElementById('parent_category');
                            const subSelect = document.getElementById('sub_category');
                            const subOptions = Array.from(subSelect.options);

                            parentSelect.addEventListener('change', function() {
                                const selectedParent = this.value;

                                // Clear current subcategories
                                subSelect.innerHTML = '<option value="">All</option>';

                                // Filter subcategories based on selected parent
                                const filteredOptions = subOptions.filter(option => option.dataset.parent == selectedParent);

                                // Add filtered subcategories to the subcategory select
                                filteredOptions.forEach(option => subSelect.appendChild(option));
                            });

                            // Trigger change event on page load to set initial state
                            parentSelect.dispatchEvent(new Event('change'));
                        });
                </script>

                <div class="col-xl-2 col-md-3">
                    <button type="submit" class="border border-0 py-2 px-4 rounded-pill">Search</button>
                </div>
            </div>
        </form>

        <div class="row">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xl-3 col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s">
                <div class="fp__menu_item">
                    <div class="fp__menu_item_img">
                        <img src="<?php echo e(asset($product->thumb_image)); ?>" alt="<?php echo e($product->name); ?>"
                            class="img-fluid w-100">
                        <a class="category" href="#"><?php echo e($product->category->name ?? ''); ?></a>
                    </div>
                    <div class="fp__menu_item_text">
                        <?php if($product->reviews_avg_rating): ?>
                        <p class="rating">
                            <?php for($i = 1; $i <= $product->reviews_avg_rating; $i++): ?>
                                <i class="fas fa-star"></i>
                                <?php endfor; ?>
                                <span><?php echo e($product->reviews_count); ?></span>
                        </p>
                        <?php endif; ?>
                        <a class="title" href="<?php echo e(route('product.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
                        <h5 class="price">
                            <?php if($product->offer_price > 0): ?>
                            <?php echo e(currencyPosition($product->offer_price)); ?>

                            <del><?php echo e(currencyPosition($product->price)); ?></del>
                            <?php else: ?>
                            <?php echo e(currencyPosition($product->price)); ?>

                            <?php endif; ?>
                        </h5>
                        <ul class="d-flex flex-wrap justify-content-center">
                            <li><a href="javascript:;" onclick="loadProductModal('<?php echo e($product->id); ?>')"><i
                                        class="fas fa-shopping-basket"></i></a></li>
                            <li><a href="#"><i class="fal fa-heart"></i></a></li>
                            <li><a href="<?php echo e(route('product.show', $product->slug)); ?>"><i class="far fa-eye"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php if($products->isEmpty()): ?>
            <h4 class="text-center mt-5">No Product Found!</h4>
            <?php endif; ?>
        </div>

        <?php if($products->hasPages()): ?>
        <div class="fp__pagination mt_60">
            <div class="row">
                <div class="col-12">
                    <?php echo e($products->links()); ?>

                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/pages/product.blade.php ENDPATH**/ ?>