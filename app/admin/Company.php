<?php

Admin::model('\Company')->title('Companies')->with('contacts')->filters(function ()
{

})->columns(function ()
{
	Column::string('title', 'Title');
	Column::string('address', 'Address');
	Column::string('phone', 'Phone');
	Column::lists('contacts.full_name', 'Contacts');
})->form(function ()
{
	FormItem::text('title', 'Title');
	FormItem::text('address', 'Address');
	FormItem::text('phone', 'Phone');
});