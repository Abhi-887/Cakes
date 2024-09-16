<?php

use App\Events\RTOrderPlacedNotificationEvent;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ChatController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CustomPageController;
use App\Http\Controllers\Frontend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\ConsultationController;
use App\Http\Controllers\Frontend\WeddingcakesdepositController;
use App\Http\Controllers\Frontend\WorkwithusController;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOption;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CaptchaController;
use App\Http\Controllers\Frontend\CustomerfeedbackController;
use App\Http\Controllers\TopProductController;

Route::get('/admin/subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('admin.subcategories');
Route::get('/uploads/{path}', function ($path) {
    return response()->file(public_path('uploads/' . $path));
})->where('path', '.*')->middleware('resize.image');
Route::get('/recent-orders', [AdminDashboardController::class, 'recentOrders'])->name('admin.recentOrders');
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


/** Admin Auth Routes */
Route::group(['middleware' => 'guest'], function () {
    Route::get('admin/login', [AdminAuthController::class, 'index'])->name('admin.login');
    Route::get('admin/forget-password', [AdminAuthController::class, 'forgetPassword'])->name('admin.forget-password');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::post('profile/avatar', [ProfileController::class, 'updateAvatar'])->name('profile.avatar.update');
    Route::post('address', [DashboardController::class, 'createAddress'])->name('address.store');
    Route::put('address/{id}/edit', [DashboardController::class, 'updateAddress'])->name('address.update');
    Route::delete('address/{id}', [DashboardController::class, 'destroyAddress'])->name('address.destroy');
    /** Chat Routes */
    Route::post('chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.send-message');
    Route::get('chat/get-conversation/{senderId}', [ChatController::class, 'getConversation'])->name('chat.get-conversation');
});

require __DIR__ . '/auth.php';

/** Show Home page */
Route::get('/', [FrontendController::class, 'index'])->name('home');

/** Brithday-&-party-cakes page*/
Route::get('/brithday-&-party-cakes', function () {
    return view('frontend.pages.birthday-party-cakes');
});

Route::get('/api/top-selling-products', [TopProductController::class, 'getTopSellingProducts']);


/** Cupcake*/
Route::get('/cupcake', function () {
    return view('frontend.pages.cupcake');
});

/** Classic Wedding Cake Voucher */
Route::get('/classic-wedding-cake-voucher', function () {
    return view('frontend.pages.classic-wedding-cake-voucher');
});

/** Achievements-awards*/
Route::get('/achievements-awards', function () {
    return view('frontend.pages.achievements-awards');
});

/** Corporate*/
Route::get('/corporate', function () {
    return view('frontend.pages.corporate');
});

/** voucher-redemption page*/
Route::get('/voucher-redemption', function () {
    return view('frontend.pages.voucher-redemption');
});

// web.php (Routes file)
Route::get('/products/{slug}', [FrontendController::class, 'showCategoryProducts'])->name('category.show');


/** Chef page */
Route::get('/chef', [FrontendController::class, 'chef'])->name('chef');
/** Testimonial page */
Route::get('/testimonials', [FrontendController::class, 'testimonial'])->name('testimonial');

/** Consultation page */
Route::get('/consultations', [ConsultationController::class, 'create'])->name('consultations');
Route::post('/consultations/store', [ConsultationController::class, 'store'])->name('consultations.store');

/** wedding-cake-deposit page */
Route::get('/wedding-cake-deposit', [WeddingcakesdepositController::class, 'create'])->name('wedding-cake-deposit');
Route::post('/wedding-cake-deposit/store', [WeddingcakesdepositController::class, 'store'])->name('wedding-cake-deposit.store');

/** work-with-us page */
Route::get('/work-with-us', [WorkwithusController::class, 'create'])->name('work-with-us.create');
Route::post('/work-with-us', [WorkwithusController::class, 'store'])->name('work-with-us.store');

/** customer-feedback page */
Route::get('/customer-feedback', [CustomerfeedbackController::class, 'create'])->name('customer-feedback.create');
Route::post('/customer-feedback', [CustomerfeedbackController::class, 'store'])->name('customer-feedback.store');

/** Blogs Routes */
Route::get('/blogs', [FrontendController::class, 'blog'])->name('blogs');
Route::get('/blogs/{slug}', [FrontendController::class, 'blogDetails'])->name('blogs.details');
Route::post('/blogs/comment/{blog_id}', [FrontendController::class, 'blogCommentStore'])->name('blogs.comment.store');

/** About Routes */
Route::get('/about', [FrontendController::class, 'about'])->name('about');

/** Privacy Policy Routes */
Route::get('/privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('privacy-policy.index');

/** Trams and Conditions Routes */
Route::get('/trams-and-conditions', [FrontendController::class, 'tramsAndConditions'])->name('trams-and-conditions');

/** Contact Routes */
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact.index');
Route::post('/contact', [FrontendController::class, 'sendContactMessage'])->name('contact.send-message');

/** Reservation Routes */
Route::post('/reservation', [FrontendController::class, 'reservation'])->name('reservation.store');

/** Newsletter Routes */
Route::post('/subscribe-newsletter', [FrontendController::class, 'subscribeNewsletter'])->name('subscribe-newsletter');

/** Custom Page Routes */
Route::get('about/{slug}', CustomPageController::class);

/** Product page Route*/
Route::get('/products', [FrontendController::class, 'products'])->name('product.index');


/** Show Product details page */
Route::get('/product/{slug}', [FrontendController::class, 'showProduct'])->name('product.show');

Route::get('/category/{slug}', [FrontendController::class, 'showCategoryProducts'])->name('category.products');

/** Product Modal Route */
Route::get('/load-product-modal/{productId}', [FrontendController::class, 'loadProductModal'])->name('load-product-modal');

Route::post('product-review', [FrontendController::class, 'productReviewStore'])->name('product-review.store');

/** Add to cart Route */
Route::post('add-to-cart', [CartController::class, 'addToCart'])->name('add-to-cart');
Route::get('get-cart-products', [CartController::class, 'getCartProduct'])->name('get-cart-products');
Route::get('cart-product-remove/{rowId}', [CartController::class, 'cartProductRemove'])->name('cart-product-remove');

/** Wishlist Route */
Route::get('wishlist/{productId}', [WishlistController::class, 'store'])->name('wishlist.store');






/** Cart Page Routes */
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart-update-qty', [CartController::class, 'cartQtyUpdate'])->name('cart.quantity-update');
Route::get('/cart-destroy', [CartController::class, 'cartDestroy'])->name('cart.destroy');

/** Coupon Routes */
Route::post('/apply-coupon', [FrontendController::class, 'applyCoupon'])->name('apply-coupon');
Route::get('/destroy-coupon', [FrontendController::class, 'destroyCoupon'])->name('destroy-coupon');

Route::group(['middleware' => 'auth'], function () {
    Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::get('checkout/{id}/delivery-cal', [CheckoutController::class, 'CalculateDeliveryCharge'])->name('checkout.delivery-cal');
    Route::post('checkout', [CheckoutController::class, 'checkoutRedirect'])->name('checkout.redirect');

    /** Payment Routes */
    Route::get('payment', [PaymentController::class, 'index'])->name('payment.index');
    Route::post('make-payment', [PaymentController::class, 'makePayment'])->name('make-payment');

    Route::get('payment-success', [PaymentController::class, 'paymentSuccess'])->name('payment.success');
    Route::get('payment-cancel', [PaymentController::class, 'paymentCancel'])->name('payment.cancel');

    /** PayPal Routes */
    Route::get('paypal/payment', [PaymentController::class, 'payWithPaypal'])->name('paypal.payment');
    Route::get('paypal/success', [PaymentController::class, 'paypalSuccess'])->name('paypal.success');
    Route::get('paypal/cancel', [PaymentController::class, 'paypalCancel'])->name('paypal.cancel');

    /** Stripe Routes */
    Route::get('stripe/payment', [PaymentController::class, 'payWithStripe'])->name('stripe.payment');
    Route::get('stripe/success', [PaymentController::class, 'stripeSuccess'])->name('stripe.success');
    Route::get('stripe/cancel', [PaymentController::class, 'stripeCancel'])->name('stripe.cancel');

    /** Stripe Routes */
    Route::get('razorpay-redirect', [PaymentController::class, 'razorpayRedirect'])->name('razorpay-redirect');
    Route::post('razorpay/payment', [PaymentController::class, 'payWithRazorpay'])->name('razorpay.payment');
});
