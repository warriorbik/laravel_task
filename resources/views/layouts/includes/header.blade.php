<?php
    $alts = array(
            "home" => "Go back to the home page",
            "cart-header" => "Checkout",
            "navigationModal" => "Bring up the options menu",
            "login" => "Log in with your email address and password",
            "signup" => "Create a new account",
            "checkout" => "Check out"
    );
?>
<nav class="navbar navbar-fixed-top navbar-dark bg-success header-nav" style="">
    <div class="container" style="margin-top:0px !important;">
        <ul class="nav navbar-nav pull-left " style="">
            <li class="nav-item hidden-sm-down ">
                <a class="" href="{{ url('/') }}">
                    <img class="pull-left" src="{{ asset('assets/images/logo.png') }}" alt="" style="height: 39px;margin-top:5px;"/>
                </a>
            </li>

            <li class="nav-item m-l-0 pading-left-mobile">
                <a style="padding-bottom:0 !important;padding-top:4px !important;" class="hidden-md-up pull-left  nav-link" href="{{ url('/') }}" title="{{ $alts["home"] }}">
                    <img class="pull-left" src="{{ asset('assets/images/icon.png') }}" alt="" style="height: 39px;"/>
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav pull-right " style="">
            <li class="nav-item ">
                    <div class="btn-group">
                        <a style="border-radius:0; padding-left:1rem;padding-right:1rem;" class="btn btn-lg btn-success" href="{{ url('/') }}">Add Client</a>
                        <a style="border-radius:0; padding-left:1rem;padding-right:1rem;" class="btn btn-lg btn-success " href="{{ url('/listClients') }}" >List Clients</a>

                    </div>

              
            </li>

        </ul>
    </div>
</nav>
