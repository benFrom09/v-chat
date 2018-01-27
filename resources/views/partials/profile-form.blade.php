<form action="{{route('profile.update', $user->id)}}" method="post" id="profile-form" class="form-horizontal">
    {{csrf_field()}}
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Sentenac"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="firstname">Prénom</label>
                <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Ben"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="country">Pays</label>
                <input type="text" name="country" id="country" class="form-control" placeholder="ex:France"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="city">Ville</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="Paris"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="skill">Talents</label>
                <input type="text" name="skill" id="skill" class="form-control" placeholder="Science"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email">Contact</label>
                <input type="email" name="email" id="mail" class="form-control" placeholder="{{Auth::user()->email}}"/>
            </div>
        </div>        
    </div>
    <div class="row">
        <div class="col-md-12">
                <div class="form-group">
                    <label for="about">Description</label>
                    <textarea name="about" id="about"  class="form-control" placeholder="decrivez vous..."></textarea>               
                </div>
        </div>
    </div>
    <input type="submit" value="Valider" name="update" class="btn btn-primary">
</form>
<script>
    
    var token = '{{Session::token()}}';
</script>



