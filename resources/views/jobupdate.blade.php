@extends('layouts.app')
@section('content')



<div class="hero is-link">
	<div class="hero-body">
		<h1 class="title">Mon poste</h1>
	</div>
</div>
 <div class="card-content">
 	@include('flash::message')
                        <h2>Ton poste</h2>
                        <form action="{{ route('jobupdate') }}" method="POST">

                                 <div class="field">
                                    <div class="control">
                                        <input class="input is-link is-small" placeholder="Tu fais quoi chez A1 ?" name="job" id="job" required></input>

<div class="card-content">
       <h2 class="subtitle is-6">Dans quel pôle tu bosses ? :-)</h2>
               <div class="select">
                <select name="pole">
                <option value="Affaires Internes"> Affaires Internes </option>
                <option value="Réussir"> Réussir </option>
                <option value="Se développer"> Se développer </option>
                <option value="Dev-Ter"> Développement et territoires </option>
                <option value="Envol"> Envol </option>
                <option value="Communication"> Communication </option>
                <option value="Inspire"> Inspire </option>




                       </select>
                   </div>

                </header>

                            </div>

                    </div>


               			<input type="hidden" name="_token" value="{{ csrf_token() }}">
                		<input type="submit" class="button is-link">



				</div>
			</form>



@endsection