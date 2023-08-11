import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './vendor/laravel/jetstream/**/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
    './resources/js/**/*.vue',
  ],

  theme: {
    extend: {
      fontFamily: {
        sans: ['Figtree', ...defaultTheme.fontFamily.sans],
      },
      colors: {
        gray: {
          100: '#F8F8F8',
          200: '#E0E0E0',
          300: '#C8C8C8',
          400: '#888888',
          500: '#707070',
          600: '#505050',
          700: '#383838',
          800: '#282828',
          900: '#101010',
        },
      },
    },
  },

  plugins: [forms, typography],
};
