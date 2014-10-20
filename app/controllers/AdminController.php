<?php 

class AdminController extends \Controller
{

	public function getIndex()
	{
		$contactsWithoutCompaniesCount = Contact::withoutCompanies()->count();

		$contactsCountByCountry = [];
		$rows = Country::with('contacts')->get();
		foreach ($rows as $row)
		{
			$obj = new StdClass;
			$obj->label = $row->title;
			$obj->value = $row->contacts->count();
			$contactsCountByCountry[] = $obj;
		}

		return View::make('admin.index', compact('contactsWithoutCompaniesCount', 'contactsCountByCountry'));
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