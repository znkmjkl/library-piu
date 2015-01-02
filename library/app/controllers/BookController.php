<?php

class BookController extends \BaseController {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShowBook($bok_id)
    {
        $book = DB::table('book')->where('bok_id', $bok_id)
                                 ->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                 ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                 ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                 ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                 ->get();

        return View::make('for_testing_purposes.book', array('book' => $book));
    }


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShowBookWithReservation($bok_id)
	{
        if (is_null(Reservation::isAvailable($bok_id)))
        {
            $reservation = new Reservation;

            $reservation->rvn_bok_id = $bok_id;
            $reservation->rvn_usr_id = Auth::user()->id;
            $reservation->rvn_date = new DateTime('today');
            $reservation->rvn_status = 0;
            $reservation->rvn_is_ready = 0;

            $reservation->save();
        }

        $book = DB::table('book')->where('bok_id', $bok_id)
                                 ->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                 ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                 ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                 ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                 ->join('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                 ->get();

		return View::make('for_testing_purposes.book', array('book' => $book));
	}

}
