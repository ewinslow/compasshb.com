var elixir = require('laravel-elixir');

elixir(function(mix) {

	// Stylesheets
    mix.sass(
        'app.scss',
        'public/css/',
        {
            includePaths: [
                './bower_components/bootstrap-sass-official/assets/stylesheets/',
                './bower_components/font-awesome/scss/',
                './bower_components/medium-editor/src/sass/',
            ]
        }
    );

	// Scripts
	mix.babel([
        '../../../bower_components/jquery/dist/jquery.min.js',
        '../../../bower_components/bootstrap-sass-official/assets/javascripts/bootstrap.min.js',
    //    '../../../bower_components/medium-editor/dist/js/medium-editor.js',
    //    'compasshb-editor.js',
    //    'compasshb-serviceworker.js',
    ]);

	// Tests

//    mix.phpUnit();

    mix.phpSpec();

    mix.version(['public/css/app.css', 'public/js/all.js']);

    mix.copy(
        'bower_components/jquery/dist/jquery.min.map',
        'public/build/js/jquery.min.map'
    )
});