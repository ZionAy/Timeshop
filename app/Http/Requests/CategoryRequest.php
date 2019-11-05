<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CategoryRequest extends FormRequest {
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
		$cat_id = !empty($request['category_id']) ? ',' . $request['category_id'] : '';
		return [
			'name' => 'required',
			'description' => 'required',
			'url' => 'required|regex:/^[a-z\d-]+$/|unique:categories,url' . $cat_id,
			'image' => 'image',
		];
	}
	
	public function messages() {
		return [
			'name.required' => 'Name is mandatory field.',
			'description.required' => 'Description is mandatory field.',
			'url.required' => 'URL is mandatory field.',
			'url.regex' => 'URL must be lowercase letters, digits and hyphens only.',
			'url.unique' => 'This URL is already in use.',
			'image.image' => 'File must be an image file.',
		];
	}
}
