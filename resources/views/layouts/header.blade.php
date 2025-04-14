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
            <a href="{{route('calendar.index')}}">
                <button class="relative p-2 text-gray-600 hover:text-gray-800 transition-colors">
                    <i class="fas fa-calendar-day"></i>
                </button>
            </a>

        </div>

        <!-- User Menu -->
        <div class="relative group">
            <button class="flex items-center space-x-2 p-2 text-gray-600 hover:text-gray-800 transition-colors">
                @if (Auth::check() && Auth::user()->avatar)
                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="User Avatar" class="w-10 h-10 rounded-full">
                @else
                <div class="w-10 h-10 rounded-full bg-indigo-600 flex justify-center items-center text-white">
                    {{ collect(explode(' ', Auth::user()->name))->map(fn($word) => strtoupper($word[0]))->join('') }}
                </div>
                @endif



                <!-- Authenticated User's Name -->
                <span class="text-sm font-medium text-gray-700">{{ Auth::user()->name }} </span>

                <!-- Dropdown icon -->
                <i class="fas fa-chevron-down text-xs text-gray-500"></i>
            </button>

            <!-- Dropdown Menu -->
            <div class="menu_nv absolute right-0 top-full bg-white border border-1 border-gray-300 hidden group-hover:block z-10">
                <ul class="w-60 flex flex-col">
                    <!-- Profile Link -->
                    <a href="{{ route('profile') }}">
                        <li class="flex flex-col w-full py-3 px-4 hover:bg-gray-100">
                            <span>{{ Auth::user()->name }}</span>
                            <span>{{ Auth::user()->email }}</span>
                        </li>
                    </a>
                    <div class="w-full h-[1.7px] bg-gray-200"></div>
                    <!-- Settings Link -->
                    <a href="#">
                        <li class="w-full py-3 px-4 hover:bg-gray-100">
                            <span>Settings</span>
                        </li>
                    </a>

                    <!-- Logout Link -->
                    <a href="{{ route('logout') }}">
                        <li class="w-full py-3 px-4 hover:bg-gray-100">
                            <span>Log out</span>
                        </li>
                    </a>
                </ul>
            </div>
        </div>
    </div>
</header>