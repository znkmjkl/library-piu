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
                                 ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                 ->get();

        return View::make('book.book', array('book' => $book));
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
                                 ->leftJoin('reservation', 'rvn_bok_id', '=', 'book.bok_id')
                                 ->get();

        return View::make('book.book', array('book' => $book));
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
        public function getAddBookView(){
        $writersDB = DB::table('writer')
                            ->orderBy('atr_surname','desc')
                            ->get();
        $languageDB = DB::table('language')
                            ->orderBy('lng_name','desc')
                            ->get();
        $kindDB = DB::table('kind')
                            ->orderBy('knd_name','desc')
                            ->get();
        $writers = array();
        $languages = array();
        $kinds = array();
        foreach ($writersDB as $writer)
        {
            $writers[$writer->wtr_id] = $writer->wtr_name.' '.$writer->wtr_surname;
        }
        foreach ($languageDB as $language)
        {
            $languages[$language->lng_id] = $language->lng_name;
        }
        foreach ($kindDB as $kind)
        {
            $kinds[$kind->knd_id] = $kind->knd_name;
        }
        return View::make('for_testing_purposes.add_book', array('writers' => $writers,
                                                                 'languages' => $languages,
                                                                 'kinds' => $kinds));
    }

    public function getReservedBooks($boke_page)
    {
        $books = DB::table('book')
                        ->orderBy('bok_title', 'desc')
                        ->skip(($boke_page-1)*10)
                        ->take(10)
                        ->get();
        return View::make('for_testing_purposes.booklist', array('books' => $books));
    }

    public function getRentedBooks($boke_page)
    {
        $books = DB::table('book')
                        ->orderBy('bok_title', 'desc')
                        ->skip(($boke_page-1)*10)
                        ->take(10)
                        ->get();
        return View::make('for_testing_purposes.booklist', array('books' => $books));
    }

    public function postBook(){
               $validator = Validator::make(Input::all(), Book::$rules);
               if ($validator->passes())
               {
                    $book = new Book;
                    $book->bok_image_link = Input::get('image');
                    $book->bok_isbn = Input::get('bok_isbn');
                    $book->bok_title = Input::get('bok_title');
                    $book->bok_lng_id = Input::get('language')+1;
                    $book->bok_knd_id = Input::get('kind')+1;
                    $book->bok_edition_date = Input::get('date').'-01-01 00:00:00'; //TODO cza jakos sformatować
                    $book->bok_edition_number = Input::get('edition');
                    $book->save();
                    $bookId = $book->id;
                    $writers = array();
                    $writers = Input::get('writer');
                    $bok_id = $bookId;
                    foreach ($writers as $writer)
                    {
                        $author = new Author;
                        $author->atr_bok_id = $bok_id;
                        $author->atr_wtr_id = $writer;
                        $author->save();
                    }
                    return Redirect::back()->with('flash_message_success', 'Dodano książke');
                }
                else
                {
                    return Redirect::back()->with('flash_message_danger', 'Błędne dane książki');
                }
    }

    public function getEditBookView($bok_id){
         $writersDB = DB::table('writer')
                            ->orderBy('atr_surname','desc')
                            ->get();
        $languageDB = DB::table('language')
                            ->orderBy('lng_name','desc')
                            ->get();
        $kindDB = DB::table('kind')
                            ->orderBy('knd_name','desc')
                            ->get();
         $book = DB::table('book')
                            ->where('bok_id',$bok_id)
                            ->get();
        $selectedWritters = DB::table('author')->where('atr_bok_id',$bok_id)->lists('atr_wtr_id');
        $authors = DB::table('writer')->whereIn('wtr_id',$selectedWritters)->lists('wtr_id');
        $writers = array();
        $languages = array();
        $kinds = array();
        foreach ($writersDB as $writer)
        {
            $writers[$writer->wtr_id] = $writer->wtr_name.' '.$writer->wtr_surname;
        }
        foreach ($languageDB as $language)
        {
            $languages[$language->lng_id] = $language->lng_name;
        }
        foreach ($kindDB as $kind)
        {
            $kinds[$kind->knd_id] = $kind->knd_name;
        }
        return View::make('for_testing_purposes.edit_book', array('writers' => $writers,
                                                                 'languages' => $languages,
                                                                 'kinds' => $kinds,
                                                                 'book' => $book,
                                                                 'authors' => $authors));

    }

    public function editBook($bok_id){
        $validator = Validator::make(Input::all(), Book::$rules);
        if ($validator->passes())
        {

            DB::table('book')->where('bok_id',$bok_id)->update(array('bok_isbn' => Input::get('bok_isbn'),
                                                                    'bok_title' => Input::get('bok_title'),
                                                                    'bok_image_link' => Input::get('image'),
                                                                     'bok_lng_id' => Input::get('language')+1,
                                                                     'bok_knd_id' => Input::get('kind')+1,
                                                                     'bok_edition_date' =>Input::get('date').' 00:00:00',
                                                                     'bok_edition_number' => Input::get('edition') ));
            DB::table('author')->where('atr_bok_id',$bok_id)->delete();
            $writers = Input::get('writer');
                    foreach ($writers as $writer)
                    {
                        $author = new Author;
                        $author->atr_bok_id = $bok_id;
                        $author->atr_wtr_id = $writer;
                        $author->save();
                }
          return Redirect::back()->with('flash_message_success', 'Edytowano książke');;
        }
        else
        {
           return Redirect::back()->with('flash_message_danger', 'Błędne dane książki');
        }
    }
    
    public function removeBook($bok_id){
        if(DB::table('rental')->where('rtl_bok_id',$bok_id)->where('rtl_is_returned',0)->count() == 0)
        {
            $author = DB::table('author')->where('atr_bok_id', $bok_id)->delete();
            DB::table('book')->where('bok_id', $bok_id)->update(array('is_deleted' => 1));
            DB::table('reservation')->where('rvn_bok_id',$bok_id)->update(array('rvn_status' => 0,
                                                                               'rvn_is_ready' => 0));
            return Redirect::back()->with('flash_message_success', 'Usunięto książke');
        }
        else
        {
            return Redirect::back()->with('flash_message_danger', 'Nie można usunąć książki wypożyczonej');
        }


}
}
