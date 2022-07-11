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

mix.js('resources/js/app.js', 'public/js').vue();
mix.sass('resources/css/app.scss', 'public/css');

mix.copy('resources/img', 'public/img');
mix.copy('resources/sfx', 'public/sfx');
mix.webpackConfig({
    module: {
        rules: [
            {
                test: /\.mp3$/,
                loader: 'file-loader'
            }
        ]
    }
})
