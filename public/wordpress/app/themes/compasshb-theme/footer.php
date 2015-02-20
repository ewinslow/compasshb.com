<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package CompassHB
 */
?>
</div><!-- #container-fluid -->

    <footer id="footer" class="container-fluid">
        <div class="row" style="background: none; background-color: #477e9f; padding: 25px">
            <div class="col-md-8" style="text-align: center; color: #fff; font-size: 1.2em">
                <p><em>The word of the Lord sounded forth...</em><br/>1 Thessalonians 1:8</p>
            </div>
            <div class="col-md-4" style="text-align: center">
                <a href="/give" title="Give" class="btn btn-default" role="button"
                   style="background-color: #8ac9ee; color: 000; border: none; width: 200px; padding: 15px">Give</a>
            </div>
        </div>

        <div class="row" style="  background: #262626; color: #777; padding: 40px; line-height: 2em">
            <div class="col-md-3">
                <h5 style="color: #FFF;">Compass Bible Church</h5>
                <p>Compass Bible Church exists to make disciples of Christ by <strong>reaching</strong> as many people
                    as possible for Christ, <strong>teaching</strong> them to be like Christ, and
                    <strong>training</strong> them to serve Christ.</p>
            </div>
            <div class="col-md-3"><?php // @todo: bootstrap nav component ?>
                <h5 style="color: #FFF;">Sitemap</h5>
                <ul class="list-unstyled">
                    <li><a href="/8-distinctives/">8 Distinctives</a></li>
                    <li><a href="/give/">Giving</a></li>
                    <li><a href="/">Home</a></li>
                    <li><a href="/ice-cream-evangelism/">Ice Cream Evangelism</a></li>
                        <li><a href="/kids-ministry/">Kids Ministry</a></li>
                        <li><a href="/believe/">What We Believe</a></li>
                        <li><a href="/who-we-are/">Who We Are</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 style="color: #FFF;">Follows Us</h5>
                    <ul class="list-inline">
                        <li><a href="https://www.facebook.com/compasshb" title="Facebook"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="http://instagram.com/compasshb" title="Instagram"><span class="fa fa-instagram"></span></a></li>
                        <li><a href="https://twitter.com/compasshb" title="Twitter"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="http://vimeo.com/compasshb" title="Vimeo"><span class="fa fa-vimeo-square"></span></a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 style="color: #FFF;">Contact Us</h5>
                    <p>Compass Bible Church<br/>
                        <i class="glyphicon glyphicon-globe"></i> 5082 Argosy, Huntington Beach, CA 92649<br/>
                        <i class="glyphicon glyphicon-phone"></i> (714) 895-0034<br/><br/>
                        <i class="glyphicon glyphicon-envelope"></i> <a href="mailto:info@compasshb.com">info@compasshb.com</a></p>
                </div>
            </div>
        </div>

        <div class="row" style="padding: 15px; background-image: url('/app/themes/compasshb-theme/images/bar_multicolors.png'); background-repeat: repeat-x; background-size: 850px; background-position: center bottom; min-height: 50px; background: #222; color: #999; font-size: 0.923em; background-repeat: repeat-x; background-size: 850px; background-position: center bottom;">
                <span>© 2014-<?= date("Y"); ?> Compass Bible Church Huntington Beach. All Rights Reserved.</span>
                <span style="float: right"><a href="mailto:info@compasshb.com" style="color: #989898">Feedback</a>&nbsp;&nbsp;&nbsp;&nbsp;<a
                        href="http://github.com/compasshb"><img src="/app/themes/compasshb-theme/images/GitHub-Mark-Light-32px.png" width="16" title="Source Code on GitHub" alt="Source Code on GitHub"/></a></span>
        </div>
    </footer><!-- #footer -->

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<?php wp_footer(); ?>
</body>
</html>
