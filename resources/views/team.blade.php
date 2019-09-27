@extends('layouts.app')

@section('content')


<!DOCTYPE html>
<html>
<head>
	<title>L'équipe</title>
</head>
<body>

 <section class="hero is-black">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Tous les collègues d'A1 !
                </h1>
            </div>
        </div>
    </section>




    <div class="container">


<div class="box">
  <div class="field">
    <p class="subtitle is-6"><strong>Accède aux liens ci-dessous pour voir qui travaille où.</strong></p>
</div>
{{--}}{{--}}
      <div class="buttons are-medium are-centered">


<a href="{{'team'}}.{{'empowerment'}}" class="button is-light">Se développer</a>
<a href="{{'team'}}.{{'affaires'}}" class="button is-primary">Affaires Internes</a>
<a href="{{'team'}}.{{'envol'}}" class="button is-link">Envol</a>
<a href="{{'team'}}.{{'communication'}}"class="button is-info">Communication</a>
<a href="{{'team'}}.{{'reussir'}}"class="button is-success">Réussir</a>
<a href="{{'team'}}.{{'inspire'}}" class="button is-warning">Inspire</a>
<a href="{{'team'}}.{{'development'}}" class="button is-danger">Dev-Terr.</a>
<a href="{{'team'}}.{{'all'}}" class="button is-dark">Toute l'équipe A1</a>
</div>
    </div>


@foreach($users as $user)



<div class="card">
	<ul>
  <div class="card-content">
    <div class="media">
      <div class="media-left">
        <figure class="image is-48x48">
          <img src="/uploads/avatars/{{ $user->avatar }}" alt="">
        </figure>
      </div>
      <div class="media-content">


        <p class="title is-4">{{ $user->name}} - {{$user->job}} - Pôle : {{ $user->pole }}
        <p class="subtitle is-6">{{ $user->email}}</p>

      </div>
    </div>

  </div>

  </ul>

  @endforeach
</div>
    </div>




</body>
</html>

@endsection