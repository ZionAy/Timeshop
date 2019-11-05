<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProductRequest extends FormRequest {
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
		$product_id = !empty($request['product_id']) ? ',' . $request['product_id'] : '';
		return [
			'category_id' => 'required|exists:categories,id',
			'name' => 'required',
			'description' => 'required',
			'price' => 'required|numeric|min:0',
			'url' => 'required|regex:/^[a-z\d-]+$/|unique:categories,url' . $product_id,
			'image' => 'image',
		];
	}
	
	public function messages() {
		return [
			'category_id.required' => 'In category is mandatory field',
			'category_id.exists' => 'Something went wrong, try again',
			'name.required' => 'Name is mandatory field.',
			'description.required' => 'Description is mandatory field.',
			'price.required' => 'Price is mandatory field',
			'price.numeric' => 'Price must be numeric value.',
			'price.min' => 'Price can not be negative.',
			'url.required' => 'URL is mandatory field.',
			'url.regex' => 'URL must be lowercase letters, digits and hyphens only.',
			'url.unique' => 'This URL is already in use.',
			'image.image' => 'File must be an image file.',
		];
	}
}
