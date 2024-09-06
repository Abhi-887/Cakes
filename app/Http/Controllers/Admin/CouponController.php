<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CouponDataTable;
use App\DataTables\CouponUsageLogDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponCreateRequest;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\CouponUsageLog;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CouponDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $categories = Category::where('parent', 0)->get(); // Fetching parent categories
        $products = Product::all(); // Fetching all products
        return view('admin.coupon.create', compact('categories', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CouponCreateRequest $request): RedirectResponse
    {
        $coupon = new Coupon();

        // Set coupon attributes
        $coupon->fill($request->all()); // Fill all attributes using mass assignment

        // Save the coupon
        $coupon->save();

        // Attach related products if provided
        if ($request->has('product_ids')) {
            $coupon->products()->attach($request->product_ids);
        }

        // Redirect after successful creation
        toastr()->success('Coupon created successfully.');
        return redirect()->route('admin.coupon.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $coupon = Coupon::findOrFail($id);
        $categories = Category::where('parent', 0)->get(); // Fetching parent categories
        $products = Product::all(); // Fetching all products
        $selectedProducts = $coupon->products->pluck('id')->toArray(); // Get selected products for the coupon

        return view('admin.coupon.edit', compact('coupon', 'categories', 'products', 'selectedProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouponCreateRequest $request, string $id): RedirectResponse
    {
        $coupon = Coupon::findOrFail($id);

        // Update coupon attributes
        $coupon->fill($request->all()); // Fill all attributes using mass assignment

        // Save the coupon
        $coupon->save();

        // Sync related products if provided
        if ($request->has('product_ids')) {
            $coupon->products()->sync($request->product_ids);
        } else {
            // Detach products if no products are provided
            $coupon->products()->detach();
        }

        // Redirect after successful update
        toastr()->success('Coupon updated successfully.');
        return redirect()->route('admin.coupon.index');
    }
    public function log(CouponUsageLogDataTable $dataTable)
    {
        return $dataTable->render('admin.coupon.log');
    }

    // Route::get('coupon-usage-logs', [CouponUsageLogController::class, 'index'])->name('coupon_usage_logs.index');

    public function redemptionReport(Request $request)
    {
        // Fetch coupon usage logs, including the user and coupon relationships
        $usageLogs = CouponUsageLog::with('user', 'coupon')
            ->when($request->coupon_code, function ($query) use ($request) {
                $query->whereHas('coupon', function ($query) use ($request) {
                    $query->where('code', $request->coupon_code);
                });
            })
            ->when($request->date_from, function ($query) use ($request) {
                $query->where('used_at', '>=', $request->date_from);
            })
            ->when($request->date_to, function ($query) use ($request) {
                $query->where('used_at', '<=', $request->date_to);
            })
            ->get();

        return view('admin.coupon.reports', compact('usageLogs'));
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            Coupon::findOrFail($id)->delete();

            return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        } catch (\Exception $e) {
            return response(['status' => 'error', 'message' => 'Something went wrong!']);
        }
    }
}
