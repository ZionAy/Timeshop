<?php

namespace App\Http\Controllers;

use App\Http\Requests\AvatarRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\Client;
use Session;

class ClientController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//$this->middleware('signedguard', ['except' => ['logout']]);
	}
	
	# Login page
	public function login() {
		if (!Session::has('client_id')) {
			self::$data['title'] .= 'Account login';
			return view('account.login', self::$data);
		} else {
			return redirect('');
		}
	}
	
	# Sign in with e-mail and pass
	public function signin(LoginRequest $request) {
		$rn = (!empty($request['rn'])) ? $request['rn'] : '';
		if (Client::checkLogin($request['log_email'], $request['log_password'])) {
			return redirect($rn);
		} else {
			self::$data['title'] .= 'Account login';
			return view('account.login', self::$data)->withErrors(['log_email' => 'Wrong email or password.']);
		}
	}
	
	# Sign up (registration) to the website
	public function signup(RegisterRequest $request) {
		Client::newClient($request);
		return redirect('');
	}
	
	# Log out
	public function logout() {
		Session::flush();
		Session::flash('sm', 'You have been logged out successfully.');
		return redirect('account/login');
	}
	
	# My profile page
	public function profile() {
		if (!Session::has('client_id')) {
			return redirect('account/login');
		} else {
			self::$data['title'] .= 'My profile';
			self::$data['client'] = Client::find(Session::get('client_id'));
			return view('account.profile', self::$data);
		}
	}
	
	# Change avatar option on my profile page
	public function changeAvatar(AvatarRequest $request) {
		if (!Session::has('client_id')) {
			return redirect('account/login');
		} else {
			Client::changeAvatar($request);
			return redirect('account/profile');
		}
	}
	
}
