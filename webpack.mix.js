const mix = require('laravel-mix');
const path = require('path');
const PrerenderSPAPlugin = require('prerender-spa-plugin');
const HtmlWebpackPlugin = require('html-webpack-plugin');
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
    .sass('resources/sass/app.scss', 'public/css');
    // .webpackConfig({
    //     plugins: [
    //         new HtmlWebpackPlugin({
    //             template: Mix.Paths.root('resources/views/index.blade.php'),
    //             inject: false
    //         }),
    //         new PrerenderSPAPlugin({
    //             // Required - The path to the webpack-outputted app to prerender.
    //             staticDir: Mix.output().path,
    //             // Required - Routes to render.
    //             routes: ['/', '/about', '/contact', '/portfolio', '/skills'],
    //         })
    //     ]
    // });
mix.version();
