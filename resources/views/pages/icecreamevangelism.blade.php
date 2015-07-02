@extends('layouts.master')

@section('content')
<style>
    .glyphicon {
        font-size: 3em;
        text-align: center;
    }
</style>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        <br/><h1 class="tk-seravek-web">Ice Cream Evangelism</h1><br/>
    </div>
    <div class="col-md-4 col-xs-offset-1">
        <img width="800" height="434"
             src="{{ URL::to('/') }}/images/IceCreamEvangelism.png"
             alt="Ice Cream Evangelism"/>
    </div>
    <div class="col-md-5   col-xs-offset-1 well">
        <h2 class="tk-seravek-web">Free Ice Cream for HB</h2>
        <p>Maybe you have seen our ice cream truck driving around the streets of Huntington Beach.</p>
        <p>Maybe you were even given FREE ICE CREAM!</p>
        <p>Free ice cream for HB is <em>good news</em> and our goal is to give away as much free ice cream
            as we can afford while we tell everyone we can the <em>good news</em> of Jesus.</p>
        <h3 class="tk-seravek-web">Our passion at Compass HB is the gospel of Jesus</h3>
        <p>Because Jesus did something better than buy everyone ice cream.</p>
        <p>Jesus died for us on the cross.</p><br/>
    </div>
</div>

<div class="row" style="background-color: #fff"><br/>
    <div class="col-md-3 col-md-offset-1">
        <h3 class="tk-seravek-web">We believe Jesus is God </h3>
        <p>Jesus is fully 100% God, one with the Father, but he humbled himself to be born as a man. When we
            say the name Jesus Christ, we are not using Christ like his last name. Christ is his title. It
            means he is the Messiah. He is the holy and anointed one of God.</p>
    </div>
    <div class="col-md-4">
        <h3 class="tk-seravek-web">We believe Jesus died on the cross for our sins </h3>
        <p>The name Jesus means savior. He came down to earth on a rescue mission to seek and to save the
            lost. People like us. We have all fallen short of the glory of God. No one besides Jesus has
            lived perfectly up to God’s standard of holiness. Yet, Jesus paid for our sins when he died on
            the cross in our place.</p>
    </div>
    <div class="col-md-3">
        <h3 class="tk-seravek-web">Jesus rose from the dead and offers eternal life</h3>
        <p>Jesus did not stay dead. On the third day, he rose again. He appeared to his disciples. There
            were over 500 eye witnesses and some of them have written accounts in the New Testament for us
            to read and believe today. Because Jesus rose from the dead, everyone who believes in him has a
            new life. Not only can they live a new way now, but they know with 100% confidence they will be
            with Jesus when they die.</p>
    </div>
</div>

<div class="row"><br/>
    <div class="col-md-5 col-md-offset-1">
        <blockquote>
            <p style="text-align: left;">For I delivered to you as of first importance what I also
                received: that Christ died for our sins in accordance with the Scriptures, that he was
                buried, and that he was raised on the third day in accordance with the Scriptures</p>
            <p style="text-align: left;">- 1 Corinthians 15:3-4</p>
        </blockquote>
    </div>
    <div class="col-md-5">
        <blockquote>
            <p style="text-align: left;">I am the resurrection and the life. Whoever believes in me, though
                he die, yet shall he live, And everyone who lives and believes in me shall never die. Do you
                believe this?</p>
            <p style="text-align: left;">– Jesus in John 11:25-26</p>
        </blockquote>
    </div>
</div>
@stop
