<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Session;

class CategoriesController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Resource functions (for admins)
	// Categories list
	public function index() {
		self::$data['title'] .= 'Admin - Categories list';
		self::$data['categories'] = Category::all();
		return view('admin.categories.list', self::$data);
	}
	
	// Create new category
	public function create() {
		self::$data['title'] .= 'Admin - Create category';
		return view('admin.categories.create', self::$data);
	}
	
	public function store(CategoryRequest $request) {
		Category::newCategory($request);
		return redirect('admin/categories');
	}
	
	// Show category details
	/*public function show($id)
	{
		//
	}*/
	
	// Edit category details
	public function edit($id) {
		self::$data['title'] .= 'Admin - Edit category';
		self::$data['category'] = Category::find($id);
		return view('admin.categories.edit', self::$data);
	}
	
	public function update(CategoryRequest $request, $id) {
		Category::updateCategory($request, $id);
		return redirect('admin/categories');
	}
	
	// Delete category
	public function destroy($id) {
		Category::destroy($id);
		Session::flash('sm', 'The category has been deleted successfully.');
		return redirect('admin/categories');
	}
}
