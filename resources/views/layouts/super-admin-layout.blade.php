<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipadis</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body class="h-full bg-[#D9EAFD]">

    <div class="position-fixed top-0 left-0">
        @include('components.nav')

    </div>
    @yield('content')


</body>

</html>
