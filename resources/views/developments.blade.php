@extends('layouts.app')
@section('content')

<div class="hero is-danger">
	<div class="hero-body">
	<h1 class="title">Pôle "Dev-Terr".</h1>
	</div>
</div>

@if(auth::user()->role=== 'author')
<div class="card-content">
  @include('flash::message')
  <form action="{{ route('developments') }}" method="POST">
<div class="field">
  <label class="label">Un article à publier ?</label>
  <div class="control">
    <textarea class="textarea" name="article" placeholder="On y va !"></textarea>
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
                    <input type="submit" class="button is-danger">
        </div>
    </form>
  </div>
</div>

</div>
@endif


@foreach($developments as $development)
<ul>

<div class="columns is-marginless is-centered">
        <div class="column is-9">
<div class="card">
  <header class="card-header">
    <p class="card-header-title">
     Les news du {{ $development->created_at->format('d/m/Y') }}
    </p>
    <a href="#" class="card-header-icon" aria-label="more options">
      <span class="icon">
        <i class="fas fa-angle-down" aria-hidden="true"></i>
      </span>
    </a>
  </header>
  <div class="card-content">
    <div class="content">
    	{!! $development->article !!}
      <br>
      <p><strong>Publié par : {{ $development->author }}</strong></p>
    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:{{ $development->email }}" class="card-footer-item">Contacte l'auteur !</a>
    <a href="{{'developments'}}/{{$development->id}}" class="card-footer-item" target=_blank>Lien vers l'article</a>
    @if(auth::user()->name === $development->author)
    <a href="{{'delete'}}/{{'developments'}}/{{$development->id}}" class="card-footer-item" id="supp_devterr" onclick="return confirm('C\'est ton dernier mot ? La sentence est irrévocable ?');">Supprimer l'article ?</a>

    <script>

      var linkDevterr = document.getElementbyId("supp_devterr");
      supp_devterr.onclick = function {
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
