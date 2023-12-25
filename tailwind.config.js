/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
  theme: {
    extend: {
        colors: {
            'andak': {
                'light': '#de6033',
                DEFAULT: '#BF491F',
                'dark': '#933818',
            },
            'andak-extended': {
                'yellow': '#F2C53D',
                'green': '#45735D',
                'olive': '#8A8C3F',
                'mush': '#BCBF5E',
            }
        },
    },
  },
  plugins: [],
}

