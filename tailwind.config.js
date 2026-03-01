/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: 'selector',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./src/**/*.{html,js}"
    ],
    theme: {
        screens: {
            xs: "320px",
            // => @media (min-width: 320px) { ... }

            sm: "640px",
            // => @media (min-width: 640px) { ... }

            md: "768px",
            // => @media (min-width: 768px) { ... }

            lg: "1024px",
            // => @media (min-width: 1024px) { ... }

            xl: "1280px",
            // => @media (min-width: 1280px) { ... }

            "2xl": "1536px",
            // => @media (min-width: 1536px) { ... }
        },
        extend: {
            fontFamily: {
                Poppins: ["Poppins", "sans-serif"]
            },
            colors: {
                backdrop: {
                    DEFAULT: '#FAFAFA'
                },
                'bossanova': { // primary theme color
                    '50': '#faf6fd',
                    '100': '#f5edfa',
                    '200': '#ecdaf4',
                    '300': '#ddbdea',
                    '400': '#ca95dd',
                    '500': '#b16bca',
                    '600': '#954cad',
                    '700': '#7c3c8f',
                    '800': '#673375',
                    '900': '#5d3167',
                    '950': '#36143e',
                },
                'swahiba-orange': {
                    '50': '#E26F5A',
                }
            },
        },
    },
    plugins: [require("@tailwindcss/forms")],
};

