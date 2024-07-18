import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
const colors = require('tailwindcss/colors')
/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'false',
    presets: [
		require("./vendor/wireui/wireui/tailwind.config.js"),
		 require("./vendor/power-components/livewire-powergrid/tailwind.config.js"),
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
        './vendor/wire-elements/modal/**/*.blade.php',
        './vendor/wire-elements/modal/src/ModalComponent.php',

        // "./vendor/wire-elements/modal/src/ModalComponent.php",

        
    ],

    theme: {
        extend: {

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: colors.blue,
                secondary: colors.gray,
                positive: colors.emerald,
                negative: colors.red,
                warning: colors.amber,
                info: colors.blue
            },
        },
    },

    plugins: [
		forms,
		// require("daisyui")
	],
};
