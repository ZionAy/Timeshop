<?php
/**
 * Created by PhpStorm.
 * User: Zion
 * Date: 12/04/2018
 * Time: 05:41
 */

namespace App\ViewComposers;

use Illuminate\Contracts\View\View;
use App\Models\Category;
use App\Models\Page;
use App\Models\Product;
use App\Models\Client;
use Session;

class HeaderComposer {
	public function compose(View $view) {
		$view->with('headerData', $this->headerData());
	}
	
	private function headerData() {
		$data = [];
		$data['topMenu'] = Page::getActivePages();
		$data['shopCat'] = Category::getActiveCategories();
		$data['lastProd'] = Product::getLastProducts(4);
		$data['sales'] = Product::getRandomSale(1);
		$data['client'] = null;
		if (Session::has('client_id')) {
			$data['client'] = Client::find(Session::get('client_id'));
		}
		return $data;
	}
}