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
   .vue() // Panggil method .vue() untuk memproses file Vue.js
   .sass('resources/sass/app.scss', 'public/css') // Tambahkan kompilasi app.scss

// Aktifkan versi file di mode produksi untuk cache busting
if (mix.inProduction()) {
   mix.version();
}
