@extends('layouts.app')

@section('content')


<section class="hero is-light">
  <div class="hero-body">
    <div class="container">
      <h1 class="title">
Bienvenue !       </h1>
      <h2 class="subtitle">
       Qu'est-ce qu'on cherche ?
      </h2>
    </div>
  </div>
</section>


    <div class="container">
        <div class="columns is-marginless is-centered">
            <div class="column is-7">
                <nav class="card">
                    <header class="card-header">
                        <p class="card-header-title">
                            Help yourself...
                        </p>
                    </header>


<div class="card-content">

  <div class="buttons">
                                   <a href="/team" class="button is-dark is-fullwidth">Qui travaille chez A1 ?</a>
                                   <a href="/news" class="button is-black is-fullwidth">Les "BREAKING NEWS"</a>
                                   <a href="/affaires" class="button is-primary is-fullwidth">Des news du pôle Affaires Internes ?</a>
                                   <a href="/empowerments" class="button is-light is-fullwidth">Des news du pôle "Se développer" ?</a>
                                   <a href="/reussites" class="button is-success is-fullwidth">Des news du pôle Réussir ?</a>
                                   <a href="/inspirations" class="button is-warning is-fullwidth">Des news du pôle Inspire ?</a>
                                   <a href="/envol" class="button is-link is-fullwidth">Des news du pôle Envol ?</a>
                                   <a href="/developments" class="button is-danger is-fullwidth">Des news du pôle Dev-Terr. ?</a>
                                   <a href="/communication" class="button is-info is-fullwidth">Des news du pôle Communication ?</a>
    </div>
</div>
                </nav>
            </div>
        </div>
    </div>


@endsection
