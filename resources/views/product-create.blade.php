<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add New Menu - THE PEEPS</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body class="bg-gray-50" style="font-family: 'Poppins', sans-serif">
  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-white p-4 border-r h-screen flex flex-col fixed top-0 left-0 overflow-y-auto">
      <div>
        <h1 class="text-3xl font-bold text-green-600 mb-8 text-center">THE PEEPS</h1>
        <nav class="space-y-4">
          <a href="dashboard" class="flex items-center space-x-2 text-gray-700 font-semibold text-xl">
            <span>Dashboard</span>
          </a>
          <a href="product" class="block text-gray-700 font-semibold text-xl">Products</a>
          <a href="#" class="block text-gray-700 font-semibold text-xl">Order History</a>
          <a href="staff" class="block text-gray-700 font-semibold text-xl">Staff</a>
        </nav>
      </div>
      <div class="mt-auto mb-4">
        <a href="#" class="block text-gray-700 font-medium text-base">Settings</a>
        <a href="#" class="block text-red-500 font-medium text-base mt-2">Logout</a>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 ml-64">
      <!-- Header (Sama dengan product.blade.php) -->
      <header class="flex justify-between items-center mb-6 p-4">
        <div>
          <h2 class="text-lg font-semibold">Product Creation</h2>
          <p class="text-sm text-gray-500">{{ $today }}</p>
        </div>

      <!-- Notification and Profile -->
      <div class="flex items-center space-x-6">
      <!-- Notification Icon -->
        <button class="relative p-2 text-gray-600 hover:text-gray-900 rounded-full hover:bg-gray-100 transition">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
          </svg>
          <span class="absolute top-0 right-0 h-2 w-2 rounded-full bg-red-500"></span>
        </button>
    
        <!-- Profile -->
          <div class="flex items-center space-x-3">
            <div class="relative">
              <img src="{{ asset('2b0401bf88244fac037c2b1627b3118c.jpg') }}" alt="User" class="w-10 h-10 rounded-full object-cover border-2 border-green-500">
              <span class="absolute bottom-0 right-0 block h-2.5 w-2.5 rounded-full bg-green-500 ring-2 ring-white"></span>
            </div>
            <div class="text-right">
              <p class="font-semibold text-gray-800">John Doe</p>
              <p class="text-sm text-gray-500">Operations Manager</p>
            </div>
          </div>
        </div>
    </header>
    
      @if(session('success'))
      <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
        {{ session('success') }}
      </div>
      @endif

      @if($errors->any())
      <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif

      <!-- Create Form Section -->
      <div class="bg-white rounded-lg shadow-md p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Add New Menu</h1>
        
        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
          @csrf
          
          <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <!-- Menu ID (readonly) -->
            <div>
              <label for="menuID" class="block text-sm font-medium text-gray-700 mb-1">Menu ID*</label>
              <input type="text" id="menuID" name="menuID" value="{{ old('menuID') }}"
                    class="w-full px-4 py-2 border rounded-lg bg-gray-100" required>
            </div>

            <!-- Menu Name -->
            <div>
              <label for="menuName" class="block text-sm font-medium text-gray-700 mb-1">Menu Name*</label>
              <input type="text" id="menuName" name="menuName" value="{{ old('menuName') }}"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                     required>
            </div>
            
            <!-- Menu Price -->
            <div>
              <label for="menuPrice" class="block text-sm font-medium text-gray-700 mb-1">Price*</label>
              <input type="number" id="menuPrice" name="menuPrice" value="{{ old('menuPrice') }}"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                     min="0" step="100" required>
            </div>

             <!-- Menu Calorie -->
            <div>
              <label for="menuCalorie" class="block text-sm font-medium text-gray-700 mb-1">Calorie*</label>
              <input type="number" id="menuCalorie" name="menuCalorie" value="{{ old('menuCalorie') }}"
                     class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"
                     min="0" step="100" required>
            </div>
            
            <!-- Menu Category -->
            <div>
              <label for="menuType" class="block text-sm font-medium text-gray-700 mb-1">Category*</label>
              <select id="menuType" name="menuType" class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent" required>
                <option value="">Select Category</option>
                <option value="Main Course" {{ old('menuType') == 'Main Course' ? 'selected' : '' }}>Main Course</option>
                <option value="Pastry" {{ old('menuType') == 'Pastry' ? 'selected' : '' }}>Pastry</option>
                <option value="Dessert" {{ old('menuType') == 'Dessert' ? 'selected' : '' }}>Dessert</option>
                <option value="Drinks" {{ old('menuType') == 'Drinks' ? 'selected' : '' }}>Drinks</option>
              </select>
            </div>
            
          <div class="mt-8 flex space-x-4">
            <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition">
              Save Menu
            </button>
            <a href="{{ route('product.index') }}" class="border border-gray-300 px-6 py-2 rounded-lg hover:bg-gray-50 transition">
              Cancel
            </a>
          </div>
        </form>
      </div>
    </main>
  </div>
</body>
</html>