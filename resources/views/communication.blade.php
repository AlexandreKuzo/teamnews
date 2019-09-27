@extends('layouts.app')
@section('content')

<div class="hero is-info">
	<div class="hero-body">
	<h1 class="title">Pôle Communication.</h1>
	</div>
</div>
@if(auth::user()->role=== 'author')
<div class="card-content">
  @include('flash::message')
  <form action="{{ route('communication') }}" method="POST">
<div class="field">
  <label class="label">Un article à publier ?</label>
  <div class="control">
    <textarea class="textarea" name="article" placeholder="On y va !"></textarea>
        <div class="card-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="button is-info">
        </div>
    </form>
  </div>
</div>

</div>
@endif



@foreach($communications as $communication)
<ul>

<div class="columns is-marginless is-centered">
        <div class="column is-9">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Les news du {{ $communication->created_at->format('d/m/y') }}
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="content">
    	{{ $communication->article }}
      </div>
      <div class="content">
      <p class="subtitle is-6"><strong>Publié par : {{ $communication->author }}</strong></p>
    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:{{ $communication->email }}" class="card-footer-item">Contacte l'auteur !</a>
    <a href="{{'communication'}}/{{$communication->id}}" class="card-footer-item" target="_blank">Lien vers l'article</a>
     @if(auth::user()->name === $communication->author)
    <a href="{{'delete'}}/{{'communication'}}/{{$communication->id}}" class="card-footer-item" id="supp_comm" onclick="return confirm('C\'est ton dernier mot ? La sentence est irrévocable ?');">Supprimer l'article ?</a>

    <script>

      var linkComm = document.getElementbyId("supp_comm");
      supp_comm.onclick = function {
        return confirm("C\'est ton dernier mot ? La sentence est irrévocable ?");
        return true;
          }

    </script>

    @include('flash::message')
    @endif
  </footer>
		</div>
	</div>
</div>
</ul>
@endforeach





@endsection