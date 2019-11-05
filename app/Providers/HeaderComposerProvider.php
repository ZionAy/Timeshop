<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HeaderComposerProvider extends ServiceProvider {
	public function boot() {
		//
	}
	
	public function register() {
		$this->composeHeader();
	}
	
	public function composeHeader() {
		view()->composer(['partials.header', 'shop.sidebar', 'partials.shop_modal'], 'App\ViewComposers\HeaderComposer');
	}
}
