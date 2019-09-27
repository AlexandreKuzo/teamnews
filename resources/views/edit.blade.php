@extends('layouts.app')
@section('content')

<div class="hero is-primary">
	<div class="hero-body">
	<h1 class="title">Aux Affaires Internes, voici les dernières infos !</h1>
	</div>
</div>

@if(auth::user()->role=== 'author')


<div class="card-content">
<div class="field">
  <label class="label">Un article à publier ?</label>
  </div>
<div class="card-content">
            <label class="label">Ajouter une photo</label>
            @include('flash::message')
    <form action="{{ route('affaires', $affaire->id) }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
                    <div class="field">
                                    <div class="file is-primary">
                                        <label class="file-label">
                                            <div class="control">
                                <input class="file-input" type="file" name="image" id="image">
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
                                    @if ($errors->has('image'))
                                        <p class="help is-danger">
                                            {{ $errors->first('image') }}
                                        </p>
                                    @endif

                        <script>
                            var file = document.getElementById("image");
                                file.onchange = function(){
                                    if(file.files.length > 0)
                                    {

                     document.getElementById('filename').innerHTML =file.files[0].name;

                                    }
                                };
                                    </script>
                                            </div>
                                        </div>



<div class="card-content">



  <div class="control">
    <textarea class="textarea" name="article" placeholder="On y va !"></textarea>
        <div class="card-content">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="button is-primary">
        </div>
    </form>
  </div>
</div>

</div>
@endif

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
    <img src="{{$affaire->image}}">
  </figure>
  </div>
    <div class="content">
    	{{ $affaire->article }}
      </div>
    <div class="content">

      <p class="subtitle is-6"><strong>Publié par : {{ $affaire->author }}</strong></p>
    </div>
  </div>
  <footer class="card-footer">
    <a href="mailto:{{$affaire->email}}" class="card-footer-item">Contacte l'auteur !</a>
    <a href="{{'affaires'}}/{{$affaire->id}}" class="card-footer-item" target="_blank">Lien vers l'article</a>
  </footer>
		</div>
	</div>
</div>
</ul>
@endforeach





@endsection