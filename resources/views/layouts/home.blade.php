<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistem Pencatatan Keuangan') - {{ config('app.name', 'Keuangan App') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite Assets -->
    @vite('resources/css/app.css')

    <!-- Font Awesome -->
    {{-- PERBAIKAN: Atribut 'integrity' yang salah ketik telah diperbaiki --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" xintegrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Alpine.js -->
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-50" style="font-family: 'Poppins', sans-serif;">

    <!-- Header / Navbar Landing Page -->
    <header class="bg-white shadow-md sticky top-0 z-50">

        <nav class="container mx-auto px-4 py-4 flex justify-start items-center">
            <a href="/" class="text-2xl font-bold text-slate-800">
                my<span class="text-[#01c350]">Finance</span>
            </a>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white border-t mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-gray-500">
            &copy; {{ date('Y') }} <a href="https://techade.id/" target="_blank" class="text-[#01c350] hover:text-[#00ad75] transition-colors duration-300 hover:underline">Techade.id</a>. All Rights Reserved.
        </div>
    </footer>

    @stack('scripts')
    <!-- AOS CSS -->
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

</body>
</html>

