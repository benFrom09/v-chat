@extends('layouts.easy-chat')
@section('content')
<div class="group-container">
    <div class="row">
        @include('partials.chat')
        
        @include('partials.posts')   
    </div>
</div>

<script>
    var token = '{{Session::token()}}';
    var url = '{{ route('edit')}}';
    
</script>

@stop