<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Session, Cart, stdClass;

class ShopController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Main shop page - categories list
	public function shop() {
		self::$data['title'] .= 'Shop';
		self::$data['categories'] = Category::getActiveCategories();
		return view('shop.shop', self::$data);
	}
	
	# Category shop page - products list
	public function category($url, Request $request) {
		self::$data['category'] = Category::getCategory($url, $request);
		if (!self::$data['category']) {
			abort(404);
		}
		self::$data['title'] .= self::$data['category']->name;
		return view('shop.category', self::$data);
	}
	
	# Product page - product details
	public function product($curl, $purl) {
		self::$data['product'] = Product::getProduct($curl, $purl);
		if (!self::$data['product']) {
			abort(404);
		}
		self::$data['title'] .= self::$data['product']->name;
		return view('shop.product', self::$data);
	}
	
	# Add product to cart
	public function addToCart(Request $request) {
		Product::addToCart($request['pid']);
	}
	
	# Cart page - show cart summary
	public function cart() {
		$cart = Cart::getContent()->sort();
		self::$data['cart'] = $cart;
		self::$data['title'] .= 'Cart';
		return view('shop.cart', self::$data);
	}
	
	# Update cart quantities (plus and minus buttons)
	public function updateCart(Request $request) {
		Product::updateCart($request);
	}
	
	# Remove product from cart
	public function removeFromCart(Request $request) {
		Product::removeFromCart($request['pid']);
	}
	
	# Clear the cart
	public function clearCart() {
		Cart::clear();
		Session::flash('sm', 'Your cart has been cleared successfully.');
		return redirect('shop/cart');
	}
	
	# Checkout page - 1 step before order complete
	public function checkout() {
		$cart = Cart::getContent()->sort();
		self::$data['cart'] = $cart;
		self::$data['title'] .= 'Checkout';
		return view('shop.checkout', self::$data);
	}
	
	# Complete the order
	public function order() {
		if (Cart::isEmpty()) {
			return redirect('shop/cart');
		} else {
			if (!Session::has('client_id')) {
				return redirect('account/login?rn=shop/checkout');
			} else {
				Order::newOrder();
				return redirect('shop');
			}
		}
	}
	
	# Search option - return the list of products that matches the pattern (uses jquery-ui autocomplete)
	public function search(Request $request) {
		$products = Product::select(['name', 'url', 'category_id'])
			->where('name', 'LIKE', '%' . $request['term'] . '%')
			->with(['category' => function ($query) {
				$query->select(['id', 'url']);
			}])
			->take(5)
			->get();
		$searchResults = []; // Jquery UI needs an array
		foreach ($products as $product) {
			$searchItem = new stdClass(); // The array with objects
			$searchItem->label = $product->name;
			$searchItem->value = $product->name; // No need for that, it uses label if not specified
			$searchItem->url = $product->fullUrl();
			$searchResults [] = $searchItem;
		}
		return response($searchResults);
	}
	
}
