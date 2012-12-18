<?php
class Question extends Basemodel {
	public static $rules = array(
			'question' => 'required|min:10|max:255',
			'solved' => 'in:0|1'
		);

	public function user()
	{
		return $this->belongs_to('User');
	}
}