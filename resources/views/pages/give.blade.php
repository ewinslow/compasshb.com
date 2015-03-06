@extends('layouts.master')

@section('content')
        <style>
            .glyphicon {
                font-size: 3em;
            }
        </style>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1">
                <h1 class="tk-seravek-web">Give to Compass HB</h1>
            </div>

                <div class="col-md-4 col-md-offset-1 well">
                    <span class="glyphicon glyphicon-retweet"></span>
                    <h4 class="tk-seravek-web">Recurring Giving</h4>

                    <p>Access our online system below to schedule a recurring gift or to make a one-time gift using your
                        checking account or credit card.</p>

                    <span class="glyphicon glyphicon-gift"></span>
                    <h4 class="tk-seravek-web">One Time Gift</h4>

                    <p>You can make a one-time gift using a credit card without registering in the system.</p>

                    <span class="glyphicon glyphicon-edit"></span>
                    <h4 class="tk-seravek-web">Other Ways to Support</h4>

                    <p>For more information on other creative tax-wise charitable gift and estate planning strategies,
                        please contact <a href="mailto:info@compasshb.com">info@compasshb.com</a>.</p>
                </div>
                <div class="col-md-4 col-md-offset-1 well">
                    <p>In addition to cash gifts, there are a number of other ways to support the ministry of Compass
                        HB and leave an eternal legacy with the assets God has entrusted to you. They include some of
                        the following assets and gifting plans:</p>
                    <ul>
                        <li>- Appreciated Securities (publicly traded stock, closely-held stock, mutual funds, bonds)
                        </li>
                        <li>- Real Estate (residential, commercial, income property, leasehold, vacation home, life
                            estate, remainder interest)
                        </li>
                        <li>- Life Insurance Policy (paid-up or non-paid up policies)</li>
                        <li>- Personal Property (artwork, collectables, gemstones)</li>
                        <li>- Intellectual Property (patents, royalties, copyrights)</li>
                        <li>- Bequests (remember CBC in your will or living revocable trust)</li>
                        <li>- Beneficiary Designations (name CBC as a testamentary of your IRA, 401k, 403b, or qualified
                            retirement plan)
                        </li>
                    </ul>
                </div>
            </div>

            <div class="row" style="margin: 50px 0">
                <div class="col-md-3 col-md-offset-1 well">
                    <a href="https://compassbiblechurch.ccbchurch.com" title="Login Here">
                        <span class="glyphicon glyphicon-home"></span>
                        <h2 class="tk-seravek-web">Login Here</h2>
                        <p>Compass HB Online Giving</p>
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-1 well">
                    <a href="https://compassbiblechurch.ccbchurch.com/w_sign_up.php" title="Register Here">
                        <span class="glyphicon glyphicon-user"></span>
                        <h2 class="tk-seravek-web">Register Here</h2>
                        <p>First-time Users &#8211; Select &#8220;Compass HB&#8221;</p>
                    </a>
                </div>
                <div class="col-md-3 col-md-offset-1 well">
                    <a href="https://compassbiblechurch.ccbchurch.com/trx_submit.php?type=public_gift&#038;campus_id=3"
                       title="One-time Gift">
                        <span class="glyphicon glyphicon-gift"></span>
                        <h2 class="tk-seravek-web">One-Time Gift</h2>
                        <p>Give Now Without Registering</p>
                    </a>
                </div>
            </div>
        </div>
@stop

@section('sidebar')
@stop
