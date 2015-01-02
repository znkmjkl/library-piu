<?php

class LanguageController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getShowLanguage($lng_id)
	{
        $books_languages = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                            ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                            ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                            ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                            ->where('bok_lng_id', $lng_id)
                                            ->get();

		return View::make('for_testing_purposes.language', array('books_languages' => $books_languages));
	}

}
