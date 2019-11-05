<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session, Cart;

class Product extends Model {
	# Category-Products relation
	public function category() {
		return $this->belongsTo('App\Models\Category');
	}
	
	# Get url of product - include category url
	public function fullUrl() {
		return $this->category->url . '/' . $this->url;
	}
	
	# Get last added products (for last arrivals)
	static public function getLastProducts($count = 0) {
		$last = self::has('category')
			->orderByDesc('created_at')
			->take($count)
			->get();
		return $last;
	}
	
	# Get random sale (for ads)
	static public function getRandomSale($count = 0) {
		$randomSale = self::inRandomOrder()
			->take($count)
			->get();
		return $randomSale;
	}
	
	# Get product details
	static public function getProduct($curl, $purl) {
		$product = self::where('url', '=', $purl)
			->with(['category' => function ($query) use ($curl) { // "use" is for passing data to the function.
				$query->where('url', '=', $curl);
			}])
			->get()
			->first();
		return $product;
	}
	
	# Create new content
	static public function newProduct($request) {
		$img_name = MyShop::image_upload($request, 'products');
		$product = new self();
		$product->category_id = $request['category_id'];
		$product->name = $request['name'];
		$product->description = $request['description'];
		$product->price = $request['price'];
		$product->url = $request['url'];
		$product->image = $img_name;
		$product->save();
		Session::flash('sm', 'New product named ' . $product->name . ' was created successfully under ' . $product->category->name . ' category.');
	}
	
	# Update page
	static public function updateProduct($request, $id) {
		$img_name = MyShop::image_upload($request, 'products', true);
		$product = self::find($id);
		$product->category_id = $request['category_id'];
		$product->name = $request['name'];
		$product->description = $request['description'];
		$product->price = $request['price'];
		$product->url = $request['url'];
		if ($img_name) {
			$product->image = $img_name;
		}
		$product->save();
		Session::flash('sm', 'The product ' . $product->name . ' was updated successfully.');
	}
	
	# Add product to cart - if exists -> quantity+1
	static public function addToCart($pid) {
		if ($product = self::find($pid)) {
			if (!Cart::get($pid)) {
				Cart::add($pid, $product->name, $product->price, 1, ['image' => $product->image, 'url' =>
					$product->fullUrl()]);
				Session::flash('sm', 'The product ' . $product->name . ' has been added to your cart.');
			}
		}
	}
	
	# Update the quantity of item in cart
	static public function updateCart($request) {
		if (!empty($request['op']) && !empty($request['pid'])) {
			if (is_numeric($request['pid'])) {
				if ($product = Cart::get($request['pid'])) {
					$product = $product->toArray();
					if ($request['op'] == 'plus') {
						Cart::update($request['pid'], ['quantity' => 1]);
					} elseif ($request['op'] == 'minus' && $product['quantity'] > 1) {
						Cart::update($request['pid'], ['quantity' => -1]);
					}
					Session::flash('sm', 'The quantity was changed successfully.');
				}
			}
		}
	}
	
	# Remove product from cart
	static public function removeFromCart($pid) {
		if (Cart::get($pid)) {
			Cart::remove($pid);
			Session::flash('sm', 'The product has been deleted from your cart successfully.');
		}
	}
	
}
