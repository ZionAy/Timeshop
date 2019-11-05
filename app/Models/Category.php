<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Category extends Model {
	# DB table for this model.
	protected $table = 'categories';
	
	# Category-Products relation
	public function products() {
		return $this->hasMany('App\Models\Product');
	}
	
	# Get only categories that have products
	static public function getActiveCategories() {
		$categories = self::has('products')
			->select(['name', 'url', 'image'])
			->withCount('products')
			->get();
		return $categories;
	}
	
	# Get only top 3 categories that have products (for home page)
	static public function getTopCategories() {
		$categories = self::has('products')
			->select(['name', 'url', 'image'])
			->take(3)
			->get();
		return $categories;
	}
	
	# Get category
	static public function getCategory($url, $request) {
		$category = self::where('url', '=', $url)
			->with(['products' => function ($query) use ($request) {
				if (!empty($request['sort']) && ($request['sort'] == 'desc')) { // Sorting by price
					$query->orderByDesc('price');
				} else {
					$query->orderBy('price');
				}
			}])
			->get()
			->first();
		return $category;
	}
	
	# Create new category
	static public function newCategory($request) {
		$img_name = MyShop::image_upload($request, 'categories');
		$category = new self();
		$category->name = $request['name'];
		$category->description = $request['description'];
		$category->url = $request['url'];
		$category->image = $img_name;
		$category->save();
		Session::flash('sm', 'New category named ' . $category->name . ' was created successfully.');
		
	}
	
	# Update category
	static public function updateCategory($request, $id) {
		$img_name = MyShop::image_upload($request, 'categories', true);
		$category = self::find($id);
		$category->name = $request['name'];
		$category->description = $request['description'];
		$category->url = $request['url'];
		if ($img_name) {
			$category->image = $img_name;
		}
		$category->save();
		Session::flash('sm', 'The category named ' . $category->name . ' was updated successfully.');
	}
	
}
