<?php

class WriterController extends \BaseController {

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function getShowWriter($wtr_id)
    {
        $books_authors = DB::table('book')->join('author', 'atr_bok_id', '=', 'book.bok_id')
                                          ->join('writer', 'wtr_id', '=', 'author.atr_wtr_id')
                                          ->join('language', 'lng_id', '=', 'book.bok_lng_id')
                                          ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
                                          ->where('atr_id', $wtr_id)
                                          ->get();

        return View::make('for_testing_purposes.author', array('books_authors' => $books_authors));
    }

}
