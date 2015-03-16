var elixir = require('laravel-elixir');

var paths = {
    'bootstrap': './bower_components/bootstrap-sass-official/assets/stylesheets/',
    'owl': './bower_components/owl-carousel2/src/scss/',
    'fa': './bower_components/font-awesome/scss/'
}

elixir(function(mix) {

	// Stylesheets

    mix.sass(
        'app.sass',
        'public/css/',
        {
            includePaths: [
                paths.bootstrap,
                paths.fa,
                paths.owl
            ]
        }
    );

	// Scripts

	mix.scripts([
        '../../bower_components/jquery/dist/jquery.js',
        '../../bower_components/owl-carousel2/dist/owl.carousel.js',
        '../../bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js'
    ]);

	// Tests

    mix.phpUnit();

    mix.phpSpec();

    mix.version(['public/css/app.css', 'public/js/all.js']);

});