<?php

class Book extends Eloquent
{
	protected $table = 'book';

	protected $fillable = array('bok_isbn', 'bok_title', 'lng_id', 'bok_atr_id', 'bok_knd_id', 'bok_edition_date',  'bok_edition_number' );

	public function rental()
	{
		return $this->belongsToMany('renta');
	}

	public function reservation()
	{
		return $this->belongsToMany('reservation');
	}

	public function language()
	{
		return $this->hasOne('language');
	}

	public function author()
	{
		return $this->hasMany('author');
	}

	public function kind()
	{
		return $this->hasMany('kind');
	}

	public function getIdentifier()    { return $this->getKey(); }
	public function getIsbn()          { return $this->bok_isbn; }
	public function getTitle()         { return $this->bok_title; }
	public function getLanguageId()    { return $this->lng_id; }
	public function getAuthorId()      { return $this->bok_atr_id; }
	public function getKindId()        { return $this->bok_knd_id; }
	public function getEditionDate()   { return $this->bok_edition_date; }
	public function getEditionNumber() { return $this->bok_edition_number};
	
	public function setName($value)          { $this->usr_name = $value; }
	public function setIsbn($value)          { $this->bok_isbn = $value; }
	public function setTitle($value)         { $this->bok_title = $value; }
	public function setLanguageId($value)    { $this->lng_id = $value; }
	public function setAuthorId($value)      { $this->bok_atr_id = $value; }
	public function setKindId($value)        { $this->bok_knd_id = $value; }
	public function setEditionDate($value)   { $this->bok_edition_date = $value; }
	public function setEditionNumber($value) { $this->bok_edition_number = $value; }

	public static $rules = array('bok_isbn'=>'required|alpha|between:13, 13',
				     'bok_title'=>'required|alpha|between:2, 200',
				     'lng_id'=>'required|integer|min:0',
				     'bok_atr_id'=>'required|integer|min:0',
				     'bok_knd_id'=>'required|integer|min:0',
				     'bok_edition_date'=>'required|date',
				     'bok_edition_number'=>'required|integer|min:0'
				    );
}
?>
