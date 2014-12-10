<?php

class Kind extends Eloquent
{
	protected $table = 'kind';

	protected $fillable = array('knd_name');

	public function book()
	{
		return $this->belongsToMany('book');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getName()       { return $this->knd_name; }

	public function setName($value) { $this->name = $value; }

	public static $rules = array('knd_name'=>'required|alpha|between:1, 100'
				    );
}
?>
