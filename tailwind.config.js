const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('daisyui')],
    daisyui: {
        themes: [
            {
                mamikos: {
                    primary: '#1eb854',
                    'primary-focus': '#178c40',
                    'primary-content': '#ffffff',
                    secondary: '#1fd65f',
                    'secondary-focus': '#18aa4b',
                    'secondary-content': '#ffffff',
                    accent: '#d99330',
                    'accent-focus': '#b57721',
                    'accent-content': '#ffffff',
                    neutral: '#1eb854',
                    'neutral-focus': '#178c40',
                    'neutral-content': '#ffffff',
                    'base-100': '#ffffff',
                    'base-200': '#f9fafb',
                    'base-300': '#d1d5db',
                    'base-content': '#1f2937',
                    info: '#2094f3',
                    success: '#009485',
                    warning: '#ff9900',
                    error: '#ff5724',
                },
            },
        ],
    },
}
