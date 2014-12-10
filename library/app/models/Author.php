<?php

class Author extends Eloquent
{
	protected $table = 'author';

	protected $fillable = array('atr_name', 'atr_surname', 'atr_bitrh_date' );

	public function book()
	{
		return $this->belongsToMany('book');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getName()       { return $this->atr_name; }
	public function getSurname()    { return $this->atr_surname; }
	public function getBirthDate()  { return $this->atr_birth_date; }
	
	public function setName($value)      { $this->atr_name = $value; }
	public function setSurname($value)   { $this->atr_surname = $value; }
	public function setBirthDate($value) { $this->atr_birth_date = $value; }

	public static $rules = array('atr_name'=>'required|alpha|between:2,100',
				     'atr_surname'=>'required|alpha|between:2,100',
				     'atr_birth_date'=>'required|date'
				    );
}
?>
