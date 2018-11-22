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

mix.sass('resources/sass/app.scss', 'public/css');
mix.styles([
    'public/css/bootstrap.min.css',
    'public/css/default-css.css',
    'public/css/font-awesome.min.css',
    'public/css/metisMenu.css',
    'public/css/owl.carousel.min.css',
    'public/css/responsive.css',
    'public/css/slicknav.min.css',
    'public/css/styles.css',
    'public/css/themify-icons.css',
    'public/css/typography.css'
], 'public/css/all.css')
mix.js([
    'public/js/app.js',
    'public/js/bar-chart.js',
    'public/js/bootstrap.min.js',
    'public/js/jquery.slicknav.min.js',
    'public/js/jquery.slimscroll.min.js',
    'public/js/line-chart.js',
    'public/js/maps.js',
    'public/js/metisMenu.min.js',
    'public/js/owl.carousel.min.js',
    'public/js/pie-chart.js',
    'public/js/plugins.js',
    'public/js/popper.min.js',
    'public/js/scripts.js',
    'public/js/vendor/jquery-2.2.4.min.js',
    'public/js/vendor/modernizr-2.8.3.min.js'
], 'public/js/all.js')
