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
        $books_kinds = DB::table('book')->where('bok_knd_id', $knd_id)
								 		->get();

		return View::make('for_testing_purposes.kind', array('books_kinds' => $books_kinds));
	}

}
