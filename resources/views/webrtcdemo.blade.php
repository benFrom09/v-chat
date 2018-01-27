<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        video {
    max-width: 100%;
     width: 320px;
            }
    </style>
</head>
<body>
    <h1>Realtime communication with WebRTC</h1>

    <video id="localVideo" autoplay></video>
    <video id="remoteVideo" autoplay></video>

    <div>
        <button id="startButton">Start</button>
        <button id="callButton">Call</button>
        <button id="hangupButton">Hang Up</button>
    </div>
    <script src="{{asset('js/adapter.js')}}"></script>
    <script src="{{asset('js/rtctuto.js')}}"></script>
</body>
</html>