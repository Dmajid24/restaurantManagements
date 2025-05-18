<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
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
        $startThisMonth = $now->copy()->startOfMonth();
        $endThisMonth = $now->copy()->endOfMonth();
        $startLastMonth = $now->copy()->subMonth()->startOfMonth();
        $endLastMonth = $now->copy()->subMonth()->endOfMonth();

        // === TOTAL REVENUE BULAN INI ===
        $thisMonthRevenue = DB::table('TransactionDetail')
            ->join('msmenu', 'TransactionDetail.menuID', '=', 'msmenu.menuID')
            ->whereBetween('TransactionDetail.TransactionDate', [$startThisMonth, $endThisMonth])
            ->select(DB::raw('SUM(msmenu.menuPrice * TransactionDetail.Quantity) as total'))
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


        return view('dashboard', [
            'totalRevenue' => $thisMonthRevenue,
            'revenueGrowth' => $revenueGrowth,
            'totalOrder' => $thisMonthOrder,
            'orderGrowth' => $orderGrowth,
            'startThismonth' => $startThisMonth,
        ]);
    }

}
