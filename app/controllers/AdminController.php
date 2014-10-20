<?php 

class AdminController extends \Controller
{

	public function getIndex()
	{
		$contactsWithoutCompaniesCount = Contact::withoutCompanies()->count();

		$contactsByCountries = [];
		$rows = Country::with('contacts')->get();
		foreach ($rows as $row)
		{
			$obj = new StdClass;
			$obj->label = $row->title;
			$obj->value = $row->contacts->count();
			$contactsByCountries[] = $obj;
		}

		$contactsByCompanies = [];
		$rows = Company::with('contacts')->get();
		foreach ($rows as $row)
		{
			$obj = new StdClass;
			$obj->label = $row->title;
			$obj->value = $row->contacts->count();
			$contactsByCompanies[] = $obj;
		}

		$contactsCount = Contact::count();
		$companiesCount = Company::count();
		$countriesCount = Country::count();

		$data = compact('contactsWithoutCompaniesCount', 'contactsByCompanies', 'contactsByCountries', 'contactsCount', 'companiesCount', 'countriesCount');

		return View::make('admin.index', $data);
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