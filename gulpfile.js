var elixir = require('laravel-elixir');

elixir(function(mix) {

	// Stylesheets
    mix.sass(
        'app.sass',
        'public/css/',
        {
            includePaths: [
                './bower_components/bootstrap-sass-official/assets/stylesheets/',
                './bower_components/font-awesome/scss/',
                './bower_components/medium-editor/src/sass/',
                './bower_components/owl-carousel2/src/scss/',
            ]
        }
    );

	// Scripts
	mix.scripts([
        '../../bower_components/jquery/dist/jquery.js',
        '../../bower_components/owl-carousel2/dist/owl.carousel.js',
        '../../bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.js',
        '../../bower_components/medium-editor/dist/js/medium-editor.min.js',
        '../../resources/assets/js/compasshb-editor.js',
        '../../resources/assets/js/compasshb-serviceworker.js',
    ]);

	// Tests

    mix.phpUnit();

    mix.phpSpec();

    mix.version(['public/css/app.css', 'public/js/all.js']);

});