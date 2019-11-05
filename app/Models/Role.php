<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	# Role-Clients relation
	public function clients() {
		return $this->hasMany('App\Models\Client');
	}
	
	# Get role id by name (for new clients or admin change)
	static public function getIDByName($role) {
		$id = self::where('name', '=', $role)
			->first(['id']);
		return $id->id;
	}
}
