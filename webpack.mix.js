const mix = require('laravel-mix');

/*
|--------------------------------------------------------------------------
| Mix Asset Management
|--------------------------------------------------------------------------
*/

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .options({
        postCss: [
            require('tailwindcss'),
            require('autoprefixer'),
        ],
        processCssUrls: false,
    })
    .sourceMaps(false, 'source-map');

if (mix.inProduction()) {
    mix.version();
}
