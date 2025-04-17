<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipadis</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
{{-- 
<body class="h-full bg-[#D9EAFD]  box-border flex flex-row">

    <!-- Sidebar -->
    <div class="">
        @include('components.layout.nav')
    </div>

    <!-- Konten utama -->
    <div class="p-[1.7rem]">
        @yield('content')
    </div>
</body> --}}

<body class="h-full bg-[#D9EAFD] flex ">

    <!-- Sidebar -->
    <div class="w-[280px] ">
        @include('components.layout.nav')
    </div>

    <!-- Konten utama -->
    <div class=" p-4 min-w-0">
        @yield('content')
    </div>
</body>

</html>
