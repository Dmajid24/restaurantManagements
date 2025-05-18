<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\MsMenu;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $selectedCategory = $request->input('category', null);
        $searchQuery = $request->input('search', null);
        
        $query = DB::table('msmenu')
            ->select('menuID', 'menuName', 'menuPrice', 'menuType');
        
        // Filter berdasarkan kategori jika dipilih
        if ($selectedCategory) {
            $query->where('menuType', $selectedCategory);
        }
        
        // Filter berdasarkan kata kunci pencarian
        if ($searchQuery) {
            $query->where('menuName', 'like', '%'.$searchQuery.'%');
        }
        
        // Jika tidak ada filter, ambil 20 produk pertama
        if (!$selectedCategory && !$searchQuery) {
            $query->take(20);
        }
        
        $products = $query->orderBy('menuName')->get();
        
        return view('product', [
            'products' => $products,
            'selectedCategory' => $selectedCategory,
            'searchQuery' => $searchQuery // Kirim kembali nilai search untuk ditampilkan di input
        ]);
    }

    public function show($id)
    {
        $today = now()->format('l, d F Y');
        $product = DB::table('msmenu')
            ->where('menuID', $id)
            ->first();

        if (!$product) {
            abort(404); // Produk tidak ditemukan
        }

        return view('product-detail', [
            'product' => $product,
            'today' => $today
        ]);
    }

    public function edit($id)
    {
        $today = now()->format('l, d F Y');
        $product = DB::table('msmenu')->where('menuID', $id)->first();
        return view('product-edit', ['product' => $product, 'today' => $today]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'menuName' => 'required|string|max:255',
            'menuPrice' => 'required|numeric|min:0',
            'menuType' => 'required|string'
        ]);

        DB::table('msmenu')
            ->where('menuID', $id)
            ->update([
                'menuName' => $validated['menuName'],
                'menuPrice' => $validated['menuPrice'],
                'menuType' => $validated['menuType'],
            ]);

        return redirect()->route('product.detail', $id)->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        DB::table('msmenu')->where('menuID', $id)->delete();
        
        return redirect()->route('product.index')
                    ->with('success', 'Product deleted successfully');
    }


    public function create()
    {
        $today = now()->format('l, d F Y');
        return view('product-create', ['today' => $today]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'menuID' => 'required|string|unique:msmenu,menuID',
            'menuName' => 'required|string|max:255',
            'menuPrice' => 'required|numeric|min:0',
            'menuType' => 'required|string',
            'menuCalorie' => 'nullable|string',
        ]);

        $imagePath = null;
        if ($request->hasFile('menuImage')) {
            $imagePath = $request->file('menuImage')->store('menu-images', 'public');
        }

        DB::table('msmenu')->insert([
            'menuID' => $validated['menuID'],
            'menuName' => $validated['menuName'],
            'menuPrice' => $validated['menuPrice'],
            'menuType' => $validated['menuType'],
            'menuCalorie' => $validated['menuCalorie'] ?? null,
        ]);

        return redirect()->route('product.index')
                    ->with('success', 'Menu added successfully!');
    }
}