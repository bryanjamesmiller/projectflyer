var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    // First app.scss gets compiled into app.css and remains separate from the css files in the .styles() method
    // Then app.css gets saved in public/css/app.css while the other css files get combined into public/css/libs.css
    mix.sass('app.scss')
        .scripts([
            'libs/sweetalert-dev.js',
            'libs/lity.js'
        ], './public/js/libs.js')
        .styles([
            'libs/sweetalert.css',
            'libs/lity.css'
        ], './public/css/libs.css');
});
