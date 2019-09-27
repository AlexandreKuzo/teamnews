<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;

class UserProfileController extends Controller {
	public function profile() {

		return view('profil', array('user' => Auth::user()));
	}

	public function show() {

		return view('profil', ['user' => Auth::user()]);

	}
	public function update(Request $request) {
		// Création et mise à jour d'un nouvel avatar
		if ($request->hasFile('avatar')) {
			$avatar   = $request->file('avatar');
			$filename = time().'.'.$avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));
			$user         = Auth::user();
			$user->avatar = $filename;
			$user->save();
		}
		return view('profil', ['user' => Auth::user()]);

	}
}
