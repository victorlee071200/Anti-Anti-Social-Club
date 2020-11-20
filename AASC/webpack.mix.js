const mix = require("laravel-mix");
const tailwindcss = require("tailwindcss");

mix.js("resources/js/app.js", "public/js").postCss(
    "resources/css/app.css",
    "public/css",
    []
);

mix.css("resources/css/app.css", "public/css").options({
    processCssUrls: false,
    postCss: [tailwindcss("tailwind.config.js")]
});
