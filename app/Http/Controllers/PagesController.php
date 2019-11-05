<?php

namespace App\Http\Controllers;

use App\Http\Requests\PageRequest;
use App\Models\Page;
use Session;

class PagesController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Homepage
	public function home() {
		self::$data['title'] .= 'Home';
		return view('pages.home', self::$data);
	}
	
	# General pages
	public function page($url) {
		self::$data['page'] = Page::getPage($url);
		if (!self::$data['page']) {
			abort(404);
		}
		self::$data['title'] .= self::$data['page']->title;
		return view('pages.general', self::$data);
	}
	
	# Resource functions (for admins)
	// Pages list
	public function index() {
		self::$data['title'] .= 'Admin - Pages list';
		self::$data['pages'] = Page::all();
		return view('admin.pages.list', self::$data);
	}
	
	// Create new page
	public function create() {
		self::$data['title'] .= 'Admin - Create page';
		return view('admin.pages.create', self::$data);
	}
	
	public function store(PageRequest $request) {
		Page::newPage($request);
		return redirect('admin/pages');
	}
	
	// Show page details
	/*public function show($id)
	{
		//
	}*/
	
	// Edit Page details
	public function edit($id) {
		self::$data['title'] .= 'Admin - Edit page';
		self::$data['page'] = Page::find($id);
		return view('admin.pages.edit', self::$data);
	}
	
	public function update(PageRequest $request, $id) {
		Page::updatePage($request, $id);
		return redirect('admin/pages');
	}
	
	// Delete Page
	public function destroy($id) {
		Page::destroy($id);
		Session::flash('sm', 'The page has been deleted successfully.');
		return redirect('admin/pages');
	}
}
