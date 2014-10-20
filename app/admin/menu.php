<?php

/*
 * Describe your menu here.
 *
 * There is some simple examples what you can use:
 *
 * 		Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('\AdminController@getIndex');
 * 		Admin::menu(User::class)->icon('fa-user');
 * 		Admin::menu()->label('Menu with subitems')->icon('fa-book')->items(function ()
 * 		{
 * 			Admin::menu(\Foo\Bar::class)->icon('fa-sitemap');
 * 			Admin::menu('\Foo\Baz')->label('Overwrite model title');
 * 			Admin::menu()->url('my-page')->label('My custom page')->uses('\MyController@getMyPage');
 * 		});
 */
Admin::menu()->url('/')->label('Start page')->icon('fa-dashboard')->uses('AdminController@getIndex');
Admin::menu('\Contact')->icon('fa-users');
Admin::menu('\Company')->icon('fa-building');
Admin::menu('\Country')->icon('fa-globe');
Admin::menu()->label('Custom')->icon('fa-bookmark')->items(function ()
{
	Admin::menu()->url('my_second_admin_page')->label('Custom admin page')->uses('AdminController@getSecond');
	Admin::menu()->url('subdir/demo')->label('Custom url')->uses('AdminController@getThird');
});