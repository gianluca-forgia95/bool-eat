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

mix.js('resources/js/app.js', 'public/js')
   .js('resources/js/guest-index.js', 'public/js')
   .js('resources/js/guest_cart.js', 'public/js')
   .js('resources/js/total.js', 'public/js')
   .js('resources/js/success.js', 'public/js')
   .js('resources/js/scroll_up.js', 'public/js')
   .js('resources/js/dark_mode.js', 'public/js')

   .sass('resources/sass/app.scss', 'public/css')
   .options({
      processCssUrls: false
   });

