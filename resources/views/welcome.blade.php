@extends('layouts.welcome') @section('content')

<div class="welcome">
    <div class="hello">
        <h2>Prenez un cours simplement, ou communiquez avec un amis...</h2>

    </div>
    <div class="message">
        <p class="description">Easy-chat est un espace de partage utilisant la technologie Webrtc,</br>
            qui met à votre disposition les outils pour faciliter l'echange.. </p>
    </div>
</div>
<ul class="menu-icon-list">
    <li>
        <div class="icon-container"><i class="fa fa-registered fa-4x" aria-hidden="true"></i></div>
        <div class="icon-title">Enregistrez-vous</div>
    </li>

    <li>
        <div class="icon-container"><i class="fa fa-user fa-4x" aria-hidden="true"></i></div>
        <div class="icon-title">créez votre profiil</div>
    </li>
    <li>
        <div class="icon-container"><i class="fa fa-users fa-4x" aria-hidden="true"></i></div>
        <div class="icon-title">Créez un groupe de travail</div>
    </li>
    <li>
        <div class="icon-container"><i class="fa fa-globe fa-4x" aria-hidden="true"></i></div>
        <div class="icon-title">communiquez</div>
    </li>

</ul>
<div class="message fixed-height">
    <div>features :</div>
    <ul class="menu-icon-list-bottom">

        <li>
            <div class="icon-container"><i class="fa fa-video-camera fa-3x features" aria-hidden="true"></i></div>
            <div class="icon-title">Appel video</div>
        </li>
        <li>
            <div class="icon-container"><i class="fa fa-comments-o fa-3x features" aria-hidden="true"></i></div>
            <div class="icon-title">live chat</div>
        </li>
    </ul>
</div>

@stop