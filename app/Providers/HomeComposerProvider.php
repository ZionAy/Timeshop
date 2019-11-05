<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HomeComposerProvider extends ServiceProvider {
	public function boot() {
		//
	}
	
	public function register() {
		$this->composeHome();
	}
	
	public function composeHome() {
		view()->composer(['pages.home'], 'App\ViewComposers\HomeComposer');
	}
}