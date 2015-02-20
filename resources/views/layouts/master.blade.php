<!DOCTYPE html>
<html lang="en">
<head>
    <!--
            ________            ______                      __
           /_  __/ /_  ___     / ____/___  _________  ___  / /
            / / / __ \/ _ \   / / __/ __ \/ ___/ __ \/ _ \/ /
     _ _ _ / / / / / /  __/  / /_/ / /_/ (__  ) /_/ /  __/ /
    (_|_|_)_/ /_/ /_/\___/ _ \____/\____/____/ .___/\___/_/  __  __
                     / __ \(_)___  ____ _____/_/ / __ \__  __/ /_/ /
                   / /_/ / / __ \/ __ `/ ___/  / / / / / / / __/ /
                  / _, _/ / / / / /_/ (__  )  / /_/ / /_/ / /_/_/
                 /_/ |_/_/_/ /_/\__, /____/   \____/\__,_/\__(_)
                                 /____/
    1 Thessalonians 1:8 						github.com/compasshb
    -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CompassHB</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    <script src="//use.typekit.net/gdu1kdg.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <!-- do_action('compass_video_og'); -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>

@include('layouts.header')

<div class="container-fluid">

@yield('content')

</div><!-- #container-fluid -->

@include('layouts.footer')

</body>
</html>