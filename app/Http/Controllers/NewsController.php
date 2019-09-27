<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller {
	protected $table = 'news';

	public function show() {

		$news = \App\News::all()->sortByDesc('created_at');

		return view('news', ['news' => $news]);
	}

	public function write() {
		$news = new \App\News([
				'article' => request('article'),
				'author'  => auth()->user()->name,
				'email'   => auth()->user()->email,

			]);
		$news->save();

		flash("Merci pour les infos ! A bientôt !")->success();
		return redirect('news');

	}

	public function view($id) {

		$news = \App\News::where('id', $id)->get();
		return view('news', compact('news'));
	}

	public function delete($id) {

		\App\News::where('id', $id)->delete();
		flash("Ton article a été supprimé. On se recroise bientôt !")->success();
		return redirect()->route('news', compact('news'));
	}

}
