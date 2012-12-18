<?php

class Questions_Controller extends Base_Controller {
	public $restful = true;

	public function __contruct()
	{
		$this->filter('before', 'auth')->only(array('create'));
	}

	public function get_index() 
	{
		return View::make('questions.index')
			->with('title', 'Make it snappy Q&A - Home');
	}

	public function post_create()
	{
		$validation = Question::validate(Input::all());
		if($validation->passes())
		{
			Question::create(array(
				'question' => Input::get('question'),
				'user_id' => Auth::user()->id
			));
			return Redirect::to_route('home')->with('message', 'Your question has been posted');
		} else {
			return Redirect::to_route('home')->with_errors($validation)->with_input();
		}
	}
}