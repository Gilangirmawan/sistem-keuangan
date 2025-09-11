/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: { extend: {
    fontFamily: {
                // Jadikan Poppins sebagai font sans-serif utama
                sans: ['Poppins'],
            },
  } },
  plugins: [],
}
