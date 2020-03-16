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
   .postCss('resources/css/app.css', 'public/css', [
      require('tailwindcss'),
      ...process.env.NODE_ENV === 'production' ? [
        require('@fullhuman/postcss-purgecss')({
            content: [
              './resources/views/*.blade.php',
              './resources/views/*/*.blade.php',
              './resources/views/*/*/*.blade.php',
            ],
            defaultExtractor: content => content.match(/[\w-/:]+(?<!:)/g) || []
        })
      ] : [],
      require('cssnano')
    ]);

if (mix.inProduction()) {
  mix.version();
}