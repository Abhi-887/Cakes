<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TodaysOrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\OrderPlacedNotification;
use App\Models\Product;
use App\Models\User;
use App\Models\Visitor;
use App\Services\SystemStatusService;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminDashboardController extends Controller
{
    function index(TodaysOrderDataTable $dataTable): View|JsonResponse
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

        // Calculate Site Traffic
        $trafficData = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Calculate Conversion Rate
        $totalVisitors = Visitor::count();
        $totalPurchases = Order::where('order_status', 'completed')->count();
        $conversionRate = $totalVisitors > 0 ? ($totalPurchases / $totalVisitors) * 100 : 0;

        // Calculate Bounce Rate
        $singlePageVisits = Visitor::where('page_views', 1)->count();
        $bounceRate = $totalVisitors > 0 ? ($singlePageVisits / $totalVisitors) * 100 : 0;


        // Calculate Average Session Duration
        $sessions = Visitor::whereNotNull('session_end')->get();
        $totalSessionDuration = $sessions->sum(function ($session) {
            return $session->session_end->diffInMinutes($session->session_start);
        });
        $averageSessionDuration = $sessions->count() > 0 ? $totalSessionDuration / $sessions->count() : 0;

          // Check server status
          $serverStatus = SystemStatusService::checkServerStatus();


          $ordersByStatus = DB::table('orders')
          ->select('order_status', DB::raw('count(*) as total'))
          ->groupBy('order_status')
          ->pluck('total', 'order_status');

          $topSellingProducts = OrderItem::select('product_name', DB::raw('SUM(qty) as total_qty'), DB::raw('SUM(unit_price * qty) as total_revenue'))
          ->groupBy('product_name')
          ->orderBy('total_qty', 'desc')
          ->limit(10)
          ->get();

          $lowStockAlerts = Product::select('name', 'quantity')
          ->where(function ($query) {
              $query->where('quantity', '<=', 5)
                    ->orWhere('quantity', '=', 0);
          })
          ->get();


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
            'trafficData',
            'conversionRate',
            'bounceRate',
            'averageSessionDuration',
            'serverStatus',
            'ordersByStatus',
            "topSellingProducts",
            'lowStockAlerts',

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




    function clearNotification()
    {
        $notification = OrderPlacedNotification::query()->update(['seen' => 1]);

        toastr()->success('Notification Cleared Successfully!');
        return redirect()->back();
    }
}
