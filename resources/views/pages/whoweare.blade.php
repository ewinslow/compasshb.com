@extends('layouts.master')

@section('content')
</div>

<style>
    .col-md-4 img {
        border: 6px solid #FFF;
    }
</style>

<div class="container-fluid">
    <div class="row" style="background-color: #eaeaea; padding-top: 40px;">
        <div class="col-xs-10 col-xs-offset-1">
            <h2 class="tk-seravek-web">Welcome to Compass Bible Church Huntington Beach</h2>
            <p>On August 2nd, 2014 we were commissioned by <a title="Compass Bible Church Aliso Viejo"
                                                                          href="http://www.compasschurch.org"
                                                                          target="_blank">Compass Bible Church in Aliso
                                Viejo</a>. Pastor Bobby, his wife Christa and their three children (Tyler, Emma and
                            Jack) were sent out to plant another Compass here in Huntington Beach. Twelve families moved
                            up with them, but there are also Compass family members who already lived here in north
                            Orange County.</p>
            <img src="{{ URL::to('/') }}/images/blakey-fam-hb-01.jpg" alt="Blakey Family" />
            <p>&nbsp;</p>
        </div>
    </div>

    <div class="row" style="background-color: #88d5ee; padding-top: 40px; padding-bottom: 40px;">
        <div class="col-xs-10 col-xs-offset-1">
            <div class="col-md-4">
                <img src="{{ URL::to('/') }}/images/BobbyBlakey.png"
                                     alt="Bobby Blakey" width="432" height="426"/>
                <h4 class="tk-seravek-web">Pastor Bobby Blakey</h4>
                <p style="text-align: left;">Pastor Bobby grew up as a pastor’s son, graduated from <a
                                        title="The Master's College" href="http://www.masters.edu" target="_blank">The
                                        Master’s College</a> and has been preaching weekly for over a decade. He is
                                    currently working on his graduate degree through <a
                                        title="Southern Baptist Theological Seminary" href="http://www.sbts.edu"
                                        target="_blank">Southern Baptist Theological Seminary</a>.</p>
                <p style="text-align: left;">As we gather together every <span class="aBn" tabindex="0"
                                                                                               data-term="goog_875465023"><span
                                            class="aQJ">Sunday</span></span> morning to hear from God’s word, Pastor
                                    Bobby will preach through the book of <a href="{{ URL::to('/') }}/sermon/">1st
                                        Thessalonians</a>, which is about the beginning of a church where "the word of
                                    the Lord sounded forth.""</p>
                <ul style="color: #ffffff;">
                    <li><a style="color: #ffffff;" title="E-Mail" href="mailto:bobby@compasshb.com"
                                           target="_blank">E-Mail </a></li>
                    <li><a style="color: #ffffff;" title="@BobbyBlakey"
                                           href="https://www.twitter.com/BobbyBlakey" target="_blank">@BobbyBlakey </a>
                    </li>
                    <li><a style="color: #ffffff;" title="Evangelism Everyday Blog"
                                           href="http://www.evangelismeveryday.com" target="_blank">Evangelism Everyday
                                            Blog </a></li>
                    <li><a style="color: #ffffff;" title="Pastor Bobby on Facebook"
                                           href="https://www.facebook.com/BobbyBlakey" target="_blank">Pastor Bobby on
                                            Facebook </a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <img src="{{ URL::to('/') }}/images/RyanPeirceCBCHBWorshipBand.png"
                                     alt="Ryan Pierce" width="432" height="426"/>
                <h4 class="tk-seravek-web">Worship Director Ryan Pierce</h4>
                <p style="text-align: left;">Our Worship Director, Ryan Pierce, and his team will lead
                                    us in singing praise to Jesus. Our goal is to lift the name of Jesus higher so that
                                    he will get the glory.  Ryan has been leading worship and serving alongside Pastor
                                    Bobby for years.</p>
                <p style="text-align: left;">"Oh, magnify the LORD with me, and let us exalt his name
                                    together!" Psalm 34:3</p>
                <ul style="color: #ffffff;">
                    <li><a style="color: #ffffff;" title="E-Mail" href="mailto:ryan@compasshb.com"
                                           target="_blank">E-Mail </a></li>
                    <li><a style="color: #ffffff;" title="@Ryan_Pierce94"
                                           href="https://twitter.com/ryan_pierce94" target="_blank">@Ryan_Pierce94 </a>
                    </li>
                    <li><a style="color: #ffffff;" title="Ryan on Facebook"
                                           href="https://www.facebook.com/ryan.pierce620" target="_blank">Ryan on
                                            Facebook </a></li>
                    <li><a style="color: #ffffff;" title="Send Out Your Light Blog"
                                           href="http://www.sendoutyourlight.com/category/ryans-posts/" target="_blank">Send
                                            Out Your Light Blog </a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <img src="{{ URL::to('/') }}/images/CBCHBWorshipBand.png"
                                     alt="Compass HB Worship Band" width="432" height="426"/>
                <h4 class="tk-seravek-web">The Gospel Rings Out!</h4>
                <p style="text-align: left;">Our goal is for the word of the Lord to sound forth here in
                                    Huntington Beach so many will put their faith in the gospel of Jesus Christ.  This
                                    was the theme of our first sermon which you can watch here: <a
                                        href="/sermon/gospel-rings/">#1 – And the Gospel Rings Out</a>.</p>
                <p style="text-align: left;">At Compass Bible Church, we believe a good sermon does not
                                    come from our own opinions, but is God preaching his message through us.</p>
                <ul style="color: #ffffff;">
                    <li><a style="color: #ffffff;" title="E-Mail" href="mailto:bobby@compasshb.com"
                                           target="_blank">E-Mail </a></li>
                    <li><a style="color: #ffffff;" title="@BobbyBlakey"
                                           href="https://www.twitter.com/BobbyBlakey" target="_blank">@BobbyBlakey </a></li>
                    <li><a style="color: #ffffff;" title="Evangelism Everyday Blog"
                                           href="http://www.evangelismeveryday.com" target="_blank">Evangelism Everyday
                                            Blog </a></li>
                    <li><a style="color: #ffffff;" title="Pastor Bobby on Facebook"
                                           href="https://www.facebook.com/BobbyBlakey" target="_blank">Pastor Bobby on
                                            Facebook </a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row" style="background-color: #eaeaea; padding-top: 40px; padding-bottom: 20px;">
        <div class="col-xs-10 col-xs-offset-1">
            <h2 class="tk-seravek-web">Our History</h2>
            <div class="col-md-3">
                <img src="https://compasschurch.smugmug.com/Events/Compass-HB-Commissioning/i-xJkQMMS/0/S/CompassHB-20140803-135-S.jpg" alt="Commissioning Service" width="432" height="426"/>
                <h4 class="tk-seravek-web">Commissioning Service</h4>
                <p style="text-align: left;">On August 2 & 3, 2014 we were sent out by <a href="http://www.compasschurch.org/">Compass Bible Church Aliso Viejo</a>. Pastor Bobby, his wife Christa and their three children were sent out to plant another Compass here in Huntington Beach. Twelve families moved up with them, but there are also Compass family members who already lived here in north Orange County.</p>
            </div>
            <div class="col-md-3">
                <img src="{{ URL::to('/') }}/images/IceCreamEvangelism.png" alt="Ice Cream Evangelism" width="432" height="426"/>
                <h4 class="tk-seravek-web">Ice Cream Evangelism</h4>
                <p style="text-align: left;">On August 8th, 2014 we started handing out free ice cream in Huntington Beach and inviting people to our first services. We went out nearly everyday in August sharing the good news.</p>
            </div>
            <div class="col-md-3">
                <img src="https://compasshb.smugmug.com/PhotoArchive/Worship-Services/1st-Marina-High-School-Service/i-Vxj2mwm/0/S/PastorBobbyCBCHBwidesideview-S.jpg" alt="Our First Services" width="432" height="426"/>
                <h4 class="tk-seravek-web">Our First Service</h4>
                <p style="text-align: left;">On September 7th, 2014 we had our first Sunday at Marina High School!</p>
            </div>
            <div class="col-md-3">
                <img src="https://compasshb.smugmug.com/PhotoArchive/Worship-Services/1st-Service-New-Building-01111/i-KLP4pcT/2/S/150111_Wor_SS-093-S.jpg" alt="Our New Building" width="432" height="426"/>
                <h4 class="tk-seravek-web">Our New Building</h4>
                <p style="text-align: left;">On January 11th, 2014 we had our first service in our new building here at 5082 Argosy Avenue! God has been so good to us, brought many people to our church and has faithfully saved sinners! On April 5, 2015 we launched two services at 9am and 11am.</p>
            </div>
        </div>
    </div>

</div>

<div class="container-fluid">
@stop
