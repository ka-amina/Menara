<header class="bg-white shadow-sm h-16 flex items-center justify-between px-6 w-full">
    <!-- Left side - Title -->
    <div class="flex items-center">
        <h1 class="text-xl font-semibold text-gray-800">Dashboard</h1>
    </div>
    
    <!-- Right side - User menu and notifications -->
    <div class="flex items-center space-x-4">
        <!-- Notifications -->
        <div class="relative">
            <button class="relative p-2 text-gray-600 hover:text-gray-800 transition-colors">
                <i class="fas fa-bell"></i>
                <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 text-white text-xs rounded-full flex items-center justify-center">3</span>
            </button>
        </div>
        
        <!-- Calendar Icon -->
        <div class="relative">
            <button class="relative p-2 text-gray-600 hover:text-gray-800 transition-colors">
                <i class="fas fa-calendar-day"></i>
            </button>
        </div>

        <!-- User Menu -->
        <div class="flex items-center space-x-2">
            <span class="text-sm font-medium text-gray-700">username</span>
            <i class="fas fa-chevron-down text-xs text-gray-500"></i>
        </div>
    </div>
</header>
