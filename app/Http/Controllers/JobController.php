<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobController extends Controller {
	protected $table = 'users';

	public function show() {

		return view('jobupdate');
	}

	public function jobupdate() {

		$user       = auth()->user();
		$user->job  = request('job');
		$user->pole = request('pole');
		$user->save();
		flash("Maintenant tes collègues connaissent ton poste :-)")->success();

		return redirect('/profil');

	}

}
