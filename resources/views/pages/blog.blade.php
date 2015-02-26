@extends('layouts.master')

@section('content')
</div>

        <article class="container-fluid" style="margin-bottom: 30px">

            <section class="row" style="background-image:  linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(/app/themes/compasshb-theme/images/header-blog.jpg); background-size: cover; background-position: center">
                <div class="col-xs-11 col-xs-offset-1" style="padding-top: 60px;" >
                    <h1 class="tk-seravek-web" style='color: #fff; padding: 10px 3px; text-transform: uppercase '>Title</h1>
                    <p class="lead" style="color: #fff; margin-top: -20px">Blog</p>
                </div>
            </section>

            <section class="row">
                <div class="col-md-7 col-md-offset-1" style="background-color: #fff; border: 1px solid #E4E4E4; padding: 20px; margin-top: 20px">
                    <p style='text-transform: uppercase; font-size: .9rem;'>
                        <span style="padding-right: 20px;">date</span>
                    </p>
Content
                        <div style="max-width: 600px; margin: 0 auto;">
                            <br/><br/><input type="submit" style="width: 100%; padding: 10px;"
                                        value="View Comments"
                                        onclick='jQuery( "#disqus_thread" ).show();'/><br/><br/>
                        </div>
                        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

                        <br/><br/>
                        <p style="color: #888;"><em>Scripture taken from The Holy Bible, English Standard Version.
                                Copyright &copy;2001
                                by <a href="http://www.crosswaybibles.org" target="_blank">Crossway Bibles</a>, a
                                publishing
                                ministry of Good News Publishers. Used by permission. All rights reserved. Text provided
                                by the <a
                                    href="http://www.gnpcb.org/esv/share/services/" target="_blank">Crossway Bibles Web
                                    Service</a>.</em>
                        </p>
                    </div>
                    <aside class="col-md-2 col-md-offset-1" role="complementary" style="background-color: #fff; border: 1px solid #E4E4E4; margin-top: 20px; padding: 20px;">Side
                    </aside>
            </section>
        </article>

<div class="container-fluid">
@endsection

@section('sidebar')
Side
@endsection