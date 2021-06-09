module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.{js,vue,blade.php}',
        './app/Providers/AnimationsServiceProvider.php',
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        extend: {
            colors: {
                dark: 'hsl(215,15%,16%)',
                'dark-gray': 'hsl(210,32%,85%)',
                pizza: 'hsl(29,100%,52%)',
                'pizza-dark': 'hsl(331,94%,52%)',
            },
            fontFamily: {
                anton: ['Anton', 'sans-serif'],
                merriweather: ['Merriweather', 'serif'],
                'roboto-mono': ['Roboto Mono', 'sans-serif'],
            },
            transitionTimingFunction: {
                'out-bounce': 'cubic-bezier(0.68, -0.55, 0.27, 1.55)',
            },
            zIndex: {
                '-10': '-10',
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms'),
        require('@tailwindcss/line-clamp'),
        require('@tailwindcss/typography'),
    ],
};
