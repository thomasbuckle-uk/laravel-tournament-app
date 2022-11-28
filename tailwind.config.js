const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './resources/images/**'
    ],

    theme: {
        fontFamily: {
            'gotham-bold': 'Gotham',
            'gotham-book': 'Gotham Book',
            'gotham-medium': 'Gotham Medium',
        },
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '4rem',
                xl: '5rem',
                '2xl': '6rem',
                '3xl': '6rem',
                'ultrawide': '6rem',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            screens: {
                '3xl': '1640px',
                'ultrawide': '1920px'
            },
            backgroundImage: {
                'hero-warzone': 'linear-gradient(to bottom, #14151961 0%, #141519 80%), url("/assets/images/hero_background.png")'
            }
        },
    },
    variants: {
        extend: {
            backgroundImage: {
                'hero-warzone': "linear-gradient(to bottom, #14151961 0%, #141519 80%), url('/assets/images/home/hero_background.png')"
            }
        },
    },
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/aspect-ratio'),]
};
