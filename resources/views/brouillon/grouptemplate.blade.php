<!DOCTYPE html>
<html lang="en">
    {{\Debugbar::disable()}}

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <title>{{pageTitle($title ?? '')}}</title>
        <link rel="stylesheet" href="{{asset('css/video.css')}}">
        <!-- googlefonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans|Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans+Condensed:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">


        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="{{asset('css/default.css')}}">
        <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
        <script src="https://use.fontawesome.com/49e607a5ce.js"></script>


    </head>

    <body>
        <div id="group-wrapper">
            @include('partials.nav')
             @yield('content')

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{asset('js/adapter.js')}}"></script>
        <!--<script src="{{asset('js/profile-ajax.js')}}"></script>-->
        @if(isset($group))
        @if(url('/group/',$group->id))
        <script src="{{asset('js/post.js')}}"></script>
        <script src="{{asset('js/webrtc.js')}}"></script>
        <script src="{{asset('js/videocontrolpanel.js')}}"></script>
        <script src="{{asset('js/chatpanelcontroler.js')}}"></script>
        <audio id="ring" src="{{asset('media/ring.mp3')}}" loop preload="auto"></audio>
        @endif
        @endif
    </body>

</html>