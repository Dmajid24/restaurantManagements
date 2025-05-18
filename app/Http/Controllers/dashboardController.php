<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\TransactionDetail;
use App\Models\TransactionHeader;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(){

        // Top 3 Produk Terlaris
        $topProducts = transactionDetail::select('menuID', DB::raw('SUM(Quantity) as total_sold'))
            ->groupBy('menuID')
            ->orderByDesc('total_sold')
            ->take(3)
            ->with('menu') // Relasi ke tabel menu
            ->get();

    // Jumlah Total Transaksi
        $totalTransactions = transactionHeader::count();

    return view('dashboard', compact('topProducts', 'totalTransactions'));
    }
}
