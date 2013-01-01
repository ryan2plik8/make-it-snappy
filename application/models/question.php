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

	public static function unsolved()
	{
		return static::where('solved', '=', 0)
					   ->order_by('id', 'DESC')
					   ->paginate(3);
	}
	
	public static function your_questions()
	{
		return static::where('user_id', '=', Auth::user()->id)->paginate(3);
	}
}