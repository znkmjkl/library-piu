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
        						 ->join('author', 'atr_id', '=', 'book.bok_atr_id')
        						 ->join('language', 'lng_id', '=', 'book.bok_lng_id')
        						 ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
        						 ->join('reservation', 'rvn_bok_id', '=', 'book.bok_id')
								 ->first();

		return View::make('for_testing_purposes.book', array('book' => $book));
	}

}
