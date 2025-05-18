<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - THE PEEPS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="css/dashboard.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50" style="font-family: 'Poppins', sans-serif">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white p-4 border-r h-screen flex flex-col fixed top-0 left-0 overflow-y-auto">
    <!-- Bagian Atas: Logo & Menu Utama -->
    <div>
        <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">THE PEEPS</h1>  <!-- Ukuran font diperbesar (text-3xl) -->
        <nav class="space-y-4">
        <a href="dashboard" class="flex items-center space-x-2 text-gray-700 font-large text-xl">  <!-- Ukuran font diseragamkan --><span>Dashboard</span>
        </a>
        <a href="product" class="block text-gray-700 font-large text-xl">Products</a>  <!-- text-base untuk konsistensi -->
        <a href="#" class="block text-gray-700 font-large text-xl">Order History</a>
        <a href="staff" class="block text-gray-700 font-large text-xl">Staff</a>
        </nav>
    </div>

    <!-- Bagian Bawah: Settings & Logout -->
    <div class="mt-auto mb-4">  <!-- mt-auto untuk mendorong ke bawah -->
        <a href="#" class="block text-gray-700 font-medium text-base">Settings</a>
        <a href="#" class="block text-red-500 font-medium text-base mt-2">Logout</a>
    </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 ml-64">
      <header class="flex justify-between items-center mb-6">
        <div>
          <h2 class="text-lg font-semibold">Dashboard</h2>
          <p class="text-sm text-gray-500">{{ $today }}</p>
        </div>
        <div class="flex items-center space-x-4">
          <span class="text-xl">🔔</span>
          <div class="bg-white p-4 rounded-lg shadow-sm border border-gray-100">
            <div class="flex items-center space-x-3">
                <img src="https://via.placeholder.com/40" alt="User" class="w-10 h-10 rounded-full"> <!-- rounded-full untuk lingkaran sempurna -->
                <div>
                <p class="font-semibold text-gray-800">John Doe</p>
                <p class="text-sm text-gray-500">Operations Manager</p>
                </div>
            </div>
        </div>
      </header>

      <!-- Stats Cards -->
      <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Total Revenue</p>
          <h3 class="text-xl font-bold">Rp{{ $totalRevenue }}</h3>
          <p class="text-sm text-green-500">▲ +{{$revenueGrowth}}% than last month</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">Total Profit</p>
          <h3 class="text-xl font-bold">Rp{{ $totalProfit }}</h3>
          <p class="text-sm text-green-500">▲ +% than last month</p>
        </div>
        <div class="bg-white p-4 rounded-lg shadow-md">
          <p class="text-sm text-gray-500">TotalOrder</p>
          <h3 class="text-xl font-bold">{{$totalOrder}}</h3>
          <p class="text-sm text-green-500">▲ +{{$orderGrowth}}% than last month</p>
        </div>
      </div>

      <!-- Weekly Sales & Side Widgets -->
      <div class="grid grid-cols-3 gap-4 mb-6">
        <div class="col-span-2 bg-white p-4 rounded-lg shadow-md">
            <h4 class="text-md font-semibold mb-2">Weekly Sales</h4>
            <p class="text-sm text-gray-500 mb-4">{{ $startOfWeek}} - {{ $endOfWeek }}</p>
            <div class="h-40 bg-gray-100 flex items-end space-x-2 px-2">
              @foreach($weeklySales as $index => $sales)
                @php
                  $maxSales = max($weeklySales) ?: 1;
                  $heightPercentage = ($sales / $maxSales) * 80;
                  $colorClass = $index % 2 === 0 ? 'bg-green-400' : 'bg-yellow-300';
                @endphp
                <div class="w-full {{ $colorClass }} rounded-t-lg" style="height: {{ $heightPercentage }}%"></div>
              @endforeach
        </div>
        </div>

    <div class="space-y-4">
            <div class="bg-white p-4 rounded-lg shadow-md">
              <h4 class="text-md font-semibold mb-2">Top Product Sold</h4>
              <ul class="text-sm text-gray-700 space-y-1">
                @foreach($topProducts as $product)
                  <li>#{{ $product->menuID }} - {{ $product->menuname }}</li>
                @endforeach
              </ul>
            </div>
           <div class="bg-white p-4 rounded-lg shadow-md">
            <h4 class="text-md font-semibold mb-2">Order Summary</h4>
            <ul class="text-sm text-gray-700 space-y-1">
              <li>🍳 OnKitchen: 10</li>
              <li>🚚 Delivered: 10</li>
              <li>✅ Completed: 10</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Staff Presence -->
      <div class="bg-white p-4 rounded-lg shadow-md flex flex-col" 
      style="height: calc(100vh - env(safe-area-inset-top) - env(safe-area-inset-bottom) - 2rem)">
      <h4 class="text-md font-semibold mb-4">Staff Presence</h4>
      <div class="flex-1 overflow-auto">
            <!-- Konten Chart/Table -->
            <div class="h-full min-h-[300px] bg-gray-50 rounded grid place-items-center">
            <p class="text-gray-500">Chart/Table content goes here</p>
            </div>
        </div>
     </div>
    </main>
  </div>
</body>
</html>