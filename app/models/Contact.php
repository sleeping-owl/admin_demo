<?php

use SleepingOwl\Models\Interfaces\ModelWithImageFieldsInterface;
use SleepingOwl\Models\SleepingOwlModel;
use SleepingOwl\Models\Traits\ModelWithImageOrFileFieldsTrait;
use Symfony\Component\HttpFoundation\File\UploadedFile;

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

	/*
	 * This is only for demo application to disable file uploads
	 */
	public function setImage($field, $image)
	{
		if ($image == null) return;
		$filename = $image;
		if ($image instanceof UploadedFile)
		{
			$filename = $this->getFilenameFromFile($field, $image);
			$this->$field->setFilename($filename);
		}
		$this->attributes[$field] = $filename;
	}

	public function scopeWithoutCompanies($query)
	{
		return $query->whereRaw('(select count(*) from company_contact where contact_id=contacts.id)=0');
	}

}