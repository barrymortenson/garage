const { mix } = require('laravel-mix');

mix.copy('node_modules/font-awesome/fonts', 'public/fonts')
    .js('resources/assets/js/app.js', 'public/js')
    .extract(['jquery', 'bootstrap-sass', 'vue', 'lodash', 'axios'])
    .sass('resources/assets/sass/app.scss', 'public/css')
    .version();
