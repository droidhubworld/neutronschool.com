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

 mix.setPublicPath('public')
 .setResourceRoot('../') // Turns assets paths in css relative to css file
 // .options({
 //     processCssUrls: false,
 // })
 .styles([
    'resources/assets/css/frontend/preloader.css',
    'resources/assets/css/frontend/bootstrap.min.css',
    'resources/assets/css/frontend/meanmenu.css',
    'resources/assets/css/frontend/animate.min.css',
    'resources/assets/css/frontend/owl.carousel.min.css',
    'resources/assets/css/frontend/swiper-bundle.css',
    'resources/assets/css/frontend/backToTop.css',
    'resources/assets/css/frontend/jquery.fancybox.min.css',
    'resources/assets/css/frontend/fontAwesome5Pro.css',
    'resources/assets/css/frontend/elegantFont.css',
    'resources/assets/css/frontend/default.css',
    'resources/assets/css/frontend/style.css',
    'resources/assets/css/frontend/preloader.css',
    ], 'public/css/frontend1.css')
    .styles([
       'resources/assets/css/backend/light.css',
       ], 'public/css/backend1.css')
 .sass('resources/sass/frontend/app.scss', 'css/frontend.css')
 .sass('resources/sass/backend/app.scss', 'css/backend.css')
 .js('resources/js/frontend/app.js', 'js/frontend.js')
 .js([
     'resources/js/backend/before.js',
     'resources/js/backend/app.js',
     'resources/js/backend/after.js'
 ], 'js/backend.js')
 .js([
     'resources/js/frontend/vendor/jquery-3.5.1.min.js',
     'resources/js/frontend/vendor/waypoints.min.js',
     'resources/js/frontend/bootstrap.bundle.min.js',
     'resources/js/frontend/jquery.meanmenu.js',
     'resources/js/frontend/swiper-bundle.min.js',
     'resources/js/frontend/owl.carousel.min.js',
     'resources/js/frontend/jquery.fancybox.min.js',
     'resources/js/frontend/isotope.pkgd.min.js',
     'resources/js/frontend/parallax.min.js',
     'resources/js/frontend/backToTop.js',
     'resources/js/frontend/jquery.counterup.min.js',
     'resources/js/frontend/ajax-form.js',
     'resources/js/frontend/wow.min.js',
     'resources/js/frontend/imagesloaded.pkgd.min.js',
     'resources/js/frontend/main.js'
 ], 'js/frontend1.js')
 /* .scripts([
     "public/js/backend/admin.js"
 ], 'public/js/backend-custom.js')    */
 // .copyDirectory('node_modules/tinymce/plugins', 'public/js/plugins')
 // .copyDirectory('node_modules/tinymce/skins', 'public/js/skins')
 // .copyDirectory('node_modules/tinymce/themes', 'public/js/themes')
 // .copyDirectory('node_modules/tinymce/icons', 'public/js/icons')
 .extract([
     // Extract packages from node_modules to vendor.js
     'jquery',
     'bootstrap',
     'popper.js',
     'axios',
     'sweetalert2',
     'lodash',
     'datatables.net',
     'datatables.net-bs4',
     'moment',
     'moment-timezone',
     'eonasdan-bootstrap-datetimepicker-bootstrap4beta',
     'select2',
     // 'tinymce'
 ])
 .sourceMaps();

if (mix.inProduction()) {
 mix.version()
     .options({
         // Optimize JS minification process
         terser: {
             cache: true,
             parallel: true,
             sourceMap: true
         }
     });
} else {
 // Uses inline source-maps on development
 mix.webpackConfig({
     devtool: 'inline-source-map'
 });
}