<?php

class RentalController extends \BaseController {

	public function postRent()//($rtl_bok_id, $rtl_usr_id)
	{
		$rental = new Rental;

		$rental->rtl_bok_id = Input::get('rtl_bok_id');
		$rental->rtl_usr_id = Input::get('rtl_usr_id');

		// $rental->rtl_bok_id = $rtl_bok_id;
		// $rental->rtl_usr_id = $rtl_usr_id;
		$rental->rtl_start_date = new DateTime('today');
		$rental->rtl_end_date = new DateTime('today');
		$rental->rtl_end_date->modify('+14 day');

		$rental->save();
        // return Redirect::intended('/')->with('flash_message1', 'Ksiązką została wypożyczona.');
        return "saved";

	}


}
