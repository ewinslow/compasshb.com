@extends('layouts.master')

@section('content')
        <style>
            .col-md-4 img {
                border: 6px solid #FFF;
            }
            .col-md-4 {
            	color: #fff;
            }
        </style>
        	<div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <h1 class="tk-seravek-web">The United Student Ministry</h1>
                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 col-md-offset-1 well">
        			<p>The United exists to Make Disciples of Jesus Christ.</p>
        			<h3>Reaching teens with the Gospel</h3>
        			<p>Every Thursday Night we gather from 6:30-8:30 to hear preaching from the Bible. We teach God’s word in a way that is understandable and applicable for teenagers to live out in their everyday life.</p>
        			<p>Meets at church: 5082 Argosy Avenue, Huntington Beach, CA</p>
        		</div>
        		<div class="col-md-5">
        			<center>
        				<img src="/images/UNITED-LOGO.jpg" width="250"/><br/>&nbsp;
        			</center>
        		</div>
        	</div>

            <div class="row"
                 style="background:none; background-color: #a0a0a0; padding-top: 30px;padding-bottom: 30px;">
                <div class="container">


                    <div class="col-md-4 col-md-offset-1">
                        <h3>Teaching teens how to live like Jesus</h3>
                        <p>Every Thursday Night we have a time of small groups with trained leaders who are ready to disciple every student and teach them how to live out God’s word on a day to day basis.</p>
                        <p>We want to see more teenagers start living for Jesus Christ! If you know anyone who would be interested in checking us out, contact Shane- shane@compassHB.com, or join us on Thursday night here at the church!</p>

                    </div>

                    <div class="col-md-4 col-md-offset-2">
                        <img width="400" height="400" src="{{ URL::to('/') }}/images/nY-YQn04.jpeg"
                             alt="Shane Rouland"/>
                        <h4 class="tk-seravek-web">Student Ministry</h4>
                        <p><span>Shane Rouland is the Student Ministry Director. Shane has a desire to reach out onto the school campuses in Huntington Beach and will lead a midweek Bible study for middle school and high schoolers. He is pursuing a Bible degree from <a
                                    style="color: #ffffff;" href="http://www.masters.edu">The Master’s College</a> and previously worked with Pastor Bobby for two years as an intern. Shane was saved by Jesus in high school where he led a Bible club preached the gospel through campus lunches.</span>
                        </p>
                        <ul>
                            <li><a href="mailto:shane@compasshb.com" title="E-Mail" target="_self"
                                   style="color: #ffffff;">E-Mail</a></li>
                            <li><a href="https://twitter.com/ShaneRouland" title="@ShaneRouland" target="_blank"
                                   style="color: #ffffff;">@ShaneRouland on Twitter</a></li>
                            <li><a href="https://www.facebook.com/shane.rouland" title="Shane on Facebook"
                                   target="_blank" style="color: #ffffff;">Shane on Facebook</a></li>
                            <li><a href="http://www.sendoutyourlight.com/category/shanes-posts/"
                                   title="Send Out Your Light Blog" target="_blank" style="color: #ffffff;">Send Out
                                    Your Light Blog</a></li>
                        </ul>
                    </div>

                </div>
            </div>

        </div>
@stop

@section('sidebar')
@stop
