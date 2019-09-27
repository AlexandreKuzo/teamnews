<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InspirationsController extends Controller {
	protected $table = 'inspirations';

	public function show() {

		$inspirations = \App\Inspiration::all()->sortByDesc('created_at');

		return view('inspirations', ['inspirations' => $inspirations]);
	}

	public function write() {
		$inspirations = new \App\Inspiration([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$inspirations->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('inspirations');

	}

	public function view($id) {

		$inspirations = \App\Inspiration::where('id', $id)->get();
		return view('inspirations', compact('inspirations'));
	}

	public function delete($id) {

		\App\Inspiration::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('inspirations', compact('inspirations'));
	}

	
	
	

}
