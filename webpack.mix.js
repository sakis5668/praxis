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

mix.webpackConfig({
    resolve: {
        alias: {
            'jquery-ui': 'jquery-ui-dist/jquery-ui.js'
        }
    }
});

mix
    .js('resources/assets/js/app.js', 'public/js')

    .copy('node_modules/moment/min/moment.min.js', 'public/js')
    .copy('node_modules/fullcalendar/dist/fullcalendar.min.js', 'public/js')
    .copy('node_modules/fullcalendar/dist/locale-all.js', 'public/js')
    .copy('resources/assets/alertifyjs/alertify.min.js', 'public/js')

    .sass('resources/assets/sass/app.scss', 'public/css')

    .copy('node_modules/fullcalendar/dist/fullcalendar.min.css', 'public/css')
    .copy('node_modules/fullcalendar/dist/fullcalendar.print.min.css', 'public/css')
    .copy('resources/assets/alertifyjs/css/alertify.min.css', 'public/css')
    .copy('resources/assets/alertifyjs/css/themes/default.css', 'public/css/themes')
    .copy('resources/assets/alertifyjs/css/themes/bootstrap.css', 'public/css/themes')
    .copy('resources/assets/alertifyjs/css/themes/semantic.css', 'public/css/themes')
;
