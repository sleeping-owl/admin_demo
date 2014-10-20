<?php

use SleepingOwl\Models\SleepingOwlModel;

class Country extends SleepingOwlModel
{

	protected $fillable = ['title'];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function scopeDefaultSort($query)
	{
		return $query->orderBy('title', 'asc');
	}

	public function contacts()
	{
		return $this->hasMany('Contact');
	}

	public static function getList()
	{
		return static::lists('title', 'id');
	}

}