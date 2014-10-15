<?php

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;

class Contact extends SleepingOwlModel implements ModelWithImageFieldsInterface
{
	use ModelWithImageOrFileFieldsTrait;

	protected $fillable = [
		'firstName',
		'lastName',
		'photo',
		'birthday',
		'phone',
		'address',
		'country_id',
		'comment',
		'companies'
	];

	protected $hidden = [
		'created_at',
		'updated_at'
	];

	public function getValidationRules()
	{
		return [
			'firstName'  => 'required',
			'lastName'   => 'required',
			'photo'      => 'image',
			'country_id' => 'required|exists:countries,id'
		];
	}

	public function getImageFields()
	{
		return [
			'photo' => 'contacts/'
		];
	}

	public function country()
	{
		return $this->belongsTo('Country');
	}

	public function companies()
	{
		return $this->belongsToMany('Company');
	}

	public function getFullNameAttribute()
	{
		return implode(' ', [
			$this->firstName,
			$this->lastName
		]);
	}

	public function getDates()
	{
		return array_merge(parent::getDates(), ['birthday']);
	}

	public function setCompaniesAttribute($companies)
	{
		$this->companies()->detach();
		if ( ! $companies) return;

		if ( ! $this->exists) $this->save();

		$this->companies()->attach($companies);
	}

}