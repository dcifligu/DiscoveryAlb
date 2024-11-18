import defaultTheme from 'tailwindcss/defaultTheme';


/** @type {import('tailwindcss').Config} */
export default {
   content: [
       './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
       './storage/framework/views/*.php',
       './resources/**/*.blade.php',
       './resources/**/*.js',
       './resources/**/*.vue',
   ],
   theme: {
       extend: {
           keyframes: {
               slideDown: {
                 '0%': { transform: 'translateY(-100%)', opacity: '0' },
                 '100%': { transform: 'translateY(0)', opacity: '1' },
               },
               slideUp: {
                 '0%': { transform: 'translateY(0)', opacity: '1' },
                 '100%': { transform: 'translateY(-100%)', opacity: '0' },
               },
             },
             animation: {
               slideDown: 'slideDown 0.3s ease-out',
               slideUp: 'slideUp 0.3s ease-out',
             },
           fontFamily: {
               sans: ['Figtree', ...defaultTheme.fontFamily.sans],
           },
       },
   },
   plugins: [],
};
