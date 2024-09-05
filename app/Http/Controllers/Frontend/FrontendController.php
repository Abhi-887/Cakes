<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\About;
use App\Models\AboutUs;
use App\Models\AppDownloadSection;
use App\Models\BannerSlider;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Cakesstand;
use App\Models\Category;
use App\Models\Chef;
use App\Models\Contact;
use App\Models\Contact2;
use App\Models\Counter;
use App\Models\Slider2;
use App\Models\Coupon;
use App\Models\Order;

use App\Models\DailyOffer;
use App\Models\Consultation;
use App\Models\CouponUsageLog;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductRating;
use App\Models\Reservation;
use App\Models\SectionTitle;
use App\Models\Slider;
use App\Models\Subscriber;
use App\Models\Testimonial;
use App\Models\TramsAndCondition;
use App\Models\WhyChooseUs;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Log;
use Mail;

use function Ramsey\Uuid\v1;

class FrontendController extends Controller
{
    function index(): View
    {
        $sectionTitles = $this->getSectionTitles();

        $sliders = Slider::where('status', 1)->get();
        $sliders2 = Slider2::where('status', 1)->get();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $categories = Category::where(['show_at_home' => 1, 'status' => 1])->get();
        $dailyOffers = DailyOffer::with('product')->where('status', 1)->take(15)->get();
        $bannerSliders = BannerSlider::where('status', 1)->latest()->take(10)->get();
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
        $appSection = AppDownloadSection::first();
        $testimonials = Testimonial::where(['show_at_home' => 1, 'status' => 1])->get();
        $counter = Counter::first();
        $latestBlogs = Blog::withCount([
            'comments' => function ($query) {
                $query->where('status', 1);
            }
        ])->with(['category', 'user'])->where('status', 1)->latest()->take(3)->get();
        $aboutus = AboutUs::first();
        return view(
            'frontend.home.index',
            compact(
                'sliders',
                'sectionTitles',
                'whyChooseUs',
                'categories',
                'dailyOffers',
                'bannerSliders',
                'chefs',
                'appSection',
                'testimonials',
                'counter',
                'latestBlogs',
                'sliders2',
                'aboutus'
            )
        );
    }

    function getSectionTitles(): Collection
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'daily_offer_top_title',
            'daily_offer_main_title',
            'daily_offer_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];

        return SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
    }

    function chef(): View
    {
        $chefs = Chef::where(['status' => 1])->paginate(12);
        return view('frontend.pages.chefs', compact('chefs'));
    }

    function testimonial(): View
    {
        $testimonials = Testimonial::where(['status' => 1])->paginate(9);
        return view('frontend.pages.testimonial', compact('testimonials'));
    }

    function about(): View
    {
        $keys = [
            'why_choose_top_title',
            'why_choose_main_title',
            'why_choose_sub_title',
            'chef_top_title',
            'chef_main_title',
            'chef_sub_title',
            'testimonial_top_title',
            'testimonial_main_title',
            'testimonial_sub_title'
        ];

        $sectionTitles = SectionTitle::whereIn('key', $keys)->pluck('value', 'key');
        ;
        $about = About::first();
        $whyChooseUs = WhyChooseUs::where('status', 1)->get();
        $chefs = Chef::where(['show_at_home' => 1, 'status' => 1])->get();
        $counter = Counter::first();
        $testimonials = Testimonial::where(['show_at_home' => 1, 'status' => 1])->get();

        return view('frontend.pages.about', compact('about', 'whyChooseUs', 'sectionTitles', 'chefs', 'counter', 'testimonials'));
    }

    function privacyPolicy(): View
    {
        $privacyPolicy = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', compact('privacyPolicy'));
    }

    function tramsAndConditions(): View
    {
        $tramsAndConditions = TramsAndCondition::first();
        return view('frontend.pages.trams-and-condition', compact('tramsAndConditions'));
    }

    function contact(): View
    {
        $contact = Contact::first();
        $contact2 = Contact2::first();
        return view('frontend.pages.contact', compact('contact', 'contact2'));
    }


    function sendContactMessage(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'max:255'],
            'message' => ['required', 'max: 1000']
        ]);

        Mail::send(new ContactMail($request->name, $request->email, $request->subject, $request->message));

        return response(['status' => 'success', 'message' => 'Message Sent Successfully!']);
    }

    function blog(Request $request): View
    {
        $blogs = Blog::withCount([
            'comments' => function ($query) {
                $query->where('status', 1);
            }
        ])->with(['category', 'user'])->where('status', 1);

        if ($request->has('search') && $request->filled('search')) {
            $blogs->where(function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%')
                    ->orWhere('description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('category') && $request->filled('category')) {
            $blogs->whereHas('category', function ($query) use ($request) {
                $query->where('slug', $request->category);
            });
        }

        $blogs = $blogs->latest()->paginate(9);
        $categories = BlogCategory::where('status', 1)->get();
        return view('frontend.pages.blog', compact('blogs', 'categories'));
    }

    function blogDetails(string $slug): View
    {
        $blog = Blog::with(['user'])->where('slug', $slug)->where('status', 1)->firstOrFail();
        $comments = $blog->comments()->where('status', 1)->orderBy('id', 'DESC')->paginate(20);

        $latestBlogs = Blog::select('id', 'title', 'slug', 'created_at', 'image')
            ->where('status', 1)
            ->where('id', '!=', $blog->id)
            ->latest()->take(5)->get();
        $categories = BlogCategory::withCount([
            'blogs' => function ($query) {
                $query->where('status', 1);
            }
        ])->where('status', 1)->get();

        $nextBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '>', $blog->id)->orderBy('id', 'ASC')->first();
        $previousBlog = Blog::select('id', 'title', 'slug', 'image')->where('id', '<', $blog->id)->orderBy('id', 'DESC')->first();


        return view('frontend.pages.blog-details', compact('blog', 'latestBlogs', 'categories', 'nextBlog', 'previousBlog', 'comments'));
    }

    function blogCommentStore(Request $request, string $blog_id): RedirectResponse
    {
        $request->validate([
            'comment' => ['required', 'max:500']
        ]);

        Blog::findOrFail($blog_id);

        $comment = new BlogComment();
        $comment->blog_id = $blog_id;
        $comment->user_id = auth()->user()->id;
        $comment->comment = $request->comment;
        $comment->save();

        toastr()->success('Comment submitted successfully and waiting to approve.');
        return redirect()->back();
    }

    function reservation(Request $request)
    {
        $request->validate([
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:50'],
            'date' => ['required', 'date'],
            'time' => ['required'],
            'persons' => ['required', 'numeric']
        ]);

        if (!Auth::check()) {
            throw ValidationException::withMessages(['Please Login to Request Reservation']);
        }

        $reservation = new Reservation();
        $reservation->reservation_id = rand(0, 500000);
        $reservation->user_id = auth()->user()->id;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->persons = $request->persons;
        $reservation->status = 'pending';
        $reservation->save();

        return response(['status' => 'success', 'message' => 'Request send successfully']);
    }

    function subscribeNewsletter(Request $request): Response
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:subscribers,email']
        ], ['email.unique' => 'Email is already subscribed!']);

        $subscriber = new Subscriber();
        $subscriber->email = $request->email;
        $subscriber->save();

        return response(['status' => 'success', 'message' => 'Subscribed Successfully!']);
    }

    public function products(Request $request): View
    {
        $products = Product::where('status', 1)->orderBy('id', 'DESC');

        // Retrieve all categories
        $categories = Category::all();

        $subcategories = collect();
        if ($request->has('parent_category') && $request->filled('parent_category')) {
            // Retrieve subcategories for the selected parent category
            $subcategories = Category::where('parent', $request->parent_category)->get();
        } else {
            // Retrieve all subcategories if no parent category is selected
            $subcategories = Category::whereNotNull('parent')->get();
        }

        if ($request->has('search') && $request->filled('search')) {
            $products->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('long_description', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->has('sub_category') && $request->filled('sub_category')) {
            $products->where('sub_category', $request->sub_category);
        }

        $products = $products->with([
            'subCategory',
            'reviews' => function ($query) {
                $query->select('product_id', 'rating');
            }
        ])->withAvg('reviews', 'rating')->withCount('reviews')->paginate(12);

        return view('frontend.pages.product', compact('products', 'categories', 'subcategories'));
    }

    public function showCategoryProducts(Request $request, $slug)
    {
        // Retrieve the category by slug and fail if not found
        $category = Category::where('slug', $slug)->firstOrFail();

        // Retrieve all categories and subcategories for the current main category
        $categories = Category::all();
        $subcategories = Category::where('parent', $category->id)->get();

        // Retrieve products associated with the category
        $products = Product::where('category_id', $category->id)
            ->where('status', 1)
            ->orderBy('id', 'DESC');

        // Apply search filter if provided
        if ($request->filled('search')) {
            $products->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('long_description', 'like', '%' . $request->search . '%');
            });
        }

        // Apply subcategory filter if provided
        if ($request->filled('sub_category')) {
            $products->where('sub_category', $request->sub_category);
        }

        // Paginate the results
        $products = $products->paginate(12);

        // Return the view with category, products, categories, and subcategories
        return view('frontend.pages.product', compact('category', 'products', 'categories', 'subcategories'));
    }





    function showProduct(string $slug): View
    {
        $product = Product::with(['productImages', 'variants', 'productSizes', 'productOptions'])->where(['slug' => $slug, 'status' => 1])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->firstOrFail();

        $relatedProducts = Product::where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)->take(8)
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()->get();
        $reviews = ProductRating::where(['product_id' => $product->id, 'status' => 1])->paginate(30);

        $cakesstans = Cakesstand::all();
        return view('frontend.pages.product-view', compact('product', 'relatedProducts', 'reviews', 'cakesstans'));
    }



    function loadProductModal($productId)
    {
        $product = Product::with(['productSizes', 'productOptions'])->findOrFail($productId);

        return view('frontend.layouts.ajax-files.product-popup-modal', compact('product'))->render();
    }

    function productReviewStore(Request $request)
    {
        $request->validate([
            'rating' => ['required', 'min:1', 'max:5', 'integer'],
            'review' => ['required', 'max:500'],
            'product_id' => ['required', 'integer']
        ]);

        $user = Auth::user();

        $hasPurchased = $user->orders()->whereHas('orderItems', function ($query) use ($request) {
            $query->where('product_id', $request->product_id);
        })
            ->where('order_status', 'delivered')
            ->get();


        if (count($hasPurchased) == 0) {
            throw ValidationException::withMessages(['Please Buy The Product Before Submit a Review!']);
        }

        $alreadyReviewed = ProductRating::where(['user_id' => $user->id, 'product_id' => $request->product_id])->exists();
        if ($alreadyReviewed) {
            throw ValidationException::withMessages(['You already reviewed this product']);
        }

        $review = new ProductRating();
        $review->user_id = $user->id;
        $review->product_id = $request->product_id;
        $review->rating = $request->rating;
        $review->review = $request->review;
        $review->status = 0;
        $review->save();

        toastr()->success('Review added successfully and waiting to approve');

        return redirect()->back();
    }

    // public function applyCoupon(Request $request)
    // {
    //     Log::info('Apply Coupon Request Data:', $request->all());

    //     // Validate request data
    //     $request->validate([
    //         'subtotal' => 'required|numeric|min:0',
    //         'code' => 'required|string',
    //     ]);

    //     $subtotal = $request->input('subtotal');
    //     $code = $request->input('code');
    //     $userId = auth()->id(); // Assuming the user is authenticated

    //     // Fetch the coupon by code
    //     $coupon = Coupon::where('code', $code)->first();

    //     // Check if the coupon exists
    //     if (!$coupon) {
    //         return response(['message' => 'Invalid Coupon Code.'], 422);
    //     }

    //     // Check if the coupon has been fully redeemed
    //     if ($coupon->quantity <= 0) {
    //         return response(['message' => 'Coupon has been fully redeemed.'], 422);
    //     }

    //     // Check if the coupon has expired
    //     if ($coupon->expire_date < now()) {
    //         return response(['message' => 'Coupon has expired.'], 422);
    //     }

    //     // Check if the coupon is applicable based on the start date
    //     if ($coupon->start_date > now()) {
    //         return response(['message' => 'Coupon is not yet valid.'], 422);
    //     }

    //     // Check if the coupon is applicable based on the minimum purchase amount
    //     if ($coupon->min_purchase_amount && $subtotal < $coupon->min_purchase_amount) {
    //         return response(['message' => 'Coupon requires a minimum purchase amount of ' . currencyPosition($coupon->min_purchase_amount) . '.'], 422);
    //     }

    //     // Check if the user has exceeded the max uses per user
    //     $userCouponUses = Order::where('user_id', $userId)
    //         ->where('coupon_id', $coupon->id)
    //         ->count();
    //     if ($coupon->max_uses_per_user && $userCouponUses >= $coupon->max_uses_per_user) {
    //         return response(['message' => 'You have already used this coupon the maximum allowed number of times.'], 422);
    //     }

    //     // Validate coupon against cart items
    //     $cartItems = \Cart::content();
    //     $isCouponApplicable = false;
    //     $applicableCategories = [];
    //     $applicableSubCategories = [];
    //     $applicableProductNames = $coupon->products->pluck('name')->toArray(); // Get product names from coupon

    //     foreach ($cartItems as $item) {
    //         $productCategoryId = $item->options->product_info['category_id'] ?? null;
    //         $productSubCategoryId = $item->options->product_info['sub_category_id'] ?? null;
    //         $productId = $item->id; // Assuming product ID is available in the cart item

    //         // Ensure that productCategoryId and productSubCategoryId are arrays
    //         $productCategoryId = (array) $productCategoryId;
    //         $productSubCategoryId = (array) $productSubCategoryId;

    //         // Check if coupon applies by product
    //         if ($coupon->apply_by === 'product') {
    //             if (in_array($productId, $coupon->products->pluck('id')->toArray())) {
    //                 $isCouponApplicable = true;
    //                 break;
    //             }
    //         }

    //         //     // Check if coupon applies by category
    //         //     if ($coupon->apply_by === 'category') {
    //         //         if ($coupon->category_id && $coupon->category_id == $productCategoryId) {
    //         //             $applicableCategories[] = Category::find($coupon->category_id)->name;
    //         //             $isCouponApplicable = true;
    //         //         }

    //         //         if ($coupon->sub_category_id && $coupon->sub_category_id == $productSubCategoryId) {
    //         //             $applicableSubCategories[] = Category::find($coupon->sub_category_id)->name;
    //         //             $isCouponApplicable = true;
    //         //         }
    //         //     }
    //         // }
    //         if ($coupon->apply_by === 'category') {
    //             if ($coupon->category_id && in_array($coupon->category_id, $productCategoryId)) {
    //                 $categoryMatch = true;
    //                 $applicableCategories[] = Category::find($coupon->category_id)->name;
    //             } else {
    //                 $categoryMatch = true; // No category restriction
    //             }

    //             if ($coupon->sub_category_id && in_array($coupon->sub_category_id, $productSubCategoryId)) {
    //                 $subCategoryMatch = true;
    //                 $applicableSubCategories[] = Category::find($coupon->sub_category_id)->name;
    //             } else {
    //                 $subCategoryMatch = true; // No sub-category restriction
    //             }

    //             if ($categoryMatch && $subCategoryMatch) {
    //                 $isCouponApplicable = true;
    //                 break;
    //             }
    //         }
    //     }

    //     // if ($coupon->apply_by === 'category') {
    //     //     if ($coupon->category_id && in_array($coupon->category_id, $productCategoryId)) {
    //     //         $categoryMatch = true;
    //     //         $applicableCategories[] = Category::find($coupon->category_id)->name;
    //     //     } else {
    //     //         $categoryMatch = true; // No category restriction
    //     //     }

    //     //     if ($coupon->sub_category_id && in_array($coupon->sub_category_id, $productSubCategoryId)) {
    //     //         $subCategoryMatch = true;
    //     //         $applicableSubCategories[] = Category::find($coupon->sub_category_id)->name;
    //     //     } else {
    //     //         $subCategoryMatch = true; // No sub-category restriction
    //     //     }

    //     //     if ($categoryMatch && $subCategoryMatch) {
    //     //         $isCouponApplicable = true;
    //     //         break;
    //     //     }
    //     // }


    //     if (!$isCouponApplicable) {
    //         $message = 'Coupon is not valid for any items in the cart.';

    //         if ($coupon->apply_by === 'product') {
    //             $message .= ' It is only valid for the following products: ' . implode(', ', $applicableProductNames) . '.';
    //         }

    //         if ($coupon->apply_by === 'category') {
    //             if (!empty($applicableCategories) && $coupon->category_id) {
    //                 $message .= ' It is valid for category: ' . implode(', ', $applicableCategories) . '.';
    //             }

    //             if (!empty($applicableSubCategories) && $coupon->sub_category_id) {
    //                 $message .= ' It is valid for subcategory: ' . implode(', ', $applicableSubCategories) . '.';
    //             }
    //         }

    //         return response(['message' => $message], 422);
    //     }

    //     // Calculate the discount
    //     $discount = 0;
    //     if ($coupon->discount_type === 'percent') {
    //         $discount = number_format($subtotal * ($coupon->discount / 100), 2);
    //     } elseif ($coupon->discount_type === 'amount') {
    //         $discount = number_format($coupon->discount, 2);
    //     }

    //     // Ensure discount does not exceed subtotal
    //     $discount = min($discount, $subtotal);

    //     // Calculate the final total after applying the discount
    //     $finalTotal = number_format($subtotal - $discount, 2);

    //     // Store the coupon details in session
    //     session()->put('coupon', ['code' => $code, 'discount' => $discount]);

    //     // Reduce the coupon quantity by 1
    //     $coupon->decrement('quantity');

    //     return response([
    //         'message' => 'Coupon Applied Successfully.',
    //         'discount' => $discount,
    //         'finalTotal' => $finalTotal,
    //         'coupon_code' => $code
    //     ]);
    // }

    public function applyCoupon(Request $request)
    {
        Log::info('Apply Coupon Request Data:', $request->all());

        // Validate request data
        $request->validate([
            'subtotal' => 'required|numeric|min:0',
            'code' => 'required|string',
        ]);

        $subtotal = $request->input('subtotal');
        $code = $request->input('code');
        $userId = auth()->id(); // Assuming the user is authenticated

        // Fetch the coupon by code
        $coupon = Coupon::where('code', $code)->first();

        // Check if the coupon exists
        if (!$coupon) {
            return response(['message' => 'Invalid Coupon Code.'], 422);
        }

        // Check if the coupon has been fully redeemed
        if ($coupon->quantity <= 0) {
            return response(['message' => 'Coupon has been fully redeemed.'], 422);
        }

        // Check if the coupon has expired
        if ($coupon->expire_date < now()) {
            return response(['message' => 'Coupon has expired.'], 422);
        }

        // Check if the coupon is applicable based on the start date
        if ($coupon->start_date > now()) {
            return response(['message' => 'Coupon is not yet valid.'], 422);
        }

        // Check if the coupon is applicable based on the minimum purchase amount
        if ($coupon->min_purchase_amount && $subtotal < $coupon->min_purchase_amount) {
            return response(['message' => 'Coupon requires a minimum purchase amount of ' . currencyPosition($coupon->min_purchase_amount) . '.'], 422);
        }

        // Check if the user has exceeded the max uses per user
        $userCouponUses = Order::where('user_id', $userId)
            ->where('coupon_id', $coupon->id)
            ->count();
        if ($coupon->max_uses_per_user && $userCouponUses >= $coupon->max_uses_per_user) {
            return response(['message' => 'You have already used this coupon the maximum allowed number of times.'], 422);
        }

        // Validate coupon against cart items
        $cartItems = \Cart::content();
        $isCouponApplicable = false;
        $applicableCategories = [];
        $applicableSubCategories = [];
        $applicableProductNames = $coupon->products->pluck('name')->toArray(); // Get product names from coupon

        foreach ($cartItems as $item) {
            $productCategoryId = $item->options->product_info['category_id'] ?? null;
            $productSubCategoryId = $item->options->product_info['sub_category_id'] ?? null;
            $productId = $item->id; // Assuming product ID is available in the cart item

            // Check if coupon applies by product
            if ($coupon->apply_by === 'product') {
                if (in_array($productId, $coupon->products->pluck('id')->toArray())) {
                    $isCouponApplicable = true;
                    break;
                }
            }

            // Check if coupon applies by category
            if ($coupon->apply_by === 'category') {
                $categoryMatch = $coupon->category_id ? in_array($coupon->category_id, (array) $productCategoryId) : true;
                $subCategoryMatch = $coupon->sub_category_id ? in_array($coupon->sub_category_id, (array) $productSubCategoryId) : true;

                if ($categoryMatch) {
                    $applicableCategories[] = Category::find($coupon->category_id)->name;
                }

                if ($subCategoryMatch) {
                    $applicableSubCategories[] = Category::find($coupon->sub_category_id)->name;
                }

                if ($categoryMatch && $subCategoryMatch) {
                    $isCouponApplicable = true;
                    break;
                }
            }
        }

        // If the coupon is not applicable, return an error message
        if (!$isCouponApplicable) {
            $message = 'Coupon is not valid for any items in the cart.';

            if ($coupon->apply_by === 'product') {
                $message .= ' It is only valid for the following products: ' . implode(', ', $applicableProductNames) . '.';
            }

            if ($coupon->apply_by === 'category') {
                if (!empty($applicableCategories) && $coupon->category_id) {
                    $message .= ' It is valid for category: ' . implode(', ', $applicableCategories) . '.';
                }

                if (!empty($applicableSubCategories) && $coupon->sub_category_id) {
                    $message .= ' It is valid for subcategory: ' . implode(', ', $applicableSubCategories) . '.';
                }
            }

            return response(['message' => $message], 422);
        }

        // Calculate the discount
        $discount = 0;
        if ($coupon->discount_type === 'percent') {
            $discount = number_format($subtotal * ($coupon->discount / 100), 2);
        } elseif ($coupon->discount_type === 'amount') {
            $discount = number_format($coupon->discount, 2);
        }

        // Ensure discount does not exceed subtotal
        $discount = min($discount, $subtotal);

        // Calculate the final total after applying the discount
        $finalTotal = number_format($subtotal - $discount, 2);

        // Store the coupon details in session
        session()->put('coupon', ['code' => $code, 'discount' => $discount]);

        // // Log coupon usage
        // CouponUsageLog::create([
        //     'user_id' => auth()->id(),
        //     'coupon_id' => $coupon->id,
        //     'used_at' => now(),
        //     'order_id' => $order->id // Attach order ID after creating an order
        // ]);

        // Reduce the coupon quantity by 1
        $coupon->decrement('quantity');

        return response([
            'message' => 'Coupon Applied Successfully.',
            'discount' => $discount,
            'finalTotal' => $finalTotal,
            'coupon_code' => $code
        ]);
    }











    function destroyCoupon()
    {
        try {
            session()->forget('coupon');
            return response(['message' => 'Coupon Removed!', 'grand_cart_total' => grandCartTotal()]);
        } catch (\Exception $e) {
            logger($e);
            return response(['message' => 'Something went wrong']);
        }
    }
}
