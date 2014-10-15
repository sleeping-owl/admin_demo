<?php namespace Demo;

use DB;
use Session;
use SleepingOwl\Admin\Repositories\ModelRepository;

/*
 * This is demo model repository.
 *
 * You don't have to use it in your application
 */

class AdminModelRepository extends ModelRepository
{
	protected $message = 'This is a demo application. You can\'t create, edit or destroy entries.';

	protected function save()
	{
		// Perform save in transaction, so we can load instance as it been saved successfully and rollback changes.
		DB::beginTransaction();
		parent::save();
		if ($this->instance instanceof \Contact)
		{
			$this->instance = $this->instance->with('country', 'companies')->find($this->instance->id);
		}
		if ($this->instance instanceof \Company)
		{
			$this->instance = $this->instance->with('contacts')->find($this->instance->id);
		}
		DB::rollBack();
		if ($photo = $this->instance->photo)
		{
			// Delete uploaded file
			$photo->delete();
		}
		Session::flash('message', $this->message . '<br/><br/>You have tried to save this object into database:<br/><br/>' . $this->instance);
	}

	public function destroy($id)
	{
		$object = $this->find($id);
		Session::flash('message', $this->message . '<br/><br/>You have tried to delete this object:<br/><br/>' . $object);
	}

}