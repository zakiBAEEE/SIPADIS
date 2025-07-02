
<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipadis</title>
    @vite('resources/css/app.css')
</head>

<body class="h-full bg-[#D9EAFD] flex">

    {{-- SIDEBAR DESKTOP --}}
    <div
        class="hidden md:flex md:flex-col md:fixed md:inset-y-0 md:left-0 md:w-[80px] lg:w-[280px] bg-white shadow-md transition-all duration-300">
        {{-- Tidak ada ID di sini --}}
        @include('components.layout.nav')
    </div>

    <div class="flex flex-col flex-1">
        {{-- TOP NAVBAR UNTUK MOBILE --}}
        <div class="md:hidden flex justify-between items-center p-4 bg-white shadow-md sticky top-0 z-10">
            <a href="#" class="text-xl font-bold">Sipadis</a>
            <button id="sidebarToggle" class="text-gray-700 focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" viewBox="0 0 24 24"
                    fill="none">
                    <path d="M20 7L4 7" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M20 12L4 12" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                    <path d="M20 17L4 17" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round" />
                </svg>
            </button>
        </div>

        {{-- SIDEBAR MOBILE (yang akan di-toggle) --}}
        <div id="sidebar"
            class="fixed top-0 left-0 z-40 w-[280px] h-full bg-white shadow-md transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden">
            @include('components.layout.nav-toggle')
        </div>

        {{-- KONTEN UTAMA --}}
        <main class="flex-1 p-4 md:ml-[80px] lg:ml-[280px] transition-all duration-300 h-full">
            @yield('content')
        </main>
    </div>

    @vite('resources/js/app.js')
    @stack('scripts')
</body>

</html>
