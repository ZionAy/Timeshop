<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session, Hash;

class Client extends Model {
	# Role-Clients relation
	public function role() {
		return $this->belongsTo('App\Models\Role');
	}
	
	# Client-Orders relation
	public function orders() {
		return $this->hasMany('App\Models\Order');
	}
	
	# Verify login details
	static public function checkLogin($email, $pass) {
		$valid = false;
		$client = self::with('role')
			->where('email', '=', $email)
			->first();
		if ($client) {
			if (Hash::check($pass, $client->password)) {
				$valid = true;
				Session::put('client_name', $client->name);
				Session::put('client_id', $client->id);
				if ($client->role->name == 'Admin') {
					Session::put('is_admin', true);
				}
				Session::flash('sm', 'Welcome back, ' . $client->name . '. You are now logged in.');
			}
		}
		return $valid;
	}
	
	# Register new client
	static public function newClient($request) {
		$client = new self();
		$client->name = $request['name'];
		$client->email = $request['email'];
		$client->password = bcrypt($request['password']);
		$client->avatar = 'guestAvatar.jpg';
		$client->role_id = Role::getIDByName('Regular');
		$client->save();
		Session::put('client_name', $client->name);
		Session::put('client_id', $client->id);
		Session::flash('sm', $request['name'] . ', You registered successfully.');
	}
	
	# Change avatar on my profile page
	static public function changeAvatar($request) {
		$img_name = MyShop::image_upload($request, 'profiles', true);
		$client = self::find(Session::get('client_id'));
		$client->avatar = $img_name;
		$client->save();
		Session::flash('sm', $client->name . ', Your avatar was changed successfully.');
	}
	
}
