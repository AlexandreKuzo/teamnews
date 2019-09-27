<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnvolController extends Controller {
	protected $table = 'envols';

	public function show() {

		$envols = \App\Envol::all()->sortByDesc('created_at');

		return view('envol', ['envols' => $envols]);
	}

	public function write() {
		$envols = new \App\Envol([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$envols->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('envol');

	}

	public function view($id) {

		$envols = \App\Envol::where('id', $id)->get();
		return view('envol', compact('envols'));
	}
	public function delete($id) {

		\App\Envol::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('envol', compact('envols'));
	}
}
