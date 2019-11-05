<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Session;

class Content extends Model {
	# Page-Contents relation
	public function page() {
		return $this->belongsTo('App\Models\Page');
	}
	
	# Create new content
	static public function newContent($request) {
		$content = new self();
		$content->page_id = $request['page_id'];
		$content->title = $request['title'];
		$content->article = $request['article'];
		$content->save();
		Session::flash('sm', 'New content named ' . $content->title . ' was created successfully under ' . $content->page->name . ' page.');
	}
	
	# Update content
	static public function updateContent($request, $id) {
		$content = self::find($id);
		$content->page_id = $request['page_id'];
		$content->title = $request['title'];
		$content->article = $request['article'];
		$content->save();
		Session::flash('sm', 'The content named ' . $content->title . ' was updated successfully.');
	}
}
