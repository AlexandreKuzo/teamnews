<?php

namespace App\Http\Controllers;

class TeamController extends Controller {
	//affichage de la Team entière -- on y atterrit depuis la page "home"
	public function liste() {

		$users = \App\User::all();

		return view('team', compact('users'));
	}

	// affichage des collègues par pôles
	public function lookAffaires() {

		$users = \App\User::where('pole', 'Affaires Internes')->get();
		return view('team', compact('users'));
	}

	public function lookEnvol() {

		$users = \App\User::where('pole', 'Envol')->get();
		return view('team', compact('users'));
	}

	public function lookReussir() {

		$users = \App\User::where('pole', 'Réussir')->get();
		return view('team', compact('users'));
	}

	public function lookCommunication() {

		$users = \App\User::where('pole', 'Communication')->get();
		return view('team', compact('users'));
	}

	public function lookDevelopment() {

		$users = \App\User::where('pole', 'Dev-Ter')->get();
		return view('team', compact('users'));

	}

	public function lookInspire() {

		$users = \App\User::where('pole', 'Inspire')->get();
		return view('team', compact('users'));

	}

	public function lookEmpowerment() {

		$users = \App\User::where('pole', 'Se développer')->get();
		return view('team', compact('users'));

	}

}
