import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],
    safelist: [
        {
            pattern: /bg-(bluewater|codex|companion|fieldcraft|honeyman|lexicon|myth|rswfire|sanctum|signal|tech|transmission)-[0-9]{3}/,
        },
        {
            pattern: /border-(bluewater|codex|companion|fieldcraft|honeyman|lexicon|myth|rswfire|sanctum|signal|tech|transmission)-[0-9]{3}/,
        },

    'bg-white',
    'bg-red-50', 'bg-purple-50', 'bg-yellow-50', 'bg-sky-50', 'bg-teal-50',
    'bg-green-50', 'bg-pink-50', 'bg-orange-50', 'bg-amber-50', 'bg-emerald-50',
    'bg-indigo-50', 'bg-blue-50',

    // Border colors
    'border-black',
    'border-red-200', 'border-purple-200', 'border-yellow-200', 'border-sky-200', 'border-teal-200',
    'border-green-200', 'border-pink-200', 'border-orange-200', 'border-amber-200', 'border-emerald-200',
    'border-indigo-200', 'border-blue-200', 'border-gray-200',

    // Hover colors
    'hover:bg-white',
    'hover:bg-red-100', 'hover:bg-purple-100', 'hover:bg-yellow-100', 'hover:bg-sky-100', 'hover:bg-teal-100',
    'hover:bg-green-100', 'hover:bg-pink-100', 'hover:bg-orange-100', 'hover:bg-amber-100', 'hover:bg-emerald-100',
    'hover:bg-indigo-100', 'hover:bg-blue-100', 'hover:bg-gray-50',

    // Text colors
    'text-black',
    'text-red-400', 'text-purple-400', 'text-yellow-400', 'text-sky-400', 'text-teal-400',
    'text-green-500', 'text-pink-400', 'text-orange-400', 'text-amber-400', 'text-emerald-400',
    'text-indigo-400', 'text-blue-400',

    ],
    theme: {
        extend: {
            colors: {
                atlas: colors.sky,
                autonomy: colors.red,
                bluewater: colors.blue,
                codex: colors.amber,
                companion: colors.gray,
                fieldcraft: colors.indigo,
                gallery: colors.orange,
                honeyman: colors.emerald,
                lexicon: colors.orange,
                myth: colors.amber,
                rswfire: colors.red,
                signal: colors.sky,
                synthesis: colors.purple,
                tech: colors.purple,
                transmission: colors.rose,
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};
// tailwind.config.js
theme: {
    extend: {
        colors: {

        }
    }
}
