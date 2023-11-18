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
        "./index.html",
        "./src/**/*.{js,ts,jsx,tsx}",
        "./src/**/*.{html,js}",
        "./node_modules/tw-elements/dist/js/**/*.js",
        "./node_modules/flowbite/**/*.js"

    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                        'unibague-blue': '#003D7C',
            },
            opacity: {
                '2': '.02',
                '3': '.03',
                '5': '.05',

            },
            screens: {
                'sm':'430px',

            }

        },
    },

    plugins: [forms, typography,require("tw-elements/dist/plugin.cjs"),require('flowbite/plugin') ],
    darkMode: "class"
};
