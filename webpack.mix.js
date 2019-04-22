let mix = require('laravel-mix');

require('laravel-mix-tailwind');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .extract(['axios', 'bootstrap', 'jquery', 'lodash', 'popper.js', 'vue', 'bulma'])
    .tailwind();

 if (!mix.inProduction()) {
    mix.sourceMaps(); // Though it comes with a compile/performance cost, this will provide extra debugging information to your browser's developer tools when using compiled assets.
} else {
    mix.version();
}
