@extends('layouts.app')

@section('content')


<!DOCTYPE html>

<html>
<head>
    <title>Accompagnothèque</title>

</head>


<body>




<!--Annonce formulaire-->

    <section class="hero is-link">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Profil - {{ Auth::user()->name }}
                </h1>
            </div>
        </div>
    </section>

<div class="container">
	<div class="columns is-margineless is-centered">
		<div class="column is-10">
			<nav class="card">
				<header class="card-header">
					<p class="card-header-title">
						Avatar et fonctions dans l'équipe
					</p>
				</header>
				<div class="card-content">
					<img src="/uploads/avatars/{{ $user->avatar }}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
				</div>
				<div class="card-content">
					<form enctype="multipart/form-data" action="/profil" method="POST">

						<label>Mettre à jour l'avatar</label>
               			<div class="field">
                                    <div class="file is-hero">
                                        <label class="file-label">
                                            <div class="control">
                                <input class="file-input" type="file" name="avatar" id="avatar" required>
                                    </div>
                        <span class="file-cta">
                                        <span class="file-icon">
                                            <i class="fas fa-upload"></i>
                                     </span>

                                <span class="file-label" id="filename">
                                    Télécharger le document (pdf, jpg, png, bmp)
                                </span>
                                    </span>

                                        </label>
                                    @if ($errors->has('avatar'))
                                        <p class="help is-danger">
                                            {{ $errors->first('avatar') }}
                                        </p>
                                    @endif

                        <script>
                            var file = document.getElementById("avatar");
                                file.onchange = function(){
                                    if(file.files.length > 0)
                                    {

                     document.getElementById('filename').innerHTML =file.files[0].name;

                                    }
                                };
                                    </script>
                                            </div>
                                        </div>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="button is-link">

                        <div class="card-content">
                   <p class="subtitle">Mon Job : {{ Auth::user()->job }} - Pôle : {{ Auth::user()->pole }}
                       </p>
                       <p><a href="/jobupdate">Modifier mon poste ?</a></p>

                        </div>


		</div>
	</div>
</div>

@endsection