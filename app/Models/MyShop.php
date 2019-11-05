<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Image;

class MyShop extends Model
{
	# Image upload to server
	static public function image_upload($request, $directory, $edit = false) {
		$img_name = (!$edit) ? 'noImage.jpg' : '';
		if ($request->hasFile('image') && $request->file('image')->isValid()) {
			$file = $request->file('image');
			$img_name =  date('Y.m.d.H.i.s') . '_' . $file->getClientOriginalName();
			$img = Image::make($file);
			$img->resize(300, null, function($options) {
				$options->aspectRatio();
			});
			$img->save(public_path() . '/images/' . $directory . '/' . $img_name);
		}
		return $img_name;
	}
}
