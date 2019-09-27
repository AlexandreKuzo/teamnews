<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReussitesController extends Controller {
	protected $table = 'reussites';

	public function show() {

		$reussites = \App\Reussite::all()->sortByDesc('created_at');

		return view('reussites', ['reussites' => $reussites]);
	}

	public function write() {
		$reussites = new \App\Reussite([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$reussites->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('reussites');

	}

	public function view($id) {

		$reussites = \App\Reussite::where('id', $id)->get();
		return view('reussites', compact('reussites'));
	}

	public function delete($id) {

		\App\Reussite::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('reussites', compact('reussites'));
	}

}
