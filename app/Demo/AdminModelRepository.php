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
	protected $message = 'This is a demo application. You can\'t create, edit or delete entries.';

	protected function save()
	{
		// Perform save in transaction, so we can load instance as it been saved successfully and rollback changes.
		DB::beginTransaction();
		parent::save();
		$this->instance = $this->instance->with($this->modelItem->getWith())->find($this->instance->id);
		DB::rollBack();
		$this->setMessage($this->instance);
	}

	public function destroy($id)
	{
		$object = $this->find($id);
		$this->setMessage($object);
	}

	protected function setMessage($instance)
	{
		$message = $this->message . '<br/><br/>You have tried to create, edit or delete this object:<br/><br/>';
		$message .= '<pre>' . htmlentities(json_encode($instance, JSON_PRETTY_PRINT)) . '</pre>';
		Session::flash('message', $message);
	}

}