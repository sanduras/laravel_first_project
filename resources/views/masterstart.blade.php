<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="key_words" content="@yield('key_words')">

    <!-- Mobile view -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/fav-icon.ico">

    <link rel="stylesheet" type="text/css" href="{{mix('/css/bootstraps/bootstrap.min.css')}}">

    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">

    <!-- Template's stylesheets -->
    <link rel="stylesheet" href="{{mix('/css/megamenu/stylesheets/screen.css')}}">
    <link rel="stylesheet" href="{{mix('/css/theme-default.css')}}" type="text/css">
    <link rel="stylesheet" href="{{mix('/css/loaders/stylesheets/screen.css')}}">
    <link rel="stylesheet" href="{{mix('/css/corporate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{mix('/css/fonts/font-awesome/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css')}}" media="screen" />
    <link rel="stylesheet" href="{{mix('/css/fonts/et-line-font/et-line-font.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/revolution-slider/css/settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{mix('/css/revolution-slider/css/layers.css')}}">

    <link rel="stylesheet" type="text/css" href="{{mix('/css/revolution-slider/css/navigation.css')}}">
    <link rel="stylesheet" href="{{mix('/css/parallax/main.css')}}">
    <link href="{{mix('/css/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
    <link href="{{mix('/css/owl-carousel/owl.theme.css')}}" rel="stylesheet">
    <link href="{{mix('/css/tabs/css/responsive-tabs.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{mix('/css/cubeportfolio/cubeportfolio.min.css')}}" rel="stylesheet">
    <!-- Template's stylesheets END -->
<!-- User profile start  -->
<style>

</style>
<!-- User profile start end  -->
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

    <!-- Style Customizer's stylesheets -->


    <!-- Style Customizer's stylesheets END -->

    <!-- Skin stylesheet -->

</head>

<body>

    </div>
    <div class="wrapper-boxed">
        <div class="site-wrapper">
            <div class="col-md-12 nopadding">
                <div class="header-section style1 noborder pin-style">
                    <div class="container">
                        <div class="mod-menu">
                            <div class="row">
                                <div class="col-sm-2"> <a href="{{ url('/',app()->getLocale()) }}" title="" class="logo style-2 mar-4"><img src="{{asset('template/images/logo/logo.png')}}" alt=""> </a> </div>
                                <div class="col-sm-10">
                                    <div class="main-nav">
                                        <ul class="nav navbar-nav top-nav">
                                            <li class="visible-xs menu-icon"> <a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i> </a> </li>
                                        </ul>
                                        <div id="menu" class="collapse">
                                            <ul class="nav navbar-nav">
                                                <li class="right"> <a href="{{ url('/',app()->getLocale()) }}">{{__('masteruser.home')}}</a> <span class="arrow"></span>
                                                </li>

                                                <li class="mega-menu"> <a href="{{ url(app()->getLocale(),'portfolio') }}">{{__('masteruser.portfolio')}}</a> <span class="arrow"></span>
                                                </li>
                                                <li class="right"> <a href="#">{{__('masteruser.acount')}}</a> <span class="arrow"></span>
                                                    @if (Route::has('login'))
                                                    <ul>
                                                        <li>
                                                            @auth
                                                            <a href="{{ url(app()->getLocale().'/dashboard') }}">{{__('masteruser.dashboard')}}<span class="sub-arrow dark pull-right"></span></a><span class="arrow"></span>

                                                            @else
                                                        <li> <a href="{{ route('login',app()->getLocale()) }}">{{__('masteruser.login')}}<span class="sub-arrow dark pull-right"></span></a><span class="arrow"></span>
                                                        </li>
                                                        @if (Route::has('register'))
                                                        <li> <a href="{{ route('register',app()->getLocale()) }}">{{__('masteruser.register')}}<span class="sub-arrow dark pull-right"></span></a><span class="arrow"></span>
                                                        </li>
                                                        @endif
                                                        @endauth
                                                    </ul>
                                                    @endif
                                                </li>
                                               
                                                <li class="right">
                                                    <a href="#">
                                                        @if(count(config('app.languages')) > 1)
                                                        {{ strtoupper(app()->getLocale()) }} </a><span class="arrow"></span>
                                                    <ul>
                                                        <li>
                                                            @foreach($languages as $language)
                                                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $language->title }}">{{ strtoupper ($language->title)}}-{{$language->details}}</a>
                                                            @endforeach
                                                        </li>
                                                    </ul>
                                                    @endif
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end menu-->

            </div>

            <!--end menu-->
            @yield('content')
            <div class="section-dark sec-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12 colmargin clearfix margin-bottom">
                            <div class="fo-map">
                                <div class="footer-logo"><img src="{{asset('template/images/logo/logo.png')}}" alt="" /> </div>
                                <p class="text-light">{{__('masteruser.logodescription')}} </p>
                            </div>
                        </div>
                        <!--end item-->

                        <div class="col-md-3 col-xs-12 clearfix margin-bottom">
                            <h4 class="text-white less-mar3 font-weight-5">{{__('masteruser.aboutus')}}</h4>
                            <div class="clearfix"></div>
                            <br />
                            <ul class="footer-quick-links-4 white">
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.ab1')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.ab2')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.ab3')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.ab4')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.ab5')}}</a></li>
                            </ul>
                        </div>
                        <!--end item-->

                        <div class="col-md-3 col-xs-12 clearfix margin-bottom">
                            <h4 class="text-white less-mar3 font-weight-5">{{__('masteruser.quicklinks')}}</h4>
                            <div class="clearfix"></div>
                            <br />
                            <ul class="footer-quick-links-4 white">
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.qu1')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.qu2')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.qu3')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.qu4')}}</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i> {{__('masteruser.qu5')}}</a></li>
                            </ul>
                        </div>
                        <!--end item-->

                        <div class="col-md-3 col-xs-12 clearfix margin-bottom">
                            <h4 class="text-white less-mar3 font-weight-5">{{__('masteruser.contactus')}}</h4>
                            <div class="clearfix"></div>
                            <br />
                            <address class="text-light">
                                <strong class="text-white">{{__('masteruser.address')}}</strong>
                                {{__('masteruser.addresscontent')}}
                            </address>
                            <span class="text-light"><strong class="text-white">{{__('masteruser.phone')}}</strong> + 1 (234) 567 8901</span><br>
                            <span class="text-light"><strong class="text-white">{{__('masteruser.email')}}</strong> email@example.com </span><br>
                            <span class="text-light"><strong class="text-white">{{__('masteruser.fax')}}</strong> + 1 (234) 567 8901</span>
                            <ul class="footer-social-icons white left-align icons-plain text-center">
                                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="active" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                        <!--end item-->

                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- end section -->

            <section class="sec-padding-6 section-medium-dark-2">
                <div class="container">
                    <div class="row">
                        <div class="fo-copyright-holder text-center"> Copyright © 2019 <a href="https://1.envato.market/codelayers">Codelayers</a> | All rights reserved. </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!-- end section -->

            <a href="#" class="scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a><!-- end scroll to top of the page-->

        </div>
        <!--end site wrapper-->
    </div>
    <!--end wrapper boxed-->
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script> -->

    <script src="{{mix('/js/revolution-slider/js/jquery.themepunch.tools.min.js')}}"></script>
    <script src="{{mix('/js/revolution-slider/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script src="{{mix('/js/bootstrap/bootstrap.min.js')}}"></script>
    <script src="{{mix('/js/less/less.min.js')}}"></script>
    <script src="{{mix('/js/megamenu/js/main.js')}}"></script>
    <script src="{{mix('/js/ytplayer.js')}}"></script>
    <script src="{{mix('/js/revolution-slider.js')}}"></script>
    <script src="{{mix('/js/revolution-slider/js/extensions.js')}}"></script>
    <script src="{{mix('/js/parallax.js')}}"></script>
    <script src="{{mix('/js/cubeportfolio/jquery.cubeportfolio.min.js')}}"></script>
    <script src="{{mix('/js/cubeportfolio/cols-5.js')}}"></script>
    <script src="{{mix('/js/owl-carousel.js')}}"></script>
    <script src="{{mix('/js/accordion/js.js')}}"></script>
    <script src="{{mix('/js/progress-circle.js')}}"></script>
    <script src="{{mix('/js/functions/functions.js')}}"></script>
    <script src="{{mix('/js/loaders/loading-custom.js')}}"></script>
    <script src="{{mix('/js/tabs/js/responsive-tabs.min.js')}}"></script>








</body>

</html>