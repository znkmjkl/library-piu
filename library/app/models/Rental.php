<?php

class Rental extends Eloquent
{
	protected $table = 'rental';

	protected $fillable = array('rtl_bok_id', 'rtl_usr_id', 'rtl_start_date', 'rtl_end_date' );

	public function fine()
	{
		return $this->belongsToMany('fine');
	}

	public function book()
	{
		return $this->hasOne('book');
	}

	public function user()
	{
		return $this->hasOne('user');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getBookId()     { return $this->rtl_bok_id; }
	public function getUserId()     { return $this->rtl_usr_id; }
	public function getStartDate()  { return $this->rtl_start_date; }
	public function getEndDate()    { return $this->rtl_end_date; }
	
	public function setBookId($value)    { $this->rtl_bok_id = $value; }
	public function setUserId($value)    { $this->rtl_usr_id = $value; }
	public function setStartDate($value) { $this->rtl_start_date = $value; }
	public function setEndDate($value)   { $this->rtl_end_date = $value; }

	public static $rules = array('rtl_bok_id'=>'required|integer|min:0',
				     'rtl_usr_id'=>'required|integer|min:0',
				     'rtl_start_date'=>'required|date',
				     'rtl_end_date'=>'required|date'
				    );
}
?>
