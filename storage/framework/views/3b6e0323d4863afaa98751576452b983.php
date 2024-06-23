<section class="sticky-top">
    <?php
        $MainMenu = Menu::getByName('main_menu');
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light main_menu py-4 px-3">
        <div class="wrapper mx-auto w-100">
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="far fa-bars"></i>
            </button>

            
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="header-logo">
                    <a class="" href="<?php echo e(url('/')); ?>">
                        <img src="<?php echo e(asset('uploads/web-logo1.png')); ?>" alt="3D-Cakes Logo" class="w-100">
                    </a>
                </div>
                <ul class="navbar-nav m-auto">
                    
                    <?php if($MainMenu): ?>
                        <?php $__currentLoopData = $MainMenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link fw-semibold mx-2" href="<?php echo e($menu['link']); ?>"><?php echo e($menu['label']); ?>

                                    <?php if($menu['child']): ?>
                                        <i class="far fa-angle-down"></i>
                                    <?php endif; ?>
                                </a>
                                <?php if($menu['child']): ?>
                                    <ul class="droap_menu position-absolute bg-light">
                                        <?php $__currentLoopData = $menu['child']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><a class="border-bottom fw-semibold p-2"
                                                    href="<?php echo e($item['link']); ?>"><?php echo e($item['label']); ?></a>
                                            </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                <?php endif; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </ul>

                <ul class="menu_icon d-flex align-items-center flex-wrap">
                    <li>
                        <a href="#" class="menu_search mx-3 position-relative fw-semibold fs-5 transitions"><i
                                class="far fa-search"></i></a>
                        <div
                            class="fp__search_form position-fixed w-100 top-0 end-0 justify-content-center align-items-center transitions vh-100">
                            <form class="top-50 start-50 position-absolute" action="<?php echo e(route('product.index')); ?>"
                                method="GET">
                                <span
                                    class="close_search position-absolute text-center rounded-circle fs-3 mb-5 bottom-100 end-0 transitions"><i
                                        class="far fa-times"></i></span>
                                <input class="searchinput w-100 border border-0 rounded-5" type="text"
                                    placeholder="Search . . ." name="search">
                                <button
                                    class="position-absolute top-50 fw-semibold rounded-5 px-4 py-2 outline-0 transitions"
                                    type="submit">Search</button>
                            </form>
                        </div>
                    </li>
                    <li>
                        <a class="cart_icon mx-3 position-relative fw-semibold fs-5 transitions"><i
                                class="fas fa-shopping-basket"></i> <span
                                class="cart_count bg-gray position-absolute text-light fw-semibold text-center bottom-50 end-25 rounded-circle"><?php echo e(count(Cart::content())); ?></span></a>
                    </li>
                    <?php
                        @$unseenMessages = \App\Models\Chat::where([
                            'sender_id' => 1,
                            'receiver_id' => auth()->user()->id,
                            'seen' => 0,
                        ])->count();
                    ?>
                    <li>
                        <a class="message_icon mx-3 position-relative fw-semibold fs-5 transitions"
                            href="<?php echo e(route('dashboard')); ?>">
                            <i class="fas fa-comment-alt-dots"></i>
                            <span
                                class="sunseen-message-count bg-gray position-absolute text-light fw-semibold text-center end-25 ms-1 rounded-circle"><?php echo e($unseenMessages > 0 ? 1 : 0); ?></span>
                        </a>
                    </li>
                    
                    
                </ul>

            </div>
        </div>
    </nav>
</section>

<div class="fp__menu_cart_area position-fixed top-0 end-0 transitions vh-100 vw-100">
    <div class="fp__menu_cart_boody position-absolute top-0 end-0 bg-light p-4 transitions">
        <div class="fp__menu_cart_header position-relative mb-3">
            <h5 class="fw-bold">Total Item (<span class="cart_count"><?php echo e(count(Cart::content())); ?></span>)</h5>
            <span class="close_cart position-absolute text-center transitions"><i class="fal fa-times"></i></span>
        </div>
        <ul class="cart_contents">
            <?php $__currentLoopData = Cart::content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="d-flex flex-wrap justify-content-between position-relative border p-2 rounded-3">
                    <div class="menu_cart_img rounded-circle">
                        <img src="<?php echo e(asset($cartProduct->options->product_info['image'])); ?>" alt="menu"
                            class="img-fluid w-100">
                    </div>
                    <div class="menu_cart_text w-75">
                        <a class="title transitions overflow-hidden fw-semibold fs-5"
                            href="<?php echo e(route('product.show', $cartProduct->options->product_info['slug'])); ?>"><?php echo $cartProduct->name; ?>

                        </a>
                        <p class="size">Qty: <?php echo e($cartProduct->qty); ?></p>

                        <p class="size"><?php echo e(@$cartProduct->options->product_size['name']); ?>

                            <?php echo e(@$cartProduct->options->product_size['price'] ? '(' . currencyPosition(@$cartProduct->options->product_size['price']) . ')' : ''); ?>

                        </p>

                        <?php $__currentLoopData = $cartProduct->options->product_options; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartProductOption): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="extra d-block position-relative"><?php echo e($cartProductOption['name']); ?>

                                (<?php echo e(currencyPosition($cartProductOption['price'])); ?>)
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <p class="price fw-semibold mt-2"><?php echo e(currencyPosition($cartProduct->price)); ?></p>
                    </div>
                    <span class="del_icon position-absolute top-50 text-center rounded-circle"
                        onclick="removeProductFromSidebar('<?php echo e($cartProduct->rowId); ?>')"><i
                            class="fal fa-times"></i></span>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </ul>
        <p class="subtotal d-flex justify-content-between align-items-center fw-bold my-3 text-dark">SUB TOTAL <span
                class="cart_subtotal fw-bold"><?php echo e(currencyPosition(cartTotal())); ?></span></p>
        <a class="cart_view" href="<?php echo e(route('cart.index')); ?>">View Cart</a>
        
    </div>
</div>
<?php
    $reservationTimes = \App\Models\ReservationTime::where('status', 1)->get();
?>


<?php $__env->startPush('scripts'); ?>
    <script>
        $(document).ready(function() {
            $('.fp__reservation_form').on('submit', function(e) {
                e.preventDefault();
                let formData = $(this).serialize();
                $.ajax({
                    method: 'POST',
                    url: '<?php echo e(route('reservation.store')); ?>',
                    data: formData,
                    beforeSend: function() {
                        $('.btn_submit').html(
                            `<span class="spinner-border text-light"> <span>`);
                    },
                    success: function(response) {
                        toastr.success(response.message);
                        $('.fp__reservation_form').trigger("reset");
                        $('#staticBackdrop').modal('hide');

                    },
                    error: function(xhr, status, error) {
                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                            $('.btn_submit').html(`Book Table`);
                        })
                    },
                    complete: function() {
                        $('.btn_submit').html(`Book Table`);
                    }
                })
            })
        })
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /home/webchall/cakes.gprlive.com/resources/views/frontend/layouts/menu.blade.php ENDPATH**/ ?>