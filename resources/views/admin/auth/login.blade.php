<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - KeuanganApp</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-gradient-to-br from-[#01c350] to-[#006177] min-h-screen flex items-center justify-center p-4">

    <!-- Tombol Kembali ke Landing Page -->
    <a href="/" 
       class="absolute top-6 left-6 flex items-center gap-2 text-white/80 hover:text-white transition-colors group">
        <i class="fa-solid fa-arrow-left transition-transform group-hover:-translate-x-1"></i>
        <span>Kembali ke Beranda</span>
    </a>

    <!-- KARTU LOGIN -->
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        
        <!-- Logo & Header -->
        <div class="text-center mb-8">
            <a href="/" class="inline-block text-3xl font-bold text-gray-800">
                Keuangan<span class="text-[#01c350]">App</span>
            </a>
            <h2 class="text-xl text-gray-600 mt-2">Selamat Datang Kembali</h2>
        </div>
        
        <!-- Form -->
        <form action="{{ route('login.post') }}" method="POST">
            @csrf 

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i data-feather="mail" class="w-5 h-5"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="contoh@email.com" 
                           class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350] focus:border-transparent transition-colors">
                </div>
                @error('email')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-6">
                <label for="password" class="block text-gray-700 mb-2 font-medium">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i data-feather="lock" class="w-5 h-5"></i>
                    </span>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" 
                           class="w-full pl-10 pr-10 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350] focus:border-transparent transition-colors">
                    <button type="button" onclick="togglePassword()" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
                        <i id="toggleIcon" data-feather="eye" class="w-5 h-5"></i>
                    </button>
                </div>
                @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Tombol Submit -->
            <div>
                <button type="submit" 
                        class="w-full bg-gradient-to-r from-[#01c350] to-[#009588] text-white py-3 rounded-lg font-bold text-lg hover:from-[#00ad75] hover:to-[#007b89] transition-all transform hover:scale-105 shadow-lg hover:shadow-xl">
                    Log In
                </button>
            </div>
        </form>
    </div>

    <script>
        feather.replace();

        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.setAttribute("data-feather", "eye-off");
            } else {
                passwordInput.type = "password";
                toggleIcon.setAttribute("data-feather", "eye");
            }
            feather.replace();
        }
    </script>
</body>
</html>