<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="http://www.compasshb.com/app/uploads/2014/10/CBC-HB-logo-small.png" alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
      </a>
    </div>
    <div id="navbar" class="navbar-collapse collapse">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="/">{{ date('l, F d') }}</a></li>
        <li><a href="#" data-toggle="popover" data-placement="bottom" title="Compass_HB_Today" data-content="is a collection of pages for daily spiritual growth. Click the home link on the bottom left to return to the main site. Send feedback to info@compasshb.com"><span class="glyphicon glyphicon-question-sign"></span></a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>