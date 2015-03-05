<header class="container-fluid">
    <div class="row" style="background-color: #477e9f; color: #fff; text-align: right; height: 25px; ">
        <div class="col-sm-10 col-sm-offset-1">
            <a href="http://twitter.com/compasshb/" title="Twitter"><span class="fa fa-twitter" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
            <a href="http://facebook.com/compasshb/" title="Facebook"><span class="fa fa-facebook" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
            <a href="http://instagram.com/compasshb/" title="Instragram"><span class="fa fa-instagram" style="color: #fff; padding: 5px 5px; font-size: 1.25em;"></span></a>
        </div>
    </div>
    <div class="row">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home') }}">
                        <img src="http://www.compasshb.com/app/uploads/2014/10/CBC-HB-logo-small.png"
                             alt="Compass Bible Church" style="height: 40px; margin-top: -10px"/>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="{{ route('who-we-are') }}">Who We Are</a></li>
                        <li><a href="{{ route('kids') }}">Kids Ministry</a></li>
                        <li><a href="{{ route('youth') }}">Youth Ministry</a></li>
                        <li><a href="{{ route('distinctives') }}">8 Distinctives</a></li>
                        <li><a href="{{ route('believe') }}">What We Believe</a></li>
                        <li><a href="{{ route('evangelism') }}">Ice Cream Evangelism</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>