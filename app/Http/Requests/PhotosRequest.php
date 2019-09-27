<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PhotosRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'image' => 'max:8000',
		];
	}

	public function message() {
		return [
			'image' => 'La taille du fichier dépasse les 8Mo.'];
	}
}
