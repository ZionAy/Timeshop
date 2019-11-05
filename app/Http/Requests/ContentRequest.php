<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest {
	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize() {
		return true;
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules() {
		return [
			'page_id' => 'required|exists:pages,id',
			'title' => 'required',
			'article' => 'required',
		];
	}
	
	public function messages() {
		return [
			'page_id.required' => 'Page is mandatory field.',
			'page_id.exists' => 'Something is wrong with the chosen page.',
			'title.required' => 'Title is mandatory field.',
			'article.required' => 'Article is mandatory field.',
		];
	}
}
