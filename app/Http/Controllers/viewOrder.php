<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\DB;

class ViewOrder extends Controller
{

   
    private function calculateGrowth($current, $previous)
    {
        if ($previous == 0) {
            return $current > 0 ? 100 : 0;
        }
    
        return (($current - $previous) / $previous) * 100;
    }

    public function index()
    {
        $now = Carbon::now();
        $today = now()->format('l, d F Y');
        $startThisMonth = $now->copy()->startOfMonth();
        $endThisMonth = $now->copy()->endOfMonth();
        $startLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endLastMonth = $now->copy()->subMonth()->endOfMonth();

        // === TOTAL REVENUE BULAN INI ===
        $thisMonthRevenue = DB::table('TransactionDetail')
            ->join('msmenu', 'TransactionDetail.menuID', '=', 'msmenu.menuID')
            ->select(DB::raw('SUM(msmenu.menuPrice * TransactionDetail.Quantity) as total'))
            ->whereBetween('TransactionDetail.TransactionDate', [$startThisMonth, $endThisMonth])
            ->value('total');

        // === TOTAL REVENUE BULAN LALU ===
        $lastMonthRevenue = DB::table('TransactionDetail')
            ->join('msmenu', 'TransactionDetail.menuID', '=', 'msmenu.menuID')
            ->whereBetween('TransactionDetail.TransactionDate', [$startLastMonth, $endLastMonth])
            ->select(DB::raw('SUM(msmenu.menuPrice * TransactionDetail.Quantity) as total'))
            ->value('total');

        $revenueGrowth = $this->calculateGrowth($thisMonthRevenue, $lastMonthRevenue);

        // === TOTAL ORDER BULAN INI ===
        $thisMonthOrder = DB::table('TransactionDetail')
            ->whereBetween('TransactionDate', [$startThisMonth, $endThisMonth])
            ->select('TransactionID')
            ->distinct()
            ->count();

        // === TOTAL ORDER BULAN LALU ===
        $lastMonthOrder = DB::table('TransactionDetail')
            ->whereBetween('TransactionDate', [$startLastMonth, $endLastMonth])
            ->select('TransactionID')
            ->distinct()
            ->count();

        $orderGrowth = $this->calculateGrowth($thisMonthOrder, $lastMonthOrder);

        $topProducts = TransactionDetail::select('msmenu.menuID', 'msmenu.menuname', DB::raw('SUM(transactiondetail.quantity) as total_sold'))
            ->join('msmenu', 'transactiondetail.menuID', '=', 'msmenu.menuID')
            ->whereMonth('transactiondetail.transactiondate', now()->month)
            ->whereYear('transactiondetail.transactiondate', now()->year)
            ->groupBy('msmenu.menuID', 'msmenu.menuname')
            ->orderByDesc('total_sold')
            ->limit(3)
            ->get();

    // Jumlah Total Transaksi
        $totalTransactions = TransactionHeader::whereHas('transactionDetails', function ($query) use ($startThisMonth, $endThisMonth) {
            $query->whereBetween('TransactionDate', [$startThisMonth, $endThisMonth]);
        })->count();
        $totalProfit = $thisMonthRevenue * 0.3;

        $totalTransactionsLast = TransactionHeader::whereHas('transactionDetails', function ($query) use ($startLastMonth, $endLastMonth) {
            $query->whereBetween('TransactionDate', [$startLastMonth, $endLastMonth]);
        })->count();

        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();
        $weeklySales = TransactionDetail::select(
                DB::raw('DATE(transactiondate) as date'),
                DB::raw('SUM(transactiondetail.quantity * msmenu.menuPrice) as total')
            )
            ->join('msmenu', 'transactiondetail.menuID', '=', 'msmenu.menuID')
            ->whereBetween('transactiondate', [$startOfWeek, $endOfWeek])
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        // Format weekly sales data
        $weeklySalesData = [];
        $currentDay = $startOfWeek->copy();
        while ($currentDay <= $endOfWeek) {
            $dateString = $currentDay->format('Y-m-d');
            $sale = $weeklySales->firstWhere('date', $dateString);
            $weeklySalesData[] = $sale ? $sale->total : 0;
            $currentDay->addDay();
        }

        $totalProfit = $thisMonthRevenue * 0.3;
        return view('dashboard', [
            'topProducts' => $topProducts,
            'totalTransactions' => $totalTransactions,
            'totalRevenue' => $thisMonthRevenue,
            'revenueGrowth' => $revenueGrowth,
            'totalOrder' => $thisMonthOrder,
            'orderGrowth' => $orderGrowth,
            'today' => $today,
            'totalProfit' => $totalProfit,
            'lastMonthProfit' => $lastMonthRevenue * 0.3,
            'weeklySales' => $weeklySalesData,
            'totalTransactionsLast' => $totalTransactionsLast,
            'totalRevenueLast' => $lastMonthRevenue,
            'revenueGrowthLast' => $this->calculateGrowth($lastMonthRevenue, $thisMonthRevenue),
            'orderGrowthLast' => $this->calculateGrowth($lastMonthOrder, $thisMonthOrder),
            'startOfWeek' => $startOfWeek->format('Y-m-d'),
            'endOfWeek' => $endOfWeek->format('Y-m-d'),
        ]);
    }

}