const mix = require('laravel-mix')

let source = 'public/app/src/'
let build = 'public/app/build/'

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
    .js(source + 'api.js', build)
    .vue()
    .sass('resources/sass/app.scss', 'public/css');
