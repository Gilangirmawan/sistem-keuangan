<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    @vite('resources/css/app.css')
    <script src="//unpkg.com/alpinejs" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans">

    <div x-data="{ sidebarOpen: false }" class="relative min-h-screen md:flex">

        <div @click="sidebarOpen = false" x-show="sidebarOpen" class="fixed inset-0 bg-black bg-opacity-50 z-20 md:hidden" style="display: none;"></div>

        @include('components.sidebar')

        <div class="flex-1 flex flex-col md:ml-64">
            
            @include('components.navbar')

            <main class="flex-1 p-4 md:p-6">
                @yield('content')
            </main>
        </div>

    </div>

    @stack('scripts')
</body>
</html>