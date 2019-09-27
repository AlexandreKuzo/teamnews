<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpowermentController extends Controller {
	protected $table = 'empowerments';

	public function show() {

		$empowerments = \App\Empowerment::all()->sortByDesc('created_at');

		return view('empowerments', ['empowerments' => $empowerments]);
	}

	public function write() {
		$empowerments = new \App\Empowerment([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$empowerments->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('empowerments');

	}

	public function view($id) {

		$empowerments = \App\Empowerment::where('id', $id)->get();
		return view('empowerments', compact('empowerments'));

	}

	public function delete($id) {

		\App\Empowerment::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('empowerments', compact('empowerments'));
	}
}
