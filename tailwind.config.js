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
            // adds custom colors for Tailwind CSS
            colors: {
                'formbtn': '#B6BBC4',
                'formhover': '#31304D',
                'formbtndrk': '#161A30',
                'formhoverdrk': '#31304D',
                'sand': '#F0ECE5',
                'sandbg': '#e3ddd3',
                'sandbg2': '#f0e9df',

            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },

    },
    plugins: [forms],
};
