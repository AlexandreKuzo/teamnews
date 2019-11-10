@extends('layouts.app')
@section('content')

<div class="hero is-black">
	<div class="hero-body">
	<h1 class="title">Les news (non... les BREAKING NEWS !)</h1>
	</div>
</div>

@if(auth::user()->role=== 'author')
<div class="card-content">
  @include('flash::message')
  <form action="{{ route('news') }}" method="POST">
<div class="field">
  <label class="label">Un article à publier ?</label>
  <div class="control">
    <textarea class="textarea" name="article" placeholder="On y va !" required></textarea>
     <script src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
<script>
    tinymce.init({
        selector:'textarea.textarea',
        theme: 'silver',

        plugins: 'lists | image media link tinydrive code imagetools | wordcount',
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | insertfile link | wordcount',
        width: 1100,
        height: 300,

        mobile:{
          theme:'mobile',
          plugins: [ 'autosave', 'lists', 'autolink' ]
        }
    });
</script>
        <div class="card-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="button is-black">
        </div>
    </form>
  </div>
</div>

</div>
@endif

@foreach($news as $new)
<ul>

<div class="columns is-marginless is-centered">
        <div class="column is-9">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Les news du {{ $new->created_at->format('d/m/y') }}
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="content">
    	{!! $new->article !!}
      </div>

  <div class="content">

      <p class="subtitle is-6"><strong>Publié par : {{ $new->author }}</strong></p>
    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:{{ $new->email }}" class="card-footer-item">Contacte l'auteur !</a>
    <a href="{{'news'}}/{{$new->id}}" class="card-footer-item" target="_blank">Lien vers l'article</a>
  @if(auth::user()->name === $new->author)
    <a href="{{'delete'}}/{{'news'}}/{{$new->id}}" class="card-footer-item" id="supp_new" onclick="return confirm('C\'est ton dernier mot ? La sentence est irrévocable ?');">Supprimer l'article ?</a>

    <script>

      var linkNews = document.getElementbyId("supp_new");
      supp_new.onclick = function {
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
