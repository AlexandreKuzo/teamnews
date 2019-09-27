<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommunicationController extends Controller {
	protected $table = 'communications';

	public function show() {

		$communications = \App\Communication::all()->sortByDesc('created_at');

		return view('communication', ['communications' => $communications]);
	}

	public function write() {
		$communications = new \App\Communication([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$communications->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('communication');

	}

	public function view($id) {

		$communications = \App\Communication::where('id', $id)->get();
		return view('communication', compact('communications'));
	}

	public function delete($id) {

		\App\Communication::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('communication', compact('communications'));
	}
}
