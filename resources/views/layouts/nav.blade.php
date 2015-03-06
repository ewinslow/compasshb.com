<header class="container-fluid">
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