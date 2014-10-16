<?php 

class AdminController extends \Controller
{

	public function getIndex()
	{
		return View::make('admin.index');
	}

	public function getSecond()
	{
		$method = str_replace('::', '@', __METHOD__);
		return View::make('admin.second', compact('method'));
	}

	public function getThird()
	{
		$method = str_replace('::', '@', __METHOD__);
		return View::make('admin.second', compact('method'));
	}

} 