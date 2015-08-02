var elixir = require('laravel-elixir');

elixir(function(mix) {

	// Stylesheets
    mix.less(
        'app.less',
        'public/css/',
        {
            paths: [
                './bower_components/bootstrap/less/',
                './bower_components/medium-editor/dist/css/',
            ]
        }
    );

	// Scripts
	mix.babel([
        '../../../bower_components/jquery/dist/jquery.min.js',
        '../../../bower_components/lazysizes/lazysizes.min.js',
        '../../../bower_components/bootstrap/dist/js/bootstrap.min.js',
        'compasshb-search.js',
//        '../../../bower_components/player-api/javascript/froogaloop.min.js',
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

    mix.copy(
        'bower_components/bootstrap/fonts/',
        'public/build/fonts/'
    )
});