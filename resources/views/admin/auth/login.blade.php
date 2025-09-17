<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - myFinance</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="icon" type="image/png" href="{{ asset('img/favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body { font-family: 'Poppins', sans-serif; }
        /* Menghilangkan panah di input number */
        input[type=number]::-webkit-inner-spin-button, 
        input[type=number]::-webkit-outer-spin-button { 
            -webkit-appearance: none; 
            margin: 0; 
        }
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-[#01c350] to-[#007b89] min-h-screen flex flex-col items-center justify-center p-4 relative">

    <!-- Tombol Kembali yang Baru (Dipindahkan ke pojok) -->
    <a href="/" 
       class="absolute top-4 left-4 sm:top-6 sm:left-6 inline-flex items-center gap-2 text-white/80 hover:text-white font-medium transition-colors group z-10">
        <i class="fa-solid fa-arrow-left transition-transform duration-300 ease-in-out group-hover:-translate-x-1"></i>
        <span class="hidden sm:inline">Kembali ke Beranda</span>
    </a>

    <!-- LOGIN CARD -->
    <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <a href="/" class="text-4xl font-bold text-gray-800">
                my<span class="text-[#01c350]">Finance</span>
            </a>
            <h2 class="text-lg font-normal text-gray-500 mt-1">Masuk ke akun Anda</h2>
        </div>
        
        <form action="{{ route('login.post') }}" method="POST">
            @csrf
            
            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 mb-2 font-medium">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <i class="fa-solid fa-envelope"></i>
                    </span>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="Masukkan email Anda" 
                           class="w-full pl-10 pr-4 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]" required>
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
                        <i class="fa-solid fa-lock"></i>
                    </span>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" 
                           class="w-full pl-10 pr-10 py-2.5 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#01c350]" required>
                    <button type="button" onclick="togglePassword()" 
                            class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700">
                        <i id="toggleIcon" class="fa-solid fa-eye"></i>
                    </button>
                </div>
                 @error('password')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" 
                    class="w-full bg-gradient-to-r from-[#01c350] to-[#009588] hover:from-[#00ad75] hover:to-[#007b89] text-white font-bold py-3 px-4 rounded-xl transition-all shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-[#01c350]/40">
                Masuk
            </button>
        </form>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggleIcon");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>

