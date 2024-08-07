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

mix.js('resources/js/detail.js', 'public/js').js('resources/js/hamburger.js', 'public/js').js('resources/js/length.js', 'public/js').js('resources/js/upload.js', 'public/js').js('resources/js/reviewlist.js', 'public/js').js('resources/js/mypage.js', 'public/js').js('resources/js/done.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps();
