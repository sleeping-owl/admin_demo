<?php

Admin::model('\Country')->title('Countries')->with('contacts')->filters(function ()
{

})->columns(function ()
{
	Column::string('title', 'Title');
	Column::count('contacts', 'Contacts')->append(Column::filter('country_id')->model('\Contact'));
})->form(function ()
{
	FormItem::text('title', 'Title');
});