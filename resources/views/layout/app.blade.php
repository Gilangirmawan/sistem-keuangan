<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My App')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 text-gray-900">

    {{-- Navbar --}}
    @include('components.navbar')

    {{-- Konten Halaman --}}
    <main class="p-6">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

    @vite('resources/js/app.js')
      <script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>
</body>
</html>
