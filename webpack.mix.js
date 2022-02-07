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

mix.js('resources/dist/js/greenpark.js', 'public/js')
    .js('resources/dist/js/sortable.js', 'public/js')
    .sass('resources/dist/sass/greenpark.scss', 'public/css')
    .sourceMaps();
