@extends('layouts.welcome')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-2 login-panel">
            <div class="panel panel-default login-form">
                <div class="panel-heading">Login</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Mon E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mon mot de passe</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Je me connecte
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Mot de passe oublié?
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-2 login-panel">
            <div class="panel panel-default login-modal ">
                <div class="panel panel-heading">
                    <div class="close-item">
                        <i class ="fa fa-info-circle"></i>
                        <i class="fa fa-close" id="close"></i>
                    </div>                 
                </div>
                <div class="panel panel-body body-login-infos">
                    <div class="login-infos">
                        <p>Connectez vous</p>
                        <p>Modifiez votre profil</p>
                        <p>Créez ou adherez à un groupe de travail </p>
                        <p>Communiquez!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        if(window.location.pathname === '/login'){
            if(document.querySelector('.login-modal')) {
                let login_modal = document.querySelector('.login-modal');
            
                setTimeout(() => {
                
                    login_modal.classList.add('login-modal-block');
                
                }, 500);

                document.querySelector("#close").addEventListener('click', function(evt){
                    login_modal.classList.remove('login-modal-block');
                })

            }
            
                
                
                
                
            


        }
    </script>

@endsection
