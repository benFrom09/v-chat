@extends('layout.grouptemplate')
@section('title','profile/' . $user->id)
@section('content')
<!-- container -->

<div class="container">
    <!-- row -->
    <div class="row">
        <!-- col md8 -->
        <div class="col-md-6 register-panel">
            <!-- panel-default -->
            <div class="panel panel-default register-form">
                <!-- panel-heading -->
                <div class="panel-heading panel-profile"><h3 id="profile-name">Profil de {{$user->name}}</h3></div><!-- panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                            <p><img src="{{App\Profile::get_gravatar($user->email)}}" alt="image de profil de {{$user->name}}" class="img-thumbnail avatar"></p>
                            <hr>
                            <p>
                                <h4>Contact</h4>
                                <i class="fa fa-at"></i><span class="profile-data"><a class="profile-user-mail" href="http://{{$user->email}}">{{$user->email}}</a></span>
                            </p>
                            <hr>
                            <p>
                                <h4>Résidence</h4>
                                <i class="fa fa-globe"></i>
                               
                                
                                @if($data->city && $data->country)
                                <span class="profile-data"><a class="profile-user-location" href="https://google.com/maps?q={{$data->city}} {{$data->country}}">{{$data->city}}-{{$data->country}}</a></span>
                                
                                @else
                                <span class="profile-data">Rien à signaler</span>
                                @endif
                            </p>
                            <hr>
                            <p>
                                <h4>Talents</h4>
                                <i class="fa fa-briefcase"></i>
                                @if($data->skill)
                                <span class="profile-user-skill profile-data">{{$data->skill}}</span>
                                @else
                                <span class="profile-user-skill profile-data">Rien à signaler</span>
                                @endif
                            </p>
                            <hr>
                            <p>
                                <h4>A propos</h4>
                                <span style="display:flex">
                                    <i class="fa fa-info-circle"></i>
                                    @if($data->about)
                                    <span class="profile-user-about profile-data"style="display:block;">{{$data->about}}</span>
                                     @else
                                    <span class="profile-user-about profile-data">Rien à signaler</span>
                                    @endif
                                </span>
                            </p>
                            <hr>

                </div>
                <!-- panel-body -->
            </div>
            <!-- panel-default -->
        </div>
        <!-- col md8 -->
        <!-- col md-6 -->
        @if($user->id === Auth::User()->id)
        <div class="col-md-6 ">
            <!-- panel-default -->
            <div class="panel panel-default">
                <!-- panel-heading -->
                <div class="panel-heading panel-profile"><h3>Completer votre profil</h3></div><!-- panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    @include('profile.profileform')
                </div>
                <!-- panel-body -->
            </div>
            <!-- panel-default -->
        </div>
        <!-- colmd6 -->
        @endif
    </div>
    <!-- row -->
</div>
<!-- /* container -->
@endsection
