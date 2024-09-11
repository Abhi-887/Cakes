<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TodaysOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    function index(TodaysOrderDataTable $dataTable) : View|JsonResponse
    {
        $todaysOrders = Order::whereDate('created_at', now()->format('Y-m-d'))->count();
        $todaysEarnings = Order::whereDate('created_at', now()->format('Y-m-d'))->where('order_status', 'delivered')->sum('grand_total');

        $thisMonthsOrders = Order::whereMonth('created_at', now()->month)->count();
        $thisMonthsEarnings = Order::whereMonth('created_at', now()->month)->where('order_status', 'delivered')->sum('grand_total');

        $thisYearOrders = Order::whereYear('created_at', now()->year)->count();
        $thisYearEarnings = Order::whereYear('created_at', now()->year)->where('order_status', 'delivered')->sum('grand_total');

        // $totalOrders = Order::count();
        $totalEarnings = Order::where('order_status', 'delivered')->sum('grand_total');

        $totalUsers = User::where('role', 'user')->count();
        $totalAdmins = User::where('role', 'admin')->count();

        $totalProducts = Product::count();
        $totalBlogs = Blog::count();

        $totalSales = Order::where('payment_status', 'completed')->sum('grand_total');

        $today = Carbon::today();
    $yesterday = Carbon::yesterday();

    $todayVisitors = Visitor::whereDate('created_at', $today)->count();
    $yesterdayVisitors = Visitor::whereDate('created_at', $yesterday)->count();

    // Calculate the percentage change
    if ($yesterdayVisitors > 0) {
        $percentageChange2 = (($todayVisitors - $yesterdayVisitors) / $yesterdayVisitors) * 100;
    } else {
        $percentageChange2 = $todayVisitors > 0 ? 100 : 0; // Handle division by zero
    }

         // Fetch total revenue
    $totalRevenue = Order::where('payment_status', 'completed')->sum('grand_total');

    // Fetch percentage increase or other metrics
    $previousRevenue = Order::where('payment_status', 'completed')
                             ->whereDate('created_at', '<', now()->subMonth())
                             ->sum('grand_total');
        $percentageChange = $previousRevenue ? (($totalRevenue - $previousRevenue) / $previousRevenue) * 100 : 0;

        // Calculate the number of completed orders
        $totalOrders = Order::where('payment_status', 'completed')->count();

        // Calculate the percentage increase/decrease in sales (e.g., compared to last month)
        $previousMonthSales = Order::where('payment_status', 'completed')
                                   ->whereMonth('created_at', now()->subMonth()->month)
                                   ->sum('grand_total');

        $currentMonthSales = Order::where('payment_status', 'completed')
                                  ->whereMonth('created_at', now()->month)
                                  ->sum('grand_total');

        $salesGrowth = 0;
        if ($previousMonthSales > 0) {
            $salesGrowth = (($currentMonthSales - $previousMonthSales) / $previousMonthSales) * 100;
        }

        $totalVisitors = Visitor::count();


        return $dataTable->render('admin.dashboard.index', compact(
            'todaysOrders',
            'todaysEarnings',
            'thisMonthsOrders',
            'thisMonthsEarnings',
            'thisYearOrders',
            'thisYearEarnings',
            'totalOrders',
            'totalEarnings',
            'totalUsers',
            'totalAdmins',
            'totalProducts',
            'totalBlogs',
            'totalSales',
            'totalOrders',
            'salesGrowth',
            'totalRevenue',
             'percentageChange',
            'percentageChange2',
             'totalVisitors',

        ));
    }

    public function recentOrders(Request $request)
{
    $period = $request->input('period', 'this_week'); // Default to this week
    $query = Order::query();

    if ($period === 'last_week') {
        $startDate = now()->subWeek()->startOfWeek();
        $endDate = now()->subWeek()->endOfWeek();
    } else {
        $startDate = now()->startOfWeek();
        $endDate = now()->endOfWeek();
    }

    $recentOrders = $query->whereBetween('created_at', [$startDate, $endDate])
                          ->orderBy('created_at', 'desc')
                          ->get();

    return response()->json($recentOrders);
}

// function startSession()
// {
//     $visitor = Visitor::create([
//         'session_start' => now(),
//         'page_views' => 1,  // Start with the first page view
//     ]);

//     // Store the visitor ID in the session
//     Session::put('visitor_id', $visitor->id);
// }

// function incrementPageView()
// {
//     $visitorId = Session::get('visitor_id');
//     if ($visitorId) {
//         $visitor = Visitor::find($visitorId);
//         if ($visitor) {
//             $visitor->increment('page_views');
//         }
//     }
// }

// function endSession()
// {
//     $visitorId = Session::get('visitor_id');
//     if ($visitorId) {
//         $visitor = Visitor::find($visitorId);
//         if ($visitor) {
//             $visitor->update([
//                 'session_end' => now(),
//             ]);
//         }
//     }

//     // Clear the session data
//     Session::forget('visitor_id');
// }


    function clearNotification() {
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);

        toastr()->success('Notification Cleared Successfully!');
        return redirect()->back();
    }
}
