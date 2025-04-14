<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipadis</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="h-full bg-[#D9EAFD] flex box-border">

    <!-- Sidebar -->
    <div class="">
        @include('components.nav')
    </div>

    <!-- Konten utama -->
    <div class="p-[1.9rem]">
        @yield('content')
    </div>
</body>

</html>
