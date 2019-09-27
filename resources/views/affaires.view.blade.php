@extends('layouts.app')
@section('content')

<div class="hero is-black">
	<div class="hero-body">
	<h1 class="title">Aux Affaires Internes, voici les dernières infos !</h1>
	</div>
</div>

@foreach($affaires as $affaire)
<ul>

<div class="columns is-marginless is-centered">
        <div class="column is-9">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Les news du {{ $affaire->created_at->format('d/m/Y') }}
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>

  <div class="card-content">
    <div class="media-left">
  <figure class="image is-128x128">
    <image src="{{ $affaire->image }}">
  </figure>
  </div>
    <div class="content">
    	{{ $affaire->article }}
      <br>
      <p>Publié par : {{ $affaire->author }} </p>
    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:" class="card-footer-item">Contacte l'auteur !</a>
    @if(auth::user()->name === $affaire->author)
    @endif
  </footer>
		</div>
	</div>
</div>
</ul>
@endforeach





@endsection