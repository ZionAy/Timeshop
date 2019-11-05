<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\Category;
use Session;

class ProductsController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Resource functions (for admins)
	// Products list
	public function index() {
		self::$data['title'] .= 'Admin - Products list';
		self::$data['products'] = Product::all();
		return view('admin.products.list', self::$data);
	}
	
	// Create new product
	public function create() {
		self::$data['title'] .= 'Admin - Create product';
		self::$data['categories'] = Category::all();
		return view('admin.products.create', self::$data);
	}
	
	public function store(ProductRequest $request) {
		Product::newProduct($request);
		return redirect('admin/products');
	}
	
	// Show product details
	/*public function show($id)
	{
		//
	}*/
	
	// Edit product details
	public function edit($id) {
		self::$data['title'] .= 'Admin - Edit product';
		self::$data['product'] = Product::find($id);
		self::$data['categories'] = Category::all();
		return view('admin.products.edit', self::$data);
	}
	
	public function update(ProductRequest $request, $id) {
		Product::updateProduct($request, $id);
		return redirect('admin/products');
	}
	
	// Delete product
	public function destroy($id) {
		Product::destroy($id);
		Session::flash('sm', 'The product has been deleted successfully.');
		return redirect('admin/products');
	}
}
