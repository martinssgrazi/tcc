const mix = require('laravel-mix');
const webpack = require('webpack');

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

mix.webpackConfig({
   resolve: {
      alias: { jquery: path.resolve(__dirname, 'node_modules/jquery/dist/jquery.js') }
   },
   plugins: [
      // ProvidePlugin helps to recognize $ and jQuery words in code
      // And replace it with require('jquery')
      new webpack.ProvidePlugin({
         $: 'jquery',
         jQuery: 'jquery'
      })
   ]
});

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.copyDirectory('resources/assets/img', 'public/img');
