/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.{html,md,php}',
        './**/*.{html,md,php}',
        './resources/**/*.{css,scss,js,jsx}',
        './safelist.txt'
    ],
    theme: {
        container: {
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '0rem'
            },
        },
        extend: {
            
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '768px',
            'lg': '1140px',
            'xl': '1536px',
            '2xl': '1920px'
        }
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/container-queries'),
        require('tailwindcss-debug-screens'),
    ]
};
