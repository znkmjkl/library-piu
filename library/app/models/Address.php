<?php

class Address extends Eloquent
{
	protected $table = 'address';

	protected $fillable = array('adr_city', 'adr_street', 'adr_house_number', 'adr_postal_code');

	public function user()
	{
		return $this->belongsToMany('user');
	}

	public function getIdentifier()  { return $this->getKey(); }
	public function getCity()        { return $this->adr_city; }
	public function getStreet()      { return $this->adr_street; }
	public function getHouseNumber() { return $this->adr_house_number; }
	public function getPostalCode()  { return $this->adr_postal_code; }

	public function setCity($value)        { $this->adr_city = $value; }
	public function setStreet($value)      { $this->adr_street = $value; }
	public function setHouseNumber($value) { $this->adr_house_number = $value; }
	public function setPostalCode($value)  { $this->adr_postal_code = $value; }

	public static $rules = array('adr_city'=>'required|alpha_num|between:2,100|unique:address',
				     'adr_street'=>'required|alpha_num|between:2,100',
				     'adr_house_number'=>'required|aplha_num|between:1,10',
				     'adr_postal_code'=>'required|alpha_num|between:6,10'
				    );
}
?>
