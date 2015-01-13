<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

?>

<?php wpex_hook_header_before(); ?>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
#nav.affix {
    position: fixed;
    top: 0;
    width: 100%;
    z-index:10;
}
.navbar-default {
    background-color: #FFF;
    border-color: #E7E7E7;
	border-top: none;
}
</style>	  	  	

<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div id="nav" data-spy="affix" data-offset-top="30">
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
      	<img src="http://www.compasshb.com/wp-content/uploads/2014/10/CBC-HB-logo-small.png" alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
      </a>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/who-we-are/">Who We Are</a></li>
        <li><a href="/kids-ministry/">Kids/Youth Ministry</a></li>
        <li><a href="/8-distinctives/">8 Distinctives</a></li>
        <li><a href="/believe/">What We Believe</a></li>
        <li><a href="/ice-cream-evangelism/">Ice Cream Evangelism</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>  
</div>
</div>

<?php wpex_hook_header_after(); ?>