const mix = require("laravel-mix");
const purgecss = require("@fullhuman/postcss-purgecss")({
    // Specify the paths to all of the template files in your project
    content: ["./resources/**/*.blade.php", "./resources/**/*.vue"],

    // Include any special characters you're using in this regular expression
    defaultExtractor: (content) => content.match(/[\w-/:]+(?<!:)/g) || [],
});

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    [
        require("tailwindcss"),
        ...(mix.inProduction() ? [purgecss] : []),
        require("autoprefixer"),
    ]
);
