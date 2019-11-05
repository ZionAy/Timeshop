<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContentRequest;
use App\Models\Content;
use App\Models\Page;
use Session;

class ContentsController extends MainController {
	# constructor
	function __construct() {
		parent::__construct();
		//
	}
	
	# Resource functions (for admins)
	// Contents list
	public function index() {
		self::$data['title'] .= 'Admin - Contents list';
		self::$data['contents'] = Content::all();
		return view('admin.contents.list', self::$data);
	}
	
	// Create new content
	public function create() {
		self::$data['title'] .= 'Admin - Create content';
		self::$data['pages'] = Page::all();
		return view('admin.contents.create', self::$data);
	}
	
	public function store(ContentRequest $request) {
		Content::newContent($request);
		return redirect('admin/contents');
	}
	// Show page details
	/*public function show($id)
	{
		//
	}*/
	
	// Edit content details
	public function edit($id) {
		self::$data['title'] .= 'Admin - Edit content';
		self::$data['content'] = Content::find($id);
		self::$data['pages'] = Page::all();
		return view('admin.contents.edit', self::$data);
	}
	
	public function update(ContentRequest $request, $id) {
		Content::updateContent($request, $id);
		return redirect('admin/contents');
	}
	
	// Delete content
	public function destroy($id) {
		Content::destroy($id);
		Session::flash('sm', 'The content has been deleted successfully.');
		return redirect('admin/contents');
	}
}
