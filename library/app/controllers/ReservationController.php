<?php

class ReservationController extends \BaseController {

	public function postReserveBook($bok_id)
	{
		if (is_null(Reservation::isAvailable($bok_id)))
		{
			$reservation = new Reservation;

			$reservation->rvn_bok_id = $bok_id;
			$reservation->rvn_usr_id = Auth::user()->id;
			$reservation->rvn_status = 1;
			$reservation->rvn_is_ready = 0;

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

	public function getIndex() {
		$reservations = DB::table('reservation')
                                ->where('rvn_status', true)
                                ->join('book', 'book.bok_id', '=', 'reservation.rvn_bok_id')
                                ->join('user', 'user.id', '=', 'reservation.rvn_usr_id')
                                ->get();

        return View::make('for_testing_purposes.manage_reservations', array('reservations' => $reservations));
	}

	public function cancelReservation($rvn_id) {
		DB::table('reservation')->where('rvn_id', $rvn_id)->update(array('rvn_status' => false));

        return Redirect::to('/admin')->with('flash_message_success', 'Rezerwacja została anulowana.');
	}

	public function rentBook($rvn_id) {
		$reservation = DB::table('reservation')
								->where('rvn_id', $rvn_id)
								->where('rvn_is_ready', true)
								->join('book', 'book.bok_id', '=', 'reservation.rvn_bok_id')
                                ->join('user', 'user.id', '=', 'reservation.rvn_usr_id')
								->first();

		$rental = new Rental;
		$rental->rtl_bok_id = $reservation->rvn_bok_id;
		$rental->rtl_usr_id = $reservation->rvn_usr_id;
		$rental->rtl_start_date = new DateTime;
		$rental->rtl_end_date = new DateTime('+30 days');
		$rental->rtl_is_returned = false;
		$rental->save();

		DB::table('reservation')->where('rvn_id', $rvn_id)->update(array('rvn_status' => false));

        return Redirect::to('/admin')->with('flash_message_success', 'Książka została wypożyczona.');
	}

	public function makeReadyReservation($rvn_id) {
		$reservation = DB::table('reservation')
								->where('rvn_id', $rvn_id)
								->where('rvn_status', true)
								->first();

		$rent = DB::table('rental')
								->where('rtl_bok_id', $reservation->rvn_bok_id)
								->where('rtl_is_returned', false)
								->get();

		if(empty($rent)) {
			DB::table('reservation')->where('rvn_id', $rvn_id)->update(array('rvn_is_ready' => true, 'rvn_date' => new DateTime));

        	return Redirect::to('/admin')->with('flash_message_success', 'Status rezerwacji został zmieniony na gotowa do odbioru.');
        } else {
        	return Redirect::to('/admin')->with('flash_message_danger', 'Książka nie została oddana.');
        }
	}
}
