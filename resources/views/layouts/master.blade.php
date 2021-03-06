<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Documentation - Bootflat</title>
    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- SmartAddon.com Verification -->
    <meta name="smartaddon-verification" content="936e8d43184bc47ef34e25e426c508fe" />
    <meta name="keywords" content="Flat UI Design, UI design, UI, user interface, web interface design, user interface design, Flat web design, Bootstrap, Bootflat, Flat UI colors, colors">
    <meta name="description" content="The complete style of the Bootflat Framework.">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <!-- site css -->
    <link rel="stylesheet" href="{{asset('bootflat/css/site.min.css')}}">
    <link rel="stylesheet" href="{{asset('bootflat/css/bootstrap.min.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    <!-- <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700' rel='stylesheet' type='text/css'> -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{asset('bootflat/css/js/html5shiv.js')}}"></script>
    <script src="{{asset('bootflat/js/respond.min.js')}}"></script>
    <script src="{{asset('bootflat/js/jquery-1.10.1.min.js')}}"></script>
    <script src="{{asset('bootflat/js/bootstrap.min.js')}}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('bootflat/js/site.min.js')}}"></script>
</head>
<body style="background-color: #f1f2f6;">
<div class="docs-header">
    <!--nav-->
    <nav class="navbar navbar-default navbar-custom" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><img src="{{asset('bootflat/img/logo.png')}}" height="40"></a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="nav-link" href="getting-started.html">Getting Started</a></li>
                    <li><a class="nav-link current" href="documentation.html">Documentation</a></li>
                    <li><a class="nav-link" href="free-psd.html">Free PSD</a></li>
                    <li><a class="nav-link" href="color-picker.html">Color Picker</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                <span><img class ="avatar" src = "{{Auth::user()->avatar_path}}"></span>{{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!--header-->
    <div class="topic">
        <div class="container">
            <div class="col-md-8">
                <h3>Documentation</h3>
                <h4>The complete style of the Bootflat Framework</h4>
            </div>
        </div>
        <div class="topic__infos">
            <div class="container">
                <div class="breadcrumb">
                    <ol>

                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<!--documents-->
<div class="container documents">
    @yield('content')
</div>
<!--footer-->
<div class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h3>Get involved</h3>
                <p>Bootflat is hosted on <a href="https://github.com/bootflat/bootflat.github.io" target="_blank" rel="external nofollow">GitHub</a> and open for everyone to contribute. Please give us some feedback and join the development!</p>
            </div>
            <div class="col-md-4">
                <h3>Contribute</h3>
                <p>You want to help us and participate in the development or the documentation? Just fork Bootflat on <a href="https://github.com/Bootflat/bootflat.github.io" target="_blank" rel="external nofollow">GitHub</a> and send us a pull request.</p>
            </div>
            <div class="col-md-4">
                <h3>Found a bug?</h3>
                <p>Open a <a href="https://github.com/bootflat/bootflat.github.io/issues" target="_blank" rel="external nofollow">new issue</a> on GitHub. Please search for existing issues first and make sure to include all relevant information.</p>
            </div>
        </div>
        <hr class="dashed" />
        <div class="row">
            <div class="col-md-6">
                <h3>Talk to us</h3>
                <ul>
                    <li>Tweet us at <a href="https://twitter.com/flathemes" target="_blank">@flathemes</a>&nbsp;&nbsp;&nbsp;&nbsp;Email us at <span class="connect">info@flathemes.com</span></li>
                    <li>
                        <a title="Twitter" href="https://twitter.com/flathemes" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe121"></i></a>
                        <a title="Facebook" href="https://www.facebook.com/Flathemes" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe10b"></i></a>
                        <a title="Google+" href="https://plus.google.com/u/0/" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe110"></i></a>
                        <a title="Github" href="https://github.com/bootflat/bootflat.github.io" target="_blank" rel="external nofollow"><i class="icon" data-icon="&#xe10e"></i></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-6">
                <!-- Begin MailChimp Signup Form -->
                <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
                <div id="mc_embed_signup">
                    <h3 style="margin-bottom: 15px;">Newsletter</h3>
                    <form action="http://flathemes.us3.list-manage.com/subscribe/post?u=faba9adaea2b85dc9a5c496bd&amp;id=acd08a1b0f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                        <input style="margin-bottom: 10px;" type="email" value="" name="EMAIL" class="email form-control" id="mce-EMAIL" placeholder="email address" required>
                        <span class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary"></span>
                    </form>
                </div>
                <!--End mc_embed_signup-->
            </div>
        </div>
        <hr class="dashed" />
        <div class="copyright clearfix">
            <p><b>Bootflat</b>&nbsp;&nbsp;&nbsp;&nbsp;<a href="getting-started.html">Getting Started</a>&nbsp;&bull;&nbsp;<a href="documentation.html">Documentation</a>&nbsp;&bull;&nbsp;<a href="free-psd.html">Free PSD</a>&nbsp;&bull;&nbsp;<a href="color-picker.html">Color Picker</a></p>
            <p>&copy; 2014 <a href="http://www.flathemes.com" target="_blank">FLATHEMES</a>, Inc. All rights reserved. &nbsp;&nbsp;Code licensed under <a href="http://opensource.org/licenses/mit-license.html" target="_blank" rel="external nofollow">MIT License</a>, documentation under <a href="http://creativecommons.org/licenses/by/3.0/" rel="external nofollow">CC BY 3.0</a>.</p>
        </div>
    </div>
</div>
@yield('extra_js')
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-48721682-1', 'bootflat.github.io');
    ga('require', 'displayfeatures');
    ga('send', 'pageview');

</script>
</body>
</html>
