<?php

Admin::model('\Contact')->title('Contacts')->with('country', 'companies')->filters(function ()
{
	ModelItem::filter('country_id')->title()->from(Country::class);
})->columns(function ()
{
	Column::image('photo')->sortable(false);
	Column::string('full_name', 'Name')->orderBy('lastName')->sortableDefault();
	Column::date('birthday', 'Birthday')->format('medium', 'none');
	Column::string('country.title', 'Country')->append(Column::filter('country_id')->value('country.id'));
	Column::lists('companies.title', 'Companies');
})->form(function ()
{
	FormItem::text('firstName', 'First Name');
	FormItem::text('lastName', 'Last Name');
	FormItem::image('photo', 'Photo');
	FormItem::date('birthday', 'Birthday');
	FormItem::text('phone', 'Phone');
	FormItem::text('address', 'Address');
	FormItem::select('country_id', 'Country')->list('\Country');
	FormItem::multiSelect('companies', 'Companies')->list('\Company')->value('companies.company_id');
	FormItem::ckeditor('comment', 'Comment');
	FormItem::view('admin.form.comment');
});