import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.jsx",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primaryRed: {
                    600: "#9A2323",
                    700: "#7F1D1D",
                    800: "#661616",
                },
                lightGrey: {
                    600: "#E6E8EB",
                    700: "#D6DADF",
                    800: "#C6CBD3",
                },
                darkGrey: {
                    600: "#2E2E2E",
                    700: "#1E1E1E",
                    800: "#141414",
                },
                roleColors: {
                    Goalkeeper: "#FBBF24",
                    Defender: "#60A5FA",
                    Midfielder: "#34D399",
                    Forward: "#D0312D",
                },
            },
        },
    },

    plugins: [forms],
};
