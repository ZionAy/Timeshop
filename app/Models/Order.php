<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session, Cart;

class Order extends Model {
	# Client-Orders relation
	public function client() {
		return $this->belongsTo('App\Models\Client');
	}
	
	# Create new order
	static public function newOrder() {
		$cartContent = Cart::getContent();
		$cart = $cartContent->toArray();
		$order = new self();
		$order->client_id = Session::get('client_id');
		$order->cart = serialize($cart); // Use serialize to save it in DB
		$order->total = Cart::getTotal();
		$order->save();
		Cart::clear(); // Clear the cart after success order.
		Session::flash('sm', 'Thank you, ' . $order->client->name . '. Your order has been approved.');
	}
}
