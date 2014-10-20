<?php

Admin::model('\Company')->title('Companies')->with('contacts')->columns(function ()
{
	Column::string('title', 'Title');
	Column::string('address', 'Address');
	Column::string('phone', 'Phone');
	Column::lists('contacts.full_name', 'Contacts');
})->form(function ()
{
	FormItem::text('title', 'Title')->required()->unique();
	FormItem::text('address', 'Address');
	FormItem::text('phone', 'Phone');
});