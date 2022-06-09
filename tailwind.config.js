const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    purge: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                darkGreen: "#296036",
                lightGreen: "#9dbe42",
            },
            boxShadow: {
                userCard:
                    "0px 0px 7px 0px rgba(0,0,0,0.42), 0px 3px 4px -1px rgba(0,0,0,0.42)",
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
