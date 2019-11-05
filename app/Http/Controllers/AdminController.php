<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Dashboard page
	public function dashboard() {
		self::$data['title'] .= 'Admin - Dashboard';
		return view('admin.dashboard', self::$data);
	}
	
	# Orders list page
	public function orders() {
		self::$data['title'] .= 'Admin - Orders list';
		self::$data['orders'] = Order::all();
		return view('admin.orders', self::$data);
	}
}
