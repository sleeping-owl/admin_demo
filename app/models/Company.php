<?php

use SleepingOwl\Models\SleepingOwlModel;

class Company extends SleepingOwlModel
{

	public static function boot()
	{
		parent::boot();

		static::deleting(function ($item)
		{
			dd('Deleting event handler executed on item #' . $item->id);
		});
	}

	protected $fillable = [
		'title',
		'address',
		'phone'
	];

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
		return $this->belongsToMany('Contact');
	}

	public static function getList()
	{
		return static::lists('title', 'id');
	}

}