@extends('layouts.easy-chat') @section('content')
<div class="container">
    <div class="recherche">
    
        <li class="nav-item">
            <form class="form-inline mt-2 mt-md-0" id="searchForm" action="{{route('groupes.search')}}" method="get">
                <input class="form-control mr-sm-2" placeholder="Rechercher un groupe" aria-label="Search" type="text" id="search" name="search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Go</button>
            </form>
            
        </li>
        
    </div>
    <div class="row">
        <div class="col col-md-12 group-panel">
            @if($groups) @foreach($groups as $group)
            <div class="panel panel-default show-group-panel">
                <div class="panel panel-heading">
                    <h2>{{$group->name}}</h2>
                    <a href="{{url('membres') . '/' . $group->is_creator}}">Voir le profil</a>

                </div>
                <div class="panel panel-body">
                    <p>{{$group->description}}</p>
                </div>
                <div class="panel panel-footer">
                    @if($group->users->contains(Auth::user()->id))
                    <a class="btn btn-info" href="{{url('room').'/'.$group->id}}">Rejoindre le groupe</a> @if($group->is_creator != Auth::user()->id )
                    <form action="{{route('group.signout')}}" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="group_id" id="group_id" value="{{$group->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="submit" value="Quitter le groupe" class="btn btn-danger">
                    </form>
                    @else
                    <form action="" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="group_id" id="group_id" value="{{$group->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="submit" value="Supprimer le groupe" class="btn btn-danger">
                    </form>
                    @endif @else
                    <form action="{{route('group.signin')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="group_id" id="group_id" value="{{$group->id}}">
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        <input type="submit" value="Adherer au groupe" class="btn btn-info">
                    </form>

                    @endif
                </div>
            </div>
            @endforeach @endif
        </div>
    </div>
</div>

@stop