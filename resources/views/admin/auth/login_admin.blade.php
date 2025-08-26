<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - Keuangan Kita</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Heroicons -->
  <script src="https://unpkg.com/feather-icons"></script>
</head>
<body class="bg-gradient-to-b from-sky-900 to-sky-600 min-h-screen flex flex-col">

  <!-- NAVBAR -->
  <nav class="bg-sky-900 text-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-3 flex items-center justify-between">
      <!-- Logo -->
      <div class="flex items-center space-x-2">
        <span class="font-bold text-lg">Keuangan</span>
        <span class="text-slate-200">Kita</span>
      </div>

      <!-- Menu -->
      <div class="space-x-6">
        <a href="#" class="hover:text-sky-300">Home</a>
        <a href="#" class="hover:text-sky-300">About Us</a>
        <a href="#" class="hover:text-sky-300">Contact</a>
        <a href="#" class="font-semibold hover:text-sky-300">Log In</a>
      </div>
    </div>
  </nav>

  <!-- LOGIN CARD -->
  <div class="flex-grow flex items-center justify-center px-4">
    <div class="bg-slate-300 rounded-xl shadow-lg p-8 w-full max-w-md">
      <h2 class="text-2xl font-bold text-center text-sky-900 mb-6">Log In</h2>
      
      <!-- Email -->
      <div class="mb-4">
        <label class="block text-slate-700 mb-2">Email</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
            <i data-feather="user"></i>
          </span>
          <input type="email" placeholder="Enter your email" 
            class="w-full pl-10 pr-4 py-2 border rounded-2xl focus:outline-none focus:ring-2 focus:ring-sky-500">
        </div>
      </div>

      <!-- Password -->
      <div class="mb-4">
        <label class="block text-slate-700 mb-2">Password</label>
        <div class="relative">
          <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-slate-500">
            <i data-feather="lock"></i>
          </span>
          <input type="password" id="password" placeholder="Enter your password" 
            class="w-full pl-10 pr-10 py-2 border rounded-2xl focus:outline-none focus:ring-2 focus:ring-sky-500">
          <!-- Show/Hide Button -->
          <button type="button" onclick="togglePassword()" 
            class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-500 hover:text-slate-700">
            <i id="toggleIcon" data-feather="eye"></i>
          </button>
        </div>
      </div>

      <!-- Remember & Forgot -->
      <div class="flex items-center justify-between mb-6">
        <label class="flex items-center space-x-2 text-slate-600">
          <input type="checkbox" class="form-checkbox">
          <span>Remember Me</span>
        </label>
        <a href="#" class="text-sm text-sky-700 hover:underline">Forgot Password?</a>
      </div>

      <!-- Submit Button -->
      <!-- Submit Button -->
      <div class="flex justify-center">
        <button class="w-56 bg-sky-700 text-white py-2 rounded-2xl hover:bg-sky-800">Log In</button>
      </div>

    </div>
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
