<?php

Admin::model('\Country')->title('Countries')->with('contacts')->columns(function ()
{
	Column::string('id', 'ID')->sortableDefault('desc');
	Column::string('title', 'Title');
	Column::count('contacts', 'Contacts')->append(Column::filter('country_id')->model('\Contact'));
})->form(function ()
{
	FormItem::text('title', 'Title')->required()->unique();
});