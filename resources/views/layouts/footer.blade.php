<footer id="footer" class="container-fluid">
  <div class="row" style="background: none; background-color: #477e9f; padding: 25px">
    <div class="col-md-8" style="text-align: center; color: #fff; font-size: 1.2em">
      <p><em>The word of the Lord sounded forth...</em><br/>1 Thessalonians 1:8</p>
    </div>
    <div class="col-md-4" style="text-align: center">
      <a href="{{ route('give') }}" title="Give" class="btn btn-default" role="button"
             style="background-color: #8ac9ee; color: 000; border: none; width: 200px; padding: 15px">Give</a>
    </div>
  </div>

  <div class="row" style="  background: #262626; color: #777; padding: 40px; line-height: 2em">
    <div class="col-md-3">
      <h4 style="color: #FFF;" class="tk-seravek-web">Compass Bible Church</h4>
      <p>Compass Bible Church exists to make disciples of Christ by <strong>reaching</strong> as many people
              as possible for Christ, <strong>teaching</strong> them to be like Christ, and
              <strong>training</strong> them to serve Christ.</p>
      <p><!-- // @todo: our mission statement --></p>
    </div>
    <div class="col-md-3"><!-- // @todo: bootstrap nav component -->
      <h4 style="color: #FFF;" class="tk-seravek-web">Sitemap</h4>
      <ul class="list-unstyled">
        <li><a href="{{ route('distinctives') }}">8 Distinctives</a></li>
        <li><a href="{{ route('give') }}">Giving</a></li>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('evangelism') }}">Ice Cream Evangelism</a></li>
        <li><a href="{{ route('kids') }}">Kids Ministry</a></li>
        <li><a href="{{ route('believe') }}">What We Believe</a></li>
        <li><a href="{{ route('who-we-are') }}">Who We Are</a></li>
      </ul>
    </div>
    <div class="col-md-3">
      <h4 style="color: #FFF;" class="tk-seravek-web">Follows Us</h4>
      <ul class="list-inline">
        <li><a href="https://www.facebook.com/compasshb" title="Facebook"><span class="fa fa-facebook"></span></a></li>
        <li><a href="http://instagram.com/compasshb" title="Instagram"><span class="fa fa-instagram"></span></a></li>
        <li><a href="https://twitter.com/compasshb" title="Twitter"><span class="fa fa-twitter"></span></a></li>
        <li><a href="http://vimeo.com/compasshb" title="Vimeo"><span class="fa fa-vimeo-square"></span></a></li>
      </ul>
    </div>
    <div class="col-md-3">
      <h4 style="color: #FFF;" class="tk-seravek-web">Contact Us</h4>
      <p>Compass Bible Church<br/>
      <i class="glyphicon glyphicon-globe"></i> 5082 Argosy, Huntington Beach, CA 92649<br/>
      <i class="glyphicon glyphicon-phone"></i> (714) 895-0034<br/><br/>
      <i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@compasshb.com">info@compasshb.com</a></p>
    </div>
  </div>
  <div class="row" style="padding: 15px; 
                          background-image: url('/images/lineofmanycolors.png'); 
                          background-repeat: repeat-x; 
                          background-size: 850px; 
                          background-color: #222;
                          background-position: center bottom; 
                          min-height: 50px; color: #999; 
                          font-size: 0.923em; ">
    <span>© 2014-{{ date('Y') }} Compass Bible Church Huntington Beach. All Rights Reserved.</span>
    <span style="float: right"><a href="mailto:info@compasshb.com" style="color: #989898">Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                  href="http://github.com/compasshb">Design</a></span>
  </div>
</footer><!-- #footer -->

<!-- Scripts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-53384235-1', 'auto');
    ga('send', 'pageview');

</script>

</body>
</html>    