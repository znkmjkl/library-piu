<?php

class Librarian extends Eloquent 
{
	protected $table = 'librarian';

	protected $fillable = array('usr_id');

	public function user()
	{
		return $this->hasOne('user');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getUserId()     { return $this->user_id; }

	public function setUserId($value) { $this->user_id = $value; }

	public static $rules = array('user_id'=>'required|integer|min:0'
				    );
}
?>
