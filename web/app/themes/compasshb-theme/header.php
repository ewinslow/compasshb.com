<?php
/**
 * The theme header.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package CompassHB
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
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
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <link rel="shortcut icon" href="/app/themes/compasshb-theme/images/favicon.ico">
    <link rel="apple-touch-icon" href="/app/themes/compasshb-theme/images/apple-touch-icon.jpg">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="//use.typekit.net/gdu1kdg.js"></script>
    <script>try{Typekit.load();}catch(e){}</script>
    <?php wp_head();
    do_action('compass_video_og'); ?>
</head>

<body <?php body_class(); ?>>

<header class="container-fluid">
    <div class="row" style="background-color: #477e9f; color: #fff; text-align: right; height: 25px; ">
        <a href="http://twitter.com/compasshb/" title="Twitter"><span class="fa fa-twitter" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
        <a href="http://facebook.com/compasshb/" title="Facebook"><span class="fa fa-facebook" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
        <a href="http://instagram.com/compasshb/" title="Instragram"><span class="fa fa-instagram" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
    </div>
    <div class="row">
        <nav class="navbar navbar-default navbar-static-top" style="background-color: #fff; margin: 0; padding: 5px;">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">
                        <img src="http://www.compasshb.com/app/uploads/2014/10/CBC-HB-logo-small.png"
                             alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="/who-we-are/">Who We Are</a></li>
                        <li><a href="/kids-ministry/">Kids Ministry</a></li>
                        <li><a href="/youth/">Youth Ministry</a></li>
                        <li><a href="/eight-distinctives/">8 Distinctives</a></li>
                        <li><a href="/what-we-believe/">What We Believe</a></li>
                        <li><a href="/ice-cream-evangelism/">Ice Cream Evangelism</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>

<div class="container-fluid">
