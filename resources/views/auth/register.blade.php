@extends('layouts.welcome')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-2 register-panel">
            <div class="panel panel-default register-form">
                <div class="panel-heading">Je M'enregistre</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Mon Nom ou Pseudo</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Mon E-Mail</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

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
                            <label for="password-confirm" class="col-md-4 control-label">Je confirme mon mot de passe</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Je m'inscris
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-2 register-panel">
            <div class="panel panel-default register-modal ">
                <div class="panel panel-heading">
                    <div class="close-item">
                        <i class ="fa fa-info-circle"></i>
                        <i class="fa fa-close" id="close"></i>
                    </div>                 
                </div>
                <div class="panel panel-body body-register-infos">
                    <div class="register-infos">
                        <p>Veuillez remplir les champs du formulaire</p>
                        <p>Cliquez sur je m'enregistre</p>
                        <p>Un email de confirmation va vous étre envoyé afin de confirmer votre compte</p>
                        <p>Bonne navigation!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        if(window.location.pathname === '/register'){
            if(document.querySelector('.register-modal')) {
                let register_modal = document.querySelector('.register-modal');
            
                setTimeout(() => {
                
                    register_modal.classList.add('register-modal-block');
                
                }, 500);

                document.querySelector("#close").addEventListener('click', function(evt){
                    register_modal.classList.remove('register-modal-block');
                })

            }
            
                
                
                
                
            


        }
    </script>

@endsection
