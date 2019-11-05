<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest {
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
			'name' => 'required|min:2|max:70',
			'email' => 'required|email|unique:clients,email',
			'password' => 'required|min:6|max:16|confirmed'
		];
	}
	
	public function messages() {
		return [
			'name.required' => 'Name is mandatory field.',
			'name.min' => 'Name must be 2-70 chcaraters long.',
			'name.max' => 'Name must be 2-70 chcaraters long.',
			'email.required' => 'Email is mandatory field.',
			'email.email' => 'Email address is not valid.',
			'email.unique' => 'Email address is already taken.',
			'password.required' => 'Password is mandatory field.',
			'password.min' => 'Password must be 6-16 characters long.',
			'password.max' => 'Password must be 6-16 characters long.',
			'password.confirmed' => 'Password and Password confirmation do not match.',
		];
	}
}
