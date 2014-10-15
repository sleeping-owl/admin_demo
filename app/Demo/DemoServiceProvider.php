<?php namespace Demo;

use Illuminate\Support\ServiceProvider;

class DemoServiceProvider extends ServiceProvider
{

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		/*
		 * Disable all writes to database (you dont need to implement this in you application)
		 */
		$this->app->bind('SleepingOwl\Admin\Repositories\Interfaces\ModelRepositoryInterface', 'Demo\AdminModelRepository');
	}
}