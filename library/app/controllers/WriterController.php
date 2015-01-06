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
public function getAddWriterView()
  {

    return View::make('for_testing_purposes.add_author');

  }

  public function postWriter()
  {

     $writer = new Writer;
     $writer->wtr_name = Input::get('author_name');
     $writer->wtr_surname = Input::get('author_surname');
     $writer->wtr_birth_date = Input::get('birth_date');
     $writer->save();

        return Redirect::to('/addbook');

  }

   public function getEditWriterView($writer_id)
  {

    $writer = DB::table('writer')->where('wtr_id',$writer_id)->get();

    return View::make('for_testing_purposes.edit_author',array('writer' => $writer));

  }

  public function postEditWriter($writer_id)
  {

    $writer = DB::table('writer')->where('wtr_id',$writer_id)->update(array('wtr_name' => Input::get('author_name'),
                                                                 'wtr_surname' => Input::get('author_surname'),
                                                                 'wtr_birth_date' => Input::get('birth_date')));

        return Redirect::to('/');

  }

}
