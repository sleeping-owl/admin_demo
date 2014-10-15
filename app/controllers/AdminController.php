<?php 

class AdminController extends \Controller
{

	public function getIndex()
	{
		return View::make('admin.index');
	}

	public function getSecond()
	{
		return View::make('admin.second');
	}

} 