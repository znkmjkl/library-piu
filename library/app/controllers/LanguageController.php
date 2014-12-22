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
        $books_languages = DB::table('book')->where('bok_lng_id', $lng_id)
								 		    ->get();

		return View::make('for_testing_purposes.language', array('books_languages' => $books_languages));
	}

}
