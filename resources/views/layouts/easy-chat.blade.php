<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    

    <meta name="description" content="Applicaton Easy-Chat, live-chat application en temps réel , partage de fichier en temps réel ,Laravel 5.4,Ratchet ...  ">
    <meta name="author" content="BenFrom09">
     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Easy-Chat</title>
    <!-- bootstrap /* fontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <!-- css -->
    <link rel="stylesheet" href="{{asset('css/default.css')}}">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <link rel="stylesheet" href="{{asset('css/video.css')}}">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

</head>

<body>
<div id="main-wrapper">
    @include('partials.header')


    <div class="usr-c">

        
        @yield('content')

    </div> <!-- /usr-c -->
</div>



<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="{{asset('js/search.js')}}"></script>
<script src="{{asset('js/adapter.js')}}"></script>
        <!--<script src="{{asset('js/profile-ajax.js')}}"></script>-->
@if(isset($group))
@if(url('/room/',$group->id))
<script src="{{asset('js/post.js')}}"></script>
<script src="{{asset('js/webrtc.js')}}"></script>
<script src="{{asset('js/videocontrolpanel.js')}}"></script>
<script src="{{asset('js/chatpanelcontroler.js')}}"></script>
<audio id="ring" src="{{asset('media/ring.mp3')}}" loop preload="auto"></audio>
@endif
@endif

</body>
</html>