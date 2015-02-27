var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

var paths = {
    'bootstrap': './vendor/twbs/bootstrap-sass/assets/stylesheets/',
    'fa': './node_modules/font-awesome/scss/'
}

elixir(function(mix) {

	// Stylesheets

    mix.sass('app.sass', 'public/css/', {includePaths: [paths.bootstrap, paths.fa]});

	// Scripts

	mix.scripts(['../../node_modules/jquery/dist/jquery.min.js', '../../vendor/twbs/bootstrap-sass/assets/javascripts/bootstrap.min.js']);

	// Tests

    mix.phpUnit();

    mix.phpSpec();

    mix.version(['public/css/app.css', 'public/js/all.js']);
    
});