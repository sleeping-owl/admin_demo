<?php

Admin::model('\Contact')->title('Contacts')->with('country', 'companies')->filters(function ()
{
	ModelItem::filter('country_id')->title()->from('\Country');
	ModelItem::filter('withoutCompanies')->scope('withoutCompanies')->title('without companies');
})->columns(function ()
{
	Column::image('photo')->sortable(false);
	Column::string('full_name', 'Name')->orderBy('lastName')->sortableDefault();
	Column::date('birthday', 'Birthday')->format('medium', 'none');
	Column::string('country.title', 'Country')->append(Column::filter('country_id')->value('country.id'));
	Column::lists('companies.title', 'Companies');
	Column::action('show', 'Custom action')->target('_blank')->icon('fa-globe')->style('long')->callback(function ($instance)
	{
		echo 'You are trying to call custom action "show" with row id "' . $instance->id . '"';
		die;
	});
})->form(function ()
{
	FormItem::text('firstName', 'First Name')->required();
	FormItem::text('lastName', 'Last Name')->required();
	FormItem::image('photo', 'Photo');
	FormItem::date('birthday', 'Birthday');
	FormItem::text('phone', 'Phone');
	FormItem::text('address', 'Address');
	FormItem::select('country_id', 'Country')->list('\Country')->required();
	FormItem::multiSelect('companies', 'Companies')->list('\Company')->value('companies.company_id');
	FormItem::ckeditor('comment', 'Comment');
	FormItem::view('admin.form.comment');
});