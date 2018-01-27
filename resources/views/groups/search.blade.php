@if($groups)
 @foreach($groups as $group)

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

@endforeach

 @endif