const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');

mix.webpackConfig({
    resolve: {
        alias: {
            jquery: "jquery/src/jquery"
        }
    }
});

mix.js('resources/app/js/app.js', 'public/app/js')
    .sass('resources/app/sass/app.scss', 'public/app/css');
