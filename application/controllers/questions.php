<?php

class Questions_Controller extends Base_Controller {
	public $restful = true;

	public function get_index() 
	{
		return View::make('questions.index')
			->with('title', 'Make it snappy Q&A - Home');
	}
}