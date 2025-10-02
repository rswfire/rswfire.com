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
    ],
    theme: {
        extend: {
            colors: {
                bluewater: colors.blue,
                codex: colors.amber,
                companion: colors.gray,
                fieldcraft: colors.indigo,
                honeyman: colors.emerald,
                lexicon: colors.orange,
                myth: colors.amber,
                rswfire: colors.red,
                signal: colors.sky,
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
