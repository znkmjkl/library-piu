<?php

class ReservationController extends \BaseController {


	public function isAvailable($bok_id) // id or isbn?
	{
        $reservation = DB::table('reservation')->where('rvn_bok_id', $bok_id)
								  		 	   ->first();

		return $reservation->rvn_status;
	}


	public function setAvailable($bok_id) // id or isbn?
	{
		DB::table('reservation')->where('rvn_bok_id', $bok_id)
		            	  		->update(array('rvn_status' => 1));

	}


	public function setReserved($bok_id) // id or isbn?
	{
		DB::table('reservation')->where('rvn_bok_id', $bok_id)
		            	  		->update(array('rvn_status' => 0));

	}

}
