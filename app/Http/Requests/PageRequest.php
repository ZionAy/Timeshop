<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PageRequest extends FormRequest {
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
	public function rules(Request $request) {
		$page_id = !empty($request['page_id']) ? ',' . $request['page_id'] : '';
		return [
			'name' => 'required',
			'title' => 'required',
			'url' => 'required|regex:/^[a-z\d-]+$/|unique:pages,url' . $page_id
		];
	}
	
	public function messages() {
		return [
			'name.required' => 'Name is mandatory field.',
			'title.required' => 'Title is mandatory field.',
			'url.required' => 'URL is mandatory field.',
			'url.regex' => 'URL must be lowercase letters, digits and hyphens only.',
			'url.unique' => 'This URL is already in use.',
		];
	}
}
