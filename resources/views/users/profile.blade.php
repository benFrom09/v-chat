@extends('layouts.welcome')
@section('title','Easy-chat | Profil ')
@section('content')
 <!-- row -->
 <div class="row">
        <!-- col md8 -->
        <div class="col-md-6 register-panel ">
            <!-- panel-default -->
            <div class="panel panel-default register-form">
                <!-- panel-heading -->
                <div class="panel-heading"><h3 id="profile-name">Profil de {{$user->name}}</h3></div><!-- panel-heading -->
                <!-- panel-body -->
                <div class="panel-body form-horizontal">
                            <p><img src="{{App\Profile::get_gravatar($user->email)}}" alt="image de profil de {{$user->name}}" class="img-thumbnail avatar"></p>
                            <hr>
                            <div>
                                <h4>Contact</h4>
                                <i class="fa fa-at"></i><span class="profile-data"><a class="profile-user-mail" href="http://{{$user->email}}">{{$user->email}}</a></span>
                            </div>
                            <hr>
                            <div>
                                <h4>Résidence</h4>
                                <div class="profile">
                                    <i class="fa fa-globe"></i>
                                    @if(!empty($data))
                                    <div class="profile-data"><a class="profile-user-location" href="https://google.com/maps?q={{$data->city}} {{$data->country}}">{{$data->city}}-{{$data->country}}</a></div>
                                    @endif
                                
                                    <!--<span class="profile-data">Rien à signaler</span>-->
                                </div>   
                            </div>
                            <hr>
                            <div>
                                <h4>Talents</h4>
                                <div class="profile">
                                     <i class="fa fa-briefcase"></i>
                                    @if(!empty($data))
                                     <div class="profile-user-skill profile-data">{{$data->skill}}</div>
                                    @endif
                                    <!--<span class="profile-user-skill profile-data">Rien à signaler</span>-->
                                </div>   
                            </div>
                            <hr>
                            <div>
                                <h4>A propos</h4>
                                <div class ="profile">
                                    <i class="fa fa-info-circle"></i>
                                    @if(!empty($data))
                                    <div class="profile-user-about profile-data">{{$data->about}}</div>
                                     @endif
                                    <!--<span class="profile-user-about profile-data">Rien à signaler</span>-->
                                    
                                </div>
                            </div>
                            <hr>

                </div>
                <!-- panel-body -->
            </div>
            <!-- panel-default -->
        </div>
        <!-- col md8 -->
        <!-- col md-6 -->
        @if($user->id == Auth::user()->id)
        <div class="col-md-6 md-offset-2 register-panel ">
            <!-- panel-default -->
            <div class="panel panel-default register-form">
                <!-- panel-heading -->
                <div class="panel-heading panel-profile"><h3>Je complète mon profil</h3></div><!-- panel-heading -->
                <!-- panel-body -->
                <div class="panel-body">
                    @include('partials.profile-form')
                </div>
                <!-- panel-body -->
            </div>
            <!-- panel-default -->
        </div>
        @endif
        <!-- colmd6 -->
        
    </div>
    <!-- row -->
@stop