<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest {
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
			'log_email' => 'required|email',
			'log_password' => 'required'
		];
	}
	
	public function messages() {
		return [
			'log_email.required' => 'Email is mandatory field.',
			'log_email.email' => 'Email address is not valid.',
			'log_password.required' => 'Password is mandatory field.',
		];
	}
}
