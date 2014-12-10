<?php

class Language extends Eloquent
{
	protected $table = 'language';

	protected $fillable = array('name' );

	public function book()
	{
		return $this->belongsToMany('book');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getName()       { return $this->name; }
	
	public function setName($value)      { $this->name = $value; }

	public static $rules = array('language'=>'required|alpha_num|between:2,100'
				    );
}
?>
