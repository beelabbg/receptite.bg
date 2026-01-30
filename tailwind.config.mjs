/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    './resources/**/*.scss',
    './app/View/**/*.php',
  ],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#fef7ee',
          100: '#fdedd3',
          200: '#fad7a5',
          300: '#f6ba6d',
          400: '#f19332',
          500: '#ee7712',
          600: '#df5d08',
          700: '#b94409',
          800: '#93360f',
          900: '#772e10',
          950: '#401505',
        },
        secondary: {
          50: '#f4f7f7',
          100: '#e2ebea',
          200: '#c8d9d7',
          300: '#a1bfbc',
          400: '#739d99',
          500: '#58827e',
          600: '#456a67',
          700: '#3b5755',
          800: '#334948',
          900: '#2d3e3e',
          950: '#192525',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
        serif: ['Merriweather', 'Georgia', 'serif'],
      },
    },
  },
  plugins: [],
};