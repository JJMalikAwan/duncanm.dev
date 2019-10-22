const mix = require('laravel-mix');
const tailwindcss = require('tailwindcss');
const postCssNested = require('postcss-nested');
require('laravel-mix-purgecss');

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

mix.js('resources/js/app.js', 'public/static/js')
    .postCss('resources/css/app.css', 'public/static/css', [
        tailwindcss(),
        postCssNested()
    ])
    .browserSync({
        proxy: 'http://duncanm.test'
    })
    .version();

if (mix.inProduction()) {
    mix.purgeCss();
}
