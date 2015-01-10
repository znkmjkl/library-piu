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
        $books_authors = DB::table('writer')//->join('book', 'bok_id', '=', 'author.atr_bok_id')
        //                                     //->join('author', 'atr_bok_id', '=', 'book.bok_id')

        //                                     // ->join('language', 'lng_id', '=', 'book.bok_lng_id')
        //                                     // ->join('kind', 'knd_id', '=', 'book.bok_knd_id')
        //                                     ->where('wtr_id', $wtr_id)
                                            ->get();
        dd($books_authors);
        // return View::make('search.search_table', array('search_results' => $books_authors));
    }


  public function getAddWriterView()
  {

    return View::make('for_testing_purposes.add_author');

  }


  public function postWriter()
  {

    $validator = Validator::make(Input::all(), Writer::$rules);
    if ($validator->passes()) {
      $writer = new Writer;
      $writer->wtr_name = Input::get('author_name');
      $writer->wtr_surname = Input::get('author_surname');
      $writer->wtr_birth_date = Input::get('birth_date').' 00:00:00';
      $writer->save();

      return Redirect::back()->with('flash_message_success', 'Autor został dodany pomyślnie');;
      }
    else{
      return Redirect::back()->with('flash_message_danger', 'Złe dane')->withInput();

    }

  }


  public function getEditWriterView($writer_id)
  {

    $writer = DB::table('writer')->where('wtr_id',$writer_id)->get();
    if(count($writer) > 0){
      return View::make('for_testing_purposes.edit_author',array('writer' => $writer));
    }
    else{
      return Redirect::back()->with('flash_message_danger', 'Nie ma takiego autora!!!');
     }
  }

  public function postEditWriter($writer_id)
  {

    $validator = Validator::make(Input::all(), Writer::$rules);
    if ($validator->passes()) {
      $writer = DB::table('writer')->where('wtr_id',$writer_id)->update(array('wtr_name' => Input::get('author_name'),
                                                                 'wtr_surname' => Input::get('author_surname'),
                                                                 'wtr_birth_date' => Input::get('birth_date').' 00:00:00' ));

      return Redirect::back()->with('flash_message_success', 'Autor został dodany pomyślnie');
    }
    else
    {
      return Redirect::back()->with('flash_message_danger', 'Złe dane')->withInput();
    }

  }

  public function removeWritter($writer_id){

                $writer = DB::table('writer')->where('wtr_id', $writer_id)->delete();
                      return Redirect::back()->with('flash_message_success', 'Autor został usuniety');


  }

}
