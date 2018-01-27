@extends('layouts.easy-chat')

@section('content')
<div class="usr-p">
    <div class="dashboard-panel">
        <div class="panel-heading">
            <h1>Espace personnel</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-body">
                    <div class="card-1">
                        <img class="img-thumbnail" data-src="holder.js/100px280?theme=thumb" alt="Thumbnail [100%x280]" style="height: auto; width: 100px; display: block;" src="{{App\Profile::get_gravatar(Auth::user()->email)}}" data-holder-rendered="true">
                        
                    </div>
                    <div class="card">
                        <div><i class="fa fa-at"></i></div>
                        <p class="card-text">{{Auth::user()->email}}</p>
                    </div>
                    <div class="card">
                        <div><i class="fa fa-globe"></i></div>
                        @if(Auth::user()->profile->city)
                        <p class="card-text">Habite à :{{Auth::user()->profile->city}}</p>
                        @else
                        <p class="card-text">Habite à : Indisponible</p>
                        @endif
                    </div>
                    <div class="card">
                        <div><i class="fa fa-briefcase"></i></div>
                        @if(Auth::user()->profile->skill)
                        <p class="card-text">Talents :{{Auth::user()->profile->skill}}</p>
                        @else
                        <p class="card-text">Talents : Indisponible</p>
                        @endif
                    </div>
                    <div class="card">
                        <div><i class="fa fa-info-circle"></i></div>
                        @if(Auth::user()->profile->about)
                        <p class="card-text">A Propos :{{Auth::user()->profile->about}}</p>
                        @else
                        <p class="card-text">A propos : Indisponible</p>
                        @endif
                    </div>
                    <div class="card-1">
                        <p><a class="alert alert-info" href="{{url('membres') . '/' . Auth::user()->id}}">Mettre à jour mon profil</a></p>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-4"></div>-->
        </div>
    </div>
    <div class="sidebar">
        <div class="s-group">
            <div class="panel panel-heading">
                <div class="show-groups">
                    <div class="ctrl-1">Vos groupes</div>
                    <div class="ctrl-2">
                        <div class="panel-close">
                            <i class="fa fa-chevron-left" aria-hidden="true"></i>
                        </div>
                        <div class="panel-open">
                            <i class="fa fa-chevron-right" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                
                        
            </div>
            <div class="panel panel-body">
                <div class="s-groups-content">
                    <ul class="group-list">
                        <li class="no-group">
                            @if(!$has_groups)
                            <div class="group-name alert alert-danger">
                                Vous n'êtes membre d'aucun groupe
                            </div>
                            @endIf
                            <a class="btn btn-primary" href="{{route('group.create')}}">Créez votre groupe</a>
                            <div class="no-group-btn">ou</div>
                            <a class="btn btn-primary " href="{{url('/groupes')}}">Explorez la liste des groupes</a>
                        </li>
                        @if(!empty($groups))
                        @foreach($groups as $group)
                        <li class="group-list-item">
                            <div class="group-name">
                                {{$group->description}} 
                            </div>
                            <a class="btn btn-primary" href="{{url('room').'/'.$group->id}}">Rejoindre</a>
                        </li>
                        @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    document.querySelector('.panel-close').addEventListener('click',(e)=>{
        document.querySelector('.ctrl-1').style.display = 'none';
        document.querySelector('.group-list').style.display = 'none';
        let sideBarWidth = document.querySelector('.sidebar').attributes[0].ownerElement.clientWidth;
        let newSideBarWidth = sideBarWidth - (sideBarWidth * 80 /100);
        document.querySelector('.sidebar').style.width = newSideBarWidth + 'px';
        document.querySelector('.panel-close').style.display = 'none';
        document.querySelector('.panel-open').style.display = 'block';
        
    });
    document.querySelector('.panel-open').addEventListener('click',(e)=>{
        document.querySelector('.ctrl-1').style.display = 'block';
        
        document.querySelector('.sidebar').style.width = 350 + 'px';
        document.querySelector('.group-list').style.display = 'flex';
        document.querySelector('.panel-close').style.display = 'block';
        document.querySelector('.panel-open').style.display = 'none';
        
    });
</script>
@endsection