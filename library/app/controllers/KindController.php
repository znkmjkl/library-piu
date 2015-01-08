<?php

class KindController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShowKind($knd_id)
	{
        $books_kinds = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
										->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
										->join('language', 'lng_id', '=', 'book.bok_lng_id')
										->join('kind', 'knd_id', '=', 'book.bok_knd_id')
										->where('bok_knd_id', $knd_id)
										->get();

		return View::make('search.search_table', array('search_results' => $books_kinds));
	}

}
