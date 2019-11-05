<?php
/**
 * Created by PhpStorm.
 * User: Zion
 * Date: 28/04/2018
 * Time: 22:43
 */

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Category;

class HomeComposer {
	public function compose(View $view) {
		$view->with('homeData', $this->homeData());
	}
	
	private function homeData() {
		$data['topCat'] = Category::getTopCategories();
		return $data;
	}
}