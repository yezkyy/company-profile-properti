// tailwind.config.js
/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors: {
        primary: '#1E40AF', // biru tua
        secondary: '#60A5FA', // biru terang
        accent: '#F59E0B', // oranye/emas
        neutral: '#1F2937', // abu gelap
        base: '#F9FAFB' // latar belakang putih terang
      }
    },
  },
  plugins: [],
}