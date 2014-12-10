<?php

class Reservation extends Eloquent
{
	protected $table = 'reservation';

	protected $fillable = array('rvn_bok_id', 'rvn_usr_id', 'rvn_date', 'rvn_status' );

	public function book()
	{
		return $this->hasOne('book');
	}

	public function user()
	{
		return $this->hasOne('user');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getBookId()     { return $this->rvn_bok_id; }
	public function getUserId()     { return $this->rvn_usr_id; }
	public function getDate()       { return $this->rvn_date; }
	public function getStatus()     { return $this->rvn_status; }
	
	public function setBookId($value) { $this->rvn_bok_id = $value; }
	public function setUserId($value) { $this->rvn_usr_id = $value; }
	public function setDate($value)   { $this->rvn_date = $value; }
	public function setStatus($value) { $this->rvn_status = $value; }

	public static $rules = array('rvn_bok_id'=>'required|integer|min:0',
				     'rvn_usr_id'=>'required|integer|min:0',
				     'rvn_date'=>'required|date',
				     'rvn_status'=>'required|alpha|between:1,1'
				    );
}
?>
