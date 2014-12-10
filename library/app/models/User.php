<?php

class User extends Eloquent
{
	protected $table = 'user';

	protected $hidden = array('password');
	protected $fillable = array('usr_name', 'usr_surname', 'usr_adr_id', 'usr_phone', 'usr_email', 'usr_pesel' );

	public function rental()
	{
		return $this->belongsToMany('renta');
	}

	public function reservation()
	{
		return $this->belongsToMany('reservation');
	}

	public function librarian()
	{
		return $this->belongsTo('librarian');
	}

	public function address()
	{
		return $this->hasOne('address');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getName()       { return $this->usr_name; }
	public function getSurname()    { return $this->usr_surname; }
	public function getAddressId()  { return $this->usr_adr_id; }
	public function getPhone()      { return $this->usr_phone; }
	public function getEmail()      { return $this->usr_email; }
	public function getPassword()   { return $this->usr_password; }
	public function getNumber()     { return $this->usr_number; }
	public function getPesel()      { return $this->usr_pesel; }
	public function getActive()     { return $this->usr_active; }
	public function getVerified()   { return $this->usr_verified; }
	
	public function setName($value)       { $this->usr_name = $value; }
	public function setSurname($value)    { $this->usr_surname = $value; }
	public function setAddressId($value)  { $this->usr_adr_id = $value; }
	public function setPhone($value)      { $this->usr_phone = $value; }
	public function setEmail($value)      { $this->usr_email = $value; }
	public function setPassword($value)   { $this->usr_password = $value; }
	public function setNumber($value)     { $this->usr_number = $value; }
	public function setPesel($value)      { $this->usr_pesel = $value; }
	public function setActive($value)     { $this->usr_active = $value; }
	public function setVerified($value)   { $this->usr_verified = $value; }

	public static $rules = array('usr_name'=>'required|alpha|between:2, 30',
				     'usr_surname'=>'required|alpha|between:2, 30',
				     'usr_adr_id'=>'required|integer|min:0',
				     'usr_phone'=>'required|alpha|between:9, 12',
				     'usr_email'=>'required|emailconfirmed',
				     'usr_email_confirmation'=>'required|email',
				     'usr_password'=>'required|aplha_num|between:8,30',
				     'usr_pesel'=>'required|alpha|between:9,9'
				    );
}
?>
