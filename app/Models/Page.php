<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Page extends Model {
	# Page-Contents relation
	public function contents() {
		return $this->hasMany('App\Models\Content');
	}
	
	# Get only pages that have contents
	static public function getActivePages() {
		$pages = self::has('contents')
			->get();
		return $pages;
	}
	
	# Get page data with its content
	static public function getPage($url) {
		$page = self::where('url', '=', $url)
			->with('contents')
			->first();
		return $page;
	}
	
	# Create new page
	static public function newPage($request) {
		$page = new self();
		$page->name = $request['name'];
		$page->title = $request['title'];
		$page->url = $request['url'];
		$page->save();
		Session::flash('sm', 'New page named ' . $page->title . ' was created successfully.');
	}
	
	# Update page
	static public function updatePage($request, $id) {
		$page = self::find($id);
		$page->name = $request['name'];
		$page->title = $request['title'];
		$page->url = $request['url'];
		$page->save();
		Session::flash('sm', 'The page ' . $page->title . ' was updated successfully.');
	}
}
