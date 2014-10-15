<?php

Admin::model(Country::class)->title('Countries')->with('contacts')->filters(function ()
{

})->columns(function ()
{
	Column::string('title', 'Title');
	Column::count('contacts', 'Contacts')->append(Column::filter('country_id')->model(Contact::class));
})->form(function ()
{
	FormItem::text('title', 'Title');
});