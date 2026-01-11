const oldColors = {
          // Extend Tailwind's default colors
          lightblue: '#edf2fc',
          blue: '#3f78e0',
          offwhite: '#f3f8f8',
          lightgray: '#aab0bc',
          lightgrey: '#aab0bc',
          darkgrey: '#313e3b',
          darkgray: '#313e3b',
          'blue-900': '#262b32',
          'bottle-green': '#004a3f',
          bottlegreen: '#004a3f',
          'dark-green': '#003c32',
          darkgreen: '#003c32',
          yellow: '#d5d52b',
          'blue-gray': '#f1f3f9',
          'blue-grey': '#f1f3f9',
          bluegray: '#f1f3f9',
          bluegrey: '#f1f3f9',
          blue: '#1a73e8',
          '-blue-50': '#031f42b3',
          darkblue: '#031f42',
          'dark-blue': '#031f42',
}


const customColors = {
  lightgrey:'#f6f7fa',
  lightgray: '#f6f7fa',
  blue: {
    //'DEFAULT':'#006cfa',
    'DEFAULT':'#3D7EDB',
    'main': '#3D7EDB',
    'dark':'#003F72',
    'grey':'#e4efff',
    'gray':'#e4efff',
    10: '#f2f8ff',
    50: '#e5f0ff',
    100: '#cce2fe',
    200: '#99c4fd',
    300: '#66a7fc',
    400: '#5589f2',
    500: '#006cfa',
    600: '#0056c8',
    700: '#004196',
    800: '#002b64',
    900: '#001632',
  },
  grey: {
    50: '#f2f4f7',
    100: '#e6e9ef',
    200: '#ccd4de',
    300: '#b3bece',
    400: '#99a9bd',
    500: '#8093ad',
    600: '#66768a',
    700: '#4d5868',
    800: '#333b45',
    900: '#1a1d23',
  },
  gray: {
    50: '#f2f4f7',
    100: '#e6e9ef',
    200: '#ccd4de',
    300: '#b3bece',
    400: '#99a9bd',
    500: '#8093ad',
    600: '#66768a',
    700: '#4d5868',
    800: '#333b45',
    900: '#1a1d23',
  },
};

/** @type {import('tailwindcss').Config} config */
const config = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    container: {
      center: true,
      padding: {
        DEFAULT: '1rem',
        lg: '1rem',
      },
    },
    extend: {
      colors: customColors,
      backgroundImage: (theme) => ({
        'gradient-aztec':
          'linear-gradient(to right bottom,#313e3b,#2e3b38,#2c3835,#293532,#27322f);',
      }),
    },
  },
  plugins: [],
};

export default config;
