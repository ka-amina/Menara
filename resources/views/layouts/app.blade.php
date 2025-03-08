<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="bg-gray-50">
   
        <div class="flex flex-col justify-center font-[sans-serif] p-4">
            @yield('content')
        </div>


    @yield('scripts')
</body>

</html>