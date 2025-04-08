import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'green-900': '#0a6640',
                'green-800': '#0f9d58',
                'green-700': '#15bf66',
                'yellow-900': '#b45309',
                'yellow-800': '#d9770a',
                'yellow-700': '#f29e02',
                'red-900': '#9b2c2c',
                'red-800': '#c53030',
                'red-700': '#e53e3e',
                'orange-900': '#9d2c0f',
                'orange-800': '#d9770a',
                'orange-700': '#f29e02',
                'cyan-900': '#0f172a',
                'cyan-800': '#1e293b',
                'cyan-700': '#334155',
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
