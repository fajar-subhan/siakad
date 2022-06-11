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

/**
 * CSS 
 */
mix.styles([
    'resources/assets/css/bundle/plugins.bundle.css',
    'resources/assets/css/bundle/style.bundle.css',
    'resources/assets/css/custom/auth/style.css',
    'resources/assets/library/fontawesome/css/all.min.css',
    'resources/assets/library/datatables/datatables.bundle.css',
],'public/css/app.css').version();

mix.scripts([
    'resources/assets/js/bundle/plugins.bundle.js',
    'resources/assets/js/bundle/scripts.bundle.js',
    'resources/assets/js/global/global.js',
    'resources/assets/library/datatables/datatables.bundle.js',
    'resources/assets/js/custom/dashboard/dashboard.js',
    'resources/assets/js/custom/auth/scripts.js'
],'public/js/app.js').version();

