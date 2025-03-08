
<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
</head>
<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">

        @include('layouts.sidebar')


        <div class="flex-1 flex flex-col overflow-hidden">

            @include('layouts.header')
            
  
            <main class="flex-1 overflow-y-auto p-6">
                @yield('content')
            </main>
        </div>
    </div>

    @yield('scripts')
</body>
</html>