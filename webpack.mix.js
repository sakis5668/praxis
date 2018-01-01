let mix = require('laravel-mix');

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

/*
mix
    .js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');

*/


mix
    .js('resources/assets/js/app.js', 'public/js')

    .copy('node_modules/jquery/dist/jquery.min.js', 'public/js')
    .copy('node_modules/jquery-ui-dist/jquery-ui.min.js', 'public/js')
    .copy('node_modules/moment/min/moment.min.js', 'public/js')
    .copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js')
    .copy('node_modules/fullcalendar/dist/locale-all.js', 'public/js')

    .sass('resources/assets/sass/app.scss', 'public/css')

    .copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css')
    .copy('node_modules/fullcalendar/dist/fullcalendar.print.min.css', 'public/css')
;
