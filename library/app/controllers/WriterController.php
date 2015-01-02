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
        $books_authors = DB::table('book')->where('bok_atr_id', $wtr_id)
                                          ->get();

        return View::make('for_testing_purposes.author', array('books_authors' => $books_authors));



    }

}
