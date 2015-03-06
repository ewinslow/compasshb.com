<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('home') }}">
        <img src="http://www.compasshb.com/app/uploads/2014/10/CBC-HB-logo-small.png" alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
      </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">{{ date('l, F j') }}</a></li>
        <li><a href="#" onClick="javascript:alert('This dashboard is a collection of pages focused on spiritual growth. To return to the homepage, click the home link on the bottom left menu. Send feedback to info@compasshb.com');"><span class="glyphicon glyphicon-question-sign" style="font-size: 1.5em"></span></a></li>
      </ul>
    </div>
  </div>
</nav>