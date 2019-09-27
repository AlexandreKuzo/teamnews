<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DevelopmentController extends Controller {
	protected $table = 'developments';

	public function show() {

		$developments = \App\Development::all()->sortByDesc('created_at');

		return view('developments', ['developments' => $developments]);
	}

	public function write() {
		$developments = new \App\Development([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$developments->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('developments');

	}

	public function view($id) {

		$developments = \App\Development::where('id', $id)->get();
		return view('developments', compact('developments'));
	}

	public function delete($id) {

		\App\Development::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('developments', compact('developments'));
	}

}
