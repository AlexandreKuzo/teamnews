<?php

namespace App\Http\Controllers;

use App\Affaires;

use Illuminate\Http\Request;
use Image;

class AffairesUploadController extends Controller {
	public function show() {
		$affaires = \App\Affaires::all()->sortByDesc('created_at');

		return view('affaires', ['affaires' => $affaires]);

	}

	public function update(Request $request) {

		$affaires = \App\Affaires::all();
		
		$affaires = new \App\Affaires([

			]);

		// Création et mise à jour d'une nouvelle image
		if ($request->hasFile('image')) {

			$image    = $request->file('image');
			$filename = time().'.'.$image->getClientOriginalExtension();
			Image::make($image)->resize(300, 300)->save(public_path('/uploads/photos/'.$filename));
			$affaires->image = $filename;

		}

		return view('affaires');
	}

}
