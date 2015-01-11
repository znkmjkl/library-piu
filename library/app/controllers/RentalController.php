<?php

class RentalController extends \BaseController {

	 public function getRentedBooks($boke_page, $searchBy)
    {
    	if($searchBy == "all")
    	{
    		 $rentedBooks = DB::table('rental')
        				->join('book', 'rtl_bok_id','=', 'book.bok_id')
        				->join('user','rtl_usr_id','=','user.id')
                        ->leftjoin('fine','rtl_id','=','fine.fne_rtl_id')   
                        ->where('rental.rtl_is_returned',0)
                        ->orderBy('rtl_end_date', 'asc')
                        ->skip(($boke_page-1)*10)
                        ->take(10)
                        ->get();
    	}
    	else {
    		        $rentedBooks = DB::table('rental')
        				->join('book', 'rtl_bok_id','=', 'book.bok_id')
        				->join('user','rtl_usr_id','=','user.id')
                        ->leftjoin('fine','rtl_id','=','fine.fne_rtl_id')                        
                        ->orderBy('rtl_end_date', 'asc')
                        ->where('book.bok_isbn','=', $searchBy)
                        ->where('rental.rtl_is_returned',0)
                        ->skip(($boke_page-1)*10)
                        ->take(10)
                        ->get();
		}

        
        return View::make('for_testing_purposes.booklist', array('rentedBooks' => $rentedBooks));
    }
    public function getRestPage(){

                $bok_isbn = Input::get('bok_isbn');
                if($bok_isbn == ""){
                    $bok_isbn = "all";
                }
                return Redirect::back()->with('flash_message_success', 'Wyszukane pozycje');
    }

    public function returnBook($rental_id){

        DB::table('rental')
         ->where('rtl_id','=', $rental_id)
         ->update(array('rtl_is_returned' => 1, 'rtl_end_date' => date_create()));

        DB::table('fine')
         ->where('fne_rtl_id','=', $rental_id)
         ->update(array('fne_status' => 0));

        $bok = DB::table('rental')
                    ->where('rtl_id', '=', $rental_id)
                    ->get();
        $bok_id = $bok[0]->rtl_bok_id;

        DB::table('reservation')
                    ->where('rvn_bok_id', '=', $bok_id)
                    ->where('rvn_status', '=', 1)
                    ->update(array('rvn_is_ready' => 1, 'rvn_date' => date_create()));

        return Redirect::intended('/rentedList/1/all')->with('flash_message_success', 'Książka została oddana');
    }

}
