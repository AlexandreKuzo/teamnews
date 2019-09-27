<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffairesController extends Controller {

	protected $table = 'affaires';

	public function show() {

		$affaires = \App\Affaires::all()->sortByDesc('created_at');

		return view('affaires', compact('affaires'));
	}

	public function write() {

		request()->validate([

				'image' => ['image|nullable'],
			]);

		$affaires = new \App\Affaires([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,
				'image'   => request('image')->store('', 'public'),

			]);
		$affaires->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('affaires');

	}

	public function view($id) {

		$affaires = \App\Affaires::where('id', $id)->get();
		return view('affaires', compact('affaires'));
	}

	public function delete($id) {

		\App\Affaires::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('affaires', compact('affaires'));
	}

}
