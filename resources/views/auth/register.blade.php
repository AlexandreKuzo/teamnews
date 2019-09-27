@extends('layouts.app')

@section('content')

<style type="">
    body {
        background-image: url('../images/newspaper2.jpg');

}



</style>
    <section class="hero is-black">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Inscription - La dépêche d'A1.
                </h1>
            </div>
        </div>
    </section>

    <div class="columns is-marginless is-centered">
        <div class="column is-5">
            <div class="card">
                <header class="card-header">
                    <p class="card-header-title">Tu veux lire la dépêche ? Inscris-toi...</p>
                </header>

                <div class="card-content">
                    <form class="register-form" method="POST" action="{{ route('register') }}">

                        {{ csrf_field() }}

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Prénom ET Nom</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="name" type="name" name="name" value="{{ old('name') }}"
                                               required autofocus>
                                    </p>

                                    @if ($errors->has('name'))
                                        <p class="help is-danger">
                                            {{ $errors->first('name') }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label">
                                <label class="label">Adresse Mail</label>
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
                            <div class="field-label">
                                <label class="label">Confirmation</label>
                            </div>

                            <div class="field-body">
                                <div class="field">
                                    <p class="control">
                                        <input class="input" id="password-confirm" type="password"
                                               name="password_confirmation" required>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="field is-horizontal">
                            <div class="field-label"></div>

                            <div class="field-body">
                                <div class="field is-grouped">
                                    <div class="control">
                                        <button type="submit" class="button is-black">Je m'inscris</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection