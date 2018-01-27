@extends('layouts.easy-chat')
@section('content')
<div class="container">

    <form action="" method="post" class="create-group-form">
    {{csrf_field()}}

        <div class="form-group">
            <label for="name">Nom du groupe</label>
            <input class="form-control" type="text" name="name" id="name" placeholder ="Entrez le nom du groupe ici">
        </div>
        <div class="form-group">
            
            <input class="form-control" type="hidden" name="is_creator" id="is_creator" value="{{Auth::user()->id}}">
        </div>
        <div class="form-group">
            <label for="description">Description du groupe</label>
            <textarea class="form-control" type="text" name="description" id="description" placeholder ="Une courte description de votre groupe"></textarea>
        </div>
        
        <button class="btn btn-info" type="submit">creer</button>
    </form>

</div>
@stop