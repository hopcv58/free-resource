<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FreeResource-@yield('title')</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('bootflat/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="favicon_16.ico"/>
    <link rel="bookmark" href="favicon_16.ico"/>
    <link rel="stylesheet" href="{{asset('bootflat/css/site.min.css')}}">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,800,700,400italic,600italic,700italic,800italic,300italic" rel="stylesheet" type="text/css">
    {{--custom css--}}
    @yield('css')
    <script src="{{asset('bootflat/js/html5shiv.js')}}"></script>
    <script src="{{asset('bootflat/js/respond.min.js')}}"></script>
    <![endif]-->
    <script type="text/javascript" src="{{asset('bootflat/js/site.min.js')}}"></script>
</head>
<body>
@include('parts.header')
{{--@include('parts.sidebar')--}}
<div class="container-fluid main-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(isset($tabActive) && $tabActive === 'resource')
                    @include('resource.sidebar')
                @else
                    @include('parts.sidebar')
                @endif
            </div>
            <div class="col-md-9">
                @yield('content')
            </div>
        </div>
    </div>
</div>
@include('parts.footer')
<script src='http://cdn.ckeditor.com/4.6.2/standard/ckeditor.js'></script>
<script src="{{ URL::asset('js/app.js') }}"></script>
<!-- custom script -->
@yield('script')
</body>
</html>
