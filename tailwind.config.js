/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php',
  ],
  theme: {
    extend: {
      font:{
        sans: ['Segoe UI', 'sans-serif'],
      }
    },
  },
  plugins: [],
}
