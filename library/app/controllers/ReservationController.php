<?php

class ReservationController extends \BaseController {

	public function postReserveBook($bok_id)
	{
		if (is_null(Reservation::isAvailable($bok_id)))
		{
			$reservation = new Reservation;

			$reservation->rvn_bok_id = $bok_id;
			$reservation->rvn_usr_id = Auth::user()->id;
			$reservation->rvn_date = new DateTime('today');
			$reservation->rvn_date->modify('+7 day');
			$reservation->rvn_status = 1;

			$reservation->save();

	        return Redirect::back()->with('flash_message_success', 'Zarezerwowałeś książkę.');
		}
		else
		{
			if (!Reservation::isAvailable($bok_id))
			{
				Reservation::setReserved($bok_id, Auth::user()->id);

				return Redirect::back()->with('flash_message_success', 'Zarezerwowałeś książkę.');
			}
			else
			{
				return Redirect::back()->with('flash_message_danger', 'Ksiązką została już zarezerwowana.');
			}
		}
	}


	public function postCancelBookReservation($bok_id)
	{
		Reservation::setAvailable($bok_id, Auth::user()->id);

		return Redirect::back()->with('flash_message_danger', 'Zrezygnowałeś z rezerwacji.');
	}

}
