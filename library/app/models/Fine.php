<?php

class Fine extends Eloquent
{
	protected $table = 'fine';

	protected $fillable = array('fne_rtl_id', 'fne_amount', 'fne_status' );

	public function rental()
	{
		return $this->hasMany('rental');
	}

	public function getIdentifier() { return $this->getKey(); }
	public function getRentalId()   { return $this->fne_rtl_id; }
	public function getAmount()     { return $this->fne_amount; }
	public function getStatus()     { return $this->fne_status; }
	
	public function setRentalId($value) { $this->fne_rtl_id = $value; }
	public function setAmount($value)   { $this->fne_amount = $value; }
	public function setStatus($value)   { $this->fne_status = $value; }

	public static $rules = array('fne_rtl_id'=>'required|integer|min:0',
				     'fne_amount'=>'required|integer|min:0',
				     'fne_status'=>'required|alpha|between:1,1'
				    );
}
?>
