const colors = require('tailwindcss/colors');

module.exports = {
    mode: 'jit',
    purge: [
        './resources/**/*.{js,vue,blade.php}',
        './app/Providers/AnimationsServiceProvider.php',
    ],
    darkMode: 'media', // or 'media' or 'class'
    theme: {
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            white: colors.white,
            black: colors.black,
            'blue-gray': colors.blueGray,
            'cool-gray': colors.coolGray,
            gray: colors.gray,
            'true-gray': colors.trueGray,
            'warm-gray': colors.warmGray,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
        },
        extend: {
            animation: {
                'slide-in-down': 'slideInDown 0.5s',
            },
            colors: {
                dark: 'hsl(215,15%,16%)',
                'dark-gray': 'hsl(210,32%,85%)',
                'dark-line': 'hsl(214,13%,25%)',
                'dark-line-lighter': 'hsl(208,13%,30%)',
                pizza: 'hsl(29,100%,52%)',
                'pizza-dark': 'hsl(331,94%,52%)',
            },
            fontFamily: {
                anton: ['Anton', 'sans-serif'],
                merriweather: ['Merriweather', 'serif'],
                'roboto-mono': ['Roboto Mono', 'sans-serif'],
            },
            keyframes: {
                slideInDown: {
                    from: {
                        transform: 'translate3d(0, -100%, 0)',
                    },
                    to: {
                        transform: 'translate3d(0, 0, 0)',
                    },
                },
            },
            typography(theme) {
                return {
                    dark: {
                        css: {
                            color: theme('colors.gray.300'),
                            '[class~="lead"]': {
                                color: theme('colors.gray.400'),
                            },
                            a: { color: theme('colors.gray.100') },
                            strong: { color: theme('colors.gray.100') },
                            'ul > li::before': {
                                backgroundColor: theme('colors.gray.300'),
                            },
                            hr: { borderColor: theme('colors.gray.800') },
                            blockquote: {
                                color: theme('colors.gray.100'),
                                borderLeftColor: theme('colors.gray.400'),
                            },
                            h1: { color: theme('colors.gray.100') },
                            h2: { color: theme('colors.gray.100') },
                            h3: { color: theme('colors.gray.100') },
                            h4: { color: theme('colors.gray.100') },
                            code: { color: theme('colors.gray.100') },
                            'a code': { color: theme('colors.gray.100') },
                            pre: {
                                color: theme('colors.gray.200'),
                                backgroundColor: theme('colors.gray.700'),
                            },
                            thead: {
                                color: theme('colors.gray.100'),
                                borderBottomColor: theme('colors.gray.700'),
                            },
                            'tbody tr': {
                                borderBottomColor: theme('colors.gray.800'),
                            },
                        },
                    },
                };
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
