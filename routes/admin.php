<?php

use App\DataTables\SocialLinkDataTable;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminManagementController;
use App\Http\Controllers\Admin\AppDownloadSectionController;
use App\Http\Controllers\Admin\BannerSliderController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ClearDatabaseController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\Contact2Controller;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomPageBuilderController;
use App\Http\Controllers\Admin\DailyOfferController;
use App\Http\Controllers\Admin\DeliveryAreaController;
use App\Http\Controllers\Admin\FooterInfoController;
use App\Http\Controllers\Admin\FooterInfoTwoController;
use App\Http\Controllers\Admin\FooterGridTwoController;
use App\Http\Controllers\Admin\FooterGridThreeController;
use App\Http\Controllers\Admin\FooterGridFourController;
use App\Http\Controllers\Admin\FooterSocialController;
use App\Http\Controllers\Admin\MenuBuilderController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\ConsultationController;
use App\Http\Controllers\Admin\WeddingcakesdepositController;
use App\Http\Controllers\Admin\WorkwithusController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentGatewaySettingController;
use App\Http\Controllers\Admin\PrivacyPolicyController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductGalleryController;
use App\Http\Controllers\Admin\ProductOptionController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\ReservationTimeController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\Slider2Controller;
use App\Http\Controllers\Admin\SlidercategoryController;
use App\Http\Controllers\Admin\Slidercategory2Controller;
use App\Http\Controllers\Admin\SocialLinkController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TramsAndConditionController;
use App\Http\Controllers\Admin\TramsAndCondtionController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\CakesstandController;
use App\Http\Controllers\Admin\CustomerfeedbackController;
use App\Http\Controllers\Admin\MenusController;
use App\Http\Controllers\Admin\ProductVariantController;
use App\Http\Controllers\Admin\ProductVariantItemController;
use App\Models\AppDownloadSection;
use App\Models\BannerSlider;
use App\Models\Coupon;
use App\Models\PrivacyPolicy;
use App\Models\ReservationTime;
use App\Models\TramsAndCondtion;
use Illuminate\Support\Facades\Route;


Route::get('subcategories/{categoryId}', [ProductController::class, 'getSubcategories'])->name('admin.subcategories');

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/recent-orders', [AdminDashboardController::class, 'recentOrders'])->name('recentOrders');

 // Add the route for low stock alerts
 Route::get('/low-stock-alerts', [AdminDashboardController::class, 'getLowStockAlerts'])->name('getLowStockAlerts');
    /** Profile Routes */
    Route::get('profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('profile', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::put('profile/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');

    /** Slider Routes */
    Route::resource('slider', SliderController::class);

    /** Slider2 Routes */
    Route::resource('slider2', Slider2Controller::class);

    /** Slider Category */
    Route::resource('slider-category', SlidercategoryController::class);

    /** Slider Category2 */
    Route::resource('slider-category2', Slidercategory2Controller::class);

    Route::get('coupon/report', [CouponController::class, 'redemptionReport'])->name('admin.report');


    /** Why choose us Routes */
    Route::put('why-choose-title-update', [WhyChooseUsController::class, 'updateTitle'])->name('why-choose-title.update');
    Route::resource('why-choose-us', WhyChooseUsController::class);

    /** Product Category Routes */
    Route::resource('category', CategoryController::class);

    /** Product Routes */
    Route::resource('product', ProductController::class);
    Route::resource('products', ProductController::class);

    /** Menus Routes */
    Route::resource('menus', MenusController::class);


    Route::resource('products-image-gallery', ProductImageGalleryController::class);

    /** Products variant route */
    Route::put('products-variant/change-status', [ProductVariantController::class, 'changeStatus'])->name('products-variant.change-status');
    Route::resource('products-variant', ProductVariantController::class);

    /** Products variant item route */
    Route::get('products-variant-item/{productId}/{variantId}', [ProductVariantItemController::class, 'index'])->name('products-variant-item.index');

    Route::get('products-variant-item/create/{productId}/{variantId}', [ProductVariantItemController::class, 'create'])->name('products-variant-item.create');
    Route::post('products-variant-item', [ProductVariantItemController::class, 'store'])->name('products-variant-item.store');

    Route::get('products-variant-item-edit/{variantItemId}', [ProductVariantItemController::class, 'edit'])->name('products-variant-item.edit');

    Route::put('products-variant-item-update/{variantItemId}', [ProductVariantItemController::class, 'update'])->name('products-variant-item.update');

    Route::delete('products-variant-item/{variantItemId}', [ProductVariantItemController::class, 'destroy'])->name('products-variant-item.destroy');

    Route::put('products-variant-item-status', [ProductVariantItemController::class, 'chageStatus'])->name('products-variant-item.chages-status');


    // /** Mange Attributes Routes */

    // Route::get('attributes/{id}', [AttributeController::class, 'create'])->name('attribute.create');

    // Route::delete('attributes/{id}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    // Route::post('attributes/edit/{id}', [AttributeController::class, 'deleteOption'])->name('attribute.delete');
    // Route::resource('attributes', AttributeController::class);
    // // Route::get('attributes/edit/{productId}', [AttributeController::class, 'edit'])->name('attribute.edit');


    // Route::put('/attributes/{id}', [AttributeController::class, 'update'])->name('attributes.update');
    // Route::get('/attributes', [AttributeController::class, 'index'])->name('attributes.index');
    // Route::get('/attributes/{id}/edit', [AttributeController::class, 'edit'])->name('attributes.edit');



    // Route::get('attributes/{id}', [AttributeController::class, 'create'])->name('attribute.create');


    // Route::resource('attributes', AttributeController::class)->except(['show']);



    // Route::get('attributes/{id}/edit', [AttributeController::class, 'edit'])->name('attributes.edit');
    // Route::put('attributes/{id}', [AttributeController::class, 'update'])->name('attributes.update');
    // Route::delete('attributes/{id}', [AttributeController::class, 'destroy'])->name('attributes.destroy');
    // Route::post('attributes/{id}/deleteOption', [AttributeController::class, 'deleteOption'])->name('attributes.deleteOption');


    Route::get('product/{id}/attributes', [AttributeController::class, 'createOrEdit'])->name('attributes.createOrEdit');
    Route::post('attributes/storeOrUpdate', [AttributeController::class, 'storeOrUpdate'])->name('attributes.storeOrUpdate');



    /** Product Gallery Routes */
    Route::get('product-gallery/{product}', [ProductGalleryController::class, 'index'])->name('product-gallery.show-index');
    Route::resource('product-gallery', ProductGalleryController::class);

    /** Product Size Routes */
    Route::get('product-size/{product}', [ProductSizeController::class, 'index'])->name('product-size.show-index');
    Route::resource('product-size', ProductSizeController::class);

    /** Product Size Routes */
    Route::resource('product-option', ProductOptionController::class);

    /** Product Reviews Routes */
    Route::get('product-reviews', [ProductReviewController::class, 'index'])->name('product-reviews.index');
    Route::post('product-reviews', [ProductReviewController::class, 'updateStatus'])->name('product-reviews.update');
    Route::delete('product-reviews/{id}', [ProductReviewController::class, 'destroy'])->name('product-reviews.destroy');


    /** Coupon Routes */
    Route::resource('coupon', CouponController::class);
    Route::get('coupon-usage-logs', [CouponController::class, 'log'])->name('coupon_usage_logs.index');

    Route::get('/recent-orders', [AdminDashboardController::class, 'recentOrders'])->name('admin.recentOrders');

    /** Delivery Area Routes */
    Route::resource('delivery-area', DeliveryAreaController::class);

    /** Order Routes */
    Route::get('orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('orders/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::delete('orders/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');

    Route::get('pending-orders', [OrderController::class, 'pendingOrderIndex'])->name('pending-orders');
    Route::get('inprocess-orders', [OrderController::class, 'inProcessOrderIndex'])->name('inprocess-orders');
    Route::get('delivered-orders', [OrderController::class, 'deliveredOrderIndex'])->name('delivered-orders');
    Route::get('declined-orders', [OrderController::class, 'declinedOrderIndex'])->name('declined-orders');

    Route::get('orders/status/{id}', [OrderController::class, 'getOrderStatus'])->name('orders.status');
    Route::put('orders/status-update/{id}', [OrderController::class, 'orderStatusUpdate'])->name('orders.status-update');

    /** Order Notification Routes */
    Route::get('clear-notification', [AdminDashboardController::class, 'clearNotification'])->name('clear-notification');

    /** chat Routes */
    Route::get('chat', [ChatController::class, 'index'])->name('chat.index');
    Route::get('chat/get-conversation/{senderId}', [ChatController::class, 'getConversation'])->name('chat.get-conversation');
    Route::post('chat/send-message', [ChatController::class, 'sendMessage'])->name('chat.send-message');


    /** Daily Offer Routes */
    Route::get('daily-offer/search-product', [DailyOfferController::class, 'productSearch'])->name('daily-offer.search-product');
    Route::put('daily-offer-title-update', [DailyOfferController::class, 'updateTitle'])->name('daily-offer-title-update');
    Route::resource('daily-offer', DailyOfferController::class);

    /** Banner Slider Routes */
    Route::resource('banner-slider', BannerSliderController::class);

    /** Cakes Stand Routes */
    Route::resource('cakes-stand', CakesstandController::class);


    /** Chefs Routes */
    Route::put('chefs-title-update', [ChefController::class, 'updateTitle'])->name('chefs-title-update');
    Route::resource('chefs', ChefController::class);

    /** App Download Routes */
    Route::get('app-download', [AppDownloadSectionController::class, 'index'])->name('app-download.index');
    Route::post('app-download', [AppDownloadSectionController::class, 'store'])->name('app-download.store');

    /** Testimonial Routes */
    Route::put('testimonial-title-update', [TestimonialController::class, 'updateTitle'])->name('testimonial-title-update');
    Route::resource('testimonial', TestimonialController::class);

    /** Counter Routes */
    Route::get('counter', [CounterController::class, 'index'])->name('counter.index');
    Route::put('counter', [CounterController::class, 'update'])->name('counter.update');

    /** Blogs Category Routes */
    Route::resource('blog-category', BlogCategoryController::class);

    /** Blogs Routes */
    Route::get('blogs/comments', [BlogController::class, 'blogComment'])->name('blogs.comments.index');
    Route::get('blogs/comments/{id}', [BlogController::class, 'commentStatusUpdate'])->name('blogs.comments.update');
    Route::delete('blogs/comments/{id}', [BlogController::class, 'commentDestroy'])->name('blogs.comments.destroy');

    Route::resource('blogs', BlogController::class);

    /** About Routes */
    Route::get('about', [AboutController::class, 'index'])->name('about.index');
    Route::put('about', [AboutController::class, 'update'])->name('about.update');


    /** AboutUs Routes */
    Route::get('aboutus', [AboutUsController::class, 'index'])->name('aboutus.index');
    Route::put('aboutus', [AboutUsController::class, 'update'])->name('aboutus.update');

    /** privacy policy Routes */
    Route::get('privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy-policy.index');
    Route::put('privacy-policy', [PrivacyPolicyController::class, 'update'])->name('privacy-policy.update');

    /** privacy policy Routes */
    Route::get('trams-and-conditions', [TramsAndConditionController::class, 'index'])->name('trams-and-conditions.index');
    Route::put('trams-and-conditions', [TramsAndConditionController::class, 'update'])->name('trams-and-conditions.update');

    /** Contact Routes */
    Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
    Route::put('contact', [ContactController::class, 'update'])->name('contact.update');

    /** Contact Routes */
    Route::get('contact2', [Contact2Controller::class, 'index'])->name('contact2.index');
    Route::put('contact2', [Contact2Controller::class, 'update'])->name('contact2.update');

    /** Reservation Routes */
    Route::resource('reservation-time', ReservationTimeController::class);
    Route::get('reservation', [ReservationController::class, 'index'])->name('reservation.index');
    Route::post('reservation', [ReservationController::class, 'update'])->name('reservation.update');
    Route::delete('reservation/{id}', [ReservationController::class, 'destroy'])->name('reservation.destroy');

    /** News letter Routes */
    Route::get('news-letter', [NewsLetterController::class, 'index'])->name('news-letter.index');
    Route::post('news-letter', [NewsLetterController::class, 'sendNewsLetter'])->name('news-letter.send');

    /** consultation Routes */
    Route::get('consultation', [ConsultationController::class, 'index'])->name('consultation.index');

    /** wedding-cakes-deposit Routes */
    Route::get('wedding-cakes-deposit', [WeddingcakesdepositController::class, 'index'])->name('Weddingcakesdeposit.index');

    /** wedding-cakes-deposit Routes */
    Route::get('work-with-us', [WorkwithusController::class, 'index'])->name('work-with-us.index');

    /** wedding-cakes-deposit Routes */
    Route::get('customer-feedback', [CustomerfeedbackController::class, 'index'])->name('customer-feedback.index');

    /** Social Links Routes */
    Route::resource('social-link', SocialLinkController::class);

    /** footer routes */
    Route::resource('footer-info', FooterInfoController::class);
    Route::resource('footer-info-two', FooterInfoTwoController::class);
    Route::put('footer-socials/change-status', [FooterSocialController::class, 'changeStatus'])->name('footer-socials.change-status');
    Route::resource('footer-socials', FooterSocialController::class);

    Route::put('footer-grid-two/change-status', [FooterGridTwoController::class, 'changeStatus'])->name('footer-grid-two.change-status');
    Route::put('footer-grid-two/change-title', [FooterGridTwoController::class, 'changeTitle'])->name('footer-grid-two.change-title');
    Route::resource('footer-grid-two', FooterGridTwoController::class);

    Route::put('footer-grid-three/change-status', [FooterGridThreeController::class, 'changeStatus'])->name('footer-grid-three.change-status');
    Route::put('footer-grid-three/change-title', [FooterGridThreeController::class, 'changeTitle'])->name('footer-grid-three.change-title');
    Route::resource('footer-grid-three', FooterGridThreeController::class);

    Route::put('footer-grid-four/change-status', [FooterGridFourController::class, 'changeStatus'])->name('footer-grid-four.change-status');
    Route::put('footer-grid-four/change-title', [FooterGridFourController::class, 'changeTitle'])->name('footer-grid-four.change-title');
    Route::resource('footer-grid-four', FooterGridFourController::class);


    /** Menu builder Routes */
    Route::get('menu-builder', [MenuBuilderController::class, 'index'])->name('menu-builder.index');
    /** Custom page builder Routes */
    Route::resource('custom-page-builder', CustomPageBuilderController::class);

    /** Admin management Routes */
    Route::resource('admin-management', AdminManagementController::class);


    /** Payment Gateway Setting Routes */
    Route::get('/payment-gateway-setting', [PaymentGatewaySettingController::class, 'index'])->name('payment-setting.index');
    Route::put('/paypal-setting', [PaymentGatewaySettingController::class, 'paypalSettingUpdate'])->name('paypal-setting.update');
    Route::put('/stripe-setting', [PaymentGatewaySettingController::class, 'stripeSettingUpdate'])->name('stripe-setting.update');
    Route::put('/razorpay-setting', [PaymentGatewaySettingController::class, 'razorpaySettingUpdate'])->name('razorpay-setting.update');

    /** Setting Routes */
    Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
    Route::put('/general-setting', [SettingController::class, 'UpdateGeneralSetting'])->name('general-setting.update');
    Route::put('/pusher-setting', [SettingController::class, 'UpdatePusherSetting'])->name('pusher-setting.update');
    Route::put('/mail-setting', [SettingController::class, 'UpdateMailSetting'])->name('mail-setting.update');
    Route::put('/logo-setting', [SettingController::class, 'UpdateLogoSetting'])->name('logo-setting.update');
    Route::put('/appearance-setting', [SettingController::class, 'UpdateAppearanceSetting'])->name('appearance-setting.update');
    Route::put('/seo-setting', [SettingController::class, 'UpdateSeoSetting'])->name('seo-setting.update');

    /** Clear Database Routes */
    Route::get('/clear-database', [ClearDatabaseController::class, 'index'])->name('clear-database.index');
    Route::post('/clear-database', [ClearDatabaseController::class, 'clearDB'])->name('clear-database.destroy');
});
