/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        'primary': '#1D5D9B',
      },
    fontFamily: {
      'roboto': ['Roboto', 'sans-serif'],
      },
    },
  },
  plugins: [],
}