@extends('layouts.app')

@section('content')

<style type="">
    body {
        background-image: url('');

}



</style>

    <section class="hero is-black">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    La dépêche d'A1.
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">On se connecte ?</p>
                </header>

                <div class="card-content">
                    <form class="login-form" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Mail</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="email" type="email" name="email"
                                               value="{{ old('email') }}" required autofocus>
                                    </p>

                                    @if ($errors->has('email'))
                                        <p class="help is-danger">
                                            {{ $errors->first('email') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Mot de passe</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password" type="password" name="password" required>
                                    </p>

                                    @if ($errors->has('password'))
                                        <p class="help is-danger">
                                            {{ $errors->first('password') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <label class="checkbox">
                                            <input type="checkbox"
                                                   name="remember" {{ old('remember') ? 'checked' : '' }}> Se rappeler de moi ?
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-black">Connexion</button>
                                    </div>

                                    <div class="control">
                                        <a href="{{route('password.request')}}">Mot de passe oublié ?</a>
                                        {{--<a href="" id="oubli" onclick="return confirm('La réinitialisation du mot de passe n\'est pas encore disponible. Bientôt...');">
                                            Mot de passe oublié ?
                                        </a>
                                        <script>
                                            var oubliPass = document.getElementbyId("oubli");
                                            oubli.onclick = function(){
                                                return confirm("La réinitialisation du mot de passe n'est pas encore disponible. Bientôt...");
                                            }
                                        </script>
                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection