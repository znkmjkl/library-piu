<?php

class AdminController extends \BaseController {

	public function getAdmin()
    {
       $bookAuthors = DB::table('author')
                           ->join('book', 'book.bok_id', '=', 'author.atr_bok_id')
                           ->where('book.is_deleted', 0)
                             ->orWhere('book.is_deleted', null)
                  //         ->join('writer', 'author.atr_wtr_id', '=', 'writer.wtr_id')
                            ->get();   

                 $rentedBooks = DB::table('rental')
                        ->join('book', 'rtl_bok_id','=', 'book.bok_id')
                        ->join('user','rtl_usr_id','=','user.id')
                        ->leftjoin('fine','rtl_id','=','fine.fne_rtl_id')   
                        ->where('rental.rtl_is_returned',0)
                        ->orderBy('rtl_end_date', 'asc')
                        ->paginate(15);


        $authorsArray = array();
        $id = $bookAuthors[0]->atr_bok_id;
        $tempArray = array();

        foreach ($bookAuthors as $bookAuthor)
        {   
            if($id == $bookAuthor->atr_bok_id)
            {
              $tempArray[] = $bookAuthor->atr_wtr_id;   
            }  
            else
            { 
                $authorsArray[$id] = $tempArray;
                $id = $bookAuthor->atr_bok_id;
                $tempArray = array();
                $tempArray[] = $bookAuthor->atr_wtr_id;   

            } 
        }
        $authorsArray[$id] = $tempArray;


        $autors = DB::table('author')->get();                             
 
        $kinds = DB::table('kind')->lists('knd_name');

        $languages = DB::table('language')->lists('lng_name');

        $writers = DB::table('writer')->get();
        $writersList = array();

        foreach ($writers as $writer)
        {
            $writersList[$writer->wtr_id] = $writer->wtr_name.' '.$writer->wtr_surname;
        }

                $books = DB::table('book')
                            ->where('book.is_deleted', 0)
                            ->orWhere('book.is_deleted', null)
                            ->join('kind', 'book.bok_knd_id', '=', 'kind.knd_id')
                            ->join('language', 'book.bok_lng_id', '=', 'language.lng_id')
                            ->paginate(15);   



        $users = DB::table('user')
                                ->join('librarian', 'librarian.lbn_usr_id', '!=', 'user.id')
                                ->join('address', 'address.adr_id', '=', 'user.usr_adr_id')
                                ->get();
        $reservations = DB::table('reservation')
                                ->where('rvn_status', true)
                                ->join('book', 'book.bok_id', '=', 'reservation.rvn_bok_id')
                                ->join('user', 'user.id', '=', 'reservation.rvn_usr_id')
                                ->get();

        return View::make('admin.admin', array('users' => $users,
                                               'rentedBooks' => $rentedBooks,
                                               'books' => $books,
                                               'kinds' => $kinds,
                                               'languages' => $languages,
                                               'writers' => $writers,
                                               'writersList' => $writersList,
                                               'autors' => $autors,
                                               'authorsArray' => $authorsArray,
                                               'users' => $users, 
                                               'reservations' => $reservations));
    }

}
