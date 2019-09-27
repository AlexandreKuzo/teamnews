@extends('layouts.app')
@section('content')

<div class="hero is-success">
	<div class="hero-body">
	<h1 class="title">Pôle Réussir.</h1>
	</div>
</div>


@if(auth::user()->role=== 'author')
<div class="card-content">
  @include('flash::message')
  <form action="{{ route('reussites') }}" method="POST">
<div class="field">
  <label class="label">Un article à publier ?</label>
  <div class="control">
    <textarea class="textarea" name="article" placeholder="On y va !" required></textarea>
        <div class="card-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="button is-success">
        </div>
    </form>
  </div>
</div>

</div>
@endif

@foreach($reussites as $reussite)
<ul>

<div class="columns is-marginless is-centered">
        <div class="column is-9">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Les news du {{ $reussite->created_at->format('d/m/Y') }}
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="content">
    	{{ $reussite->article }}
      </div>
    <div class="content">
      <p class="subtitle is-6"><strong>Publié par : {{ $reussite->author }}</strong></p>

    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:{{ $reussite->email }}" class="card-footer-item">Contacte l'auteur !</a>
    <a href="{{'reussites'}}/{{ $reussite->id }}" class="card-footer-item" target="_blank">Lien vers l'article</a>
     @if(auth::user()->name === $reussite->author)
    <a href="{{'delete'}}/{{'reussites'}}/{{$reussite->id}}" class="card-footer-item" id="supp_reussite" onclick="return confirm('C\'est ton dernier mot ? La sentence est irrévocable ?');">Supprimer l'article ?</a>

    <script>

      var linkReussir = document.getElementbyId("supp_reussite");
      supp_reussite.onclick = function {
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