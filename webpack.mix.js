const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js(['resources/js/app.js', 'resources/js/semantic.min.js'], 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        //
    ]).autoload({
        jquery: ['$', 'window.jQuery', 'jQuery'],
    });

mix.js('resources/js/contracts.js', 'public/js');
mix.js(['resources/js/templates.js'],
        'public/js');

mix.js(['resources/js/contract_templates/create_template.js'], 'public/js');
