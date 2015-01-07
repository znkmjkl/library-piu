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
                return Redirect::to('/rentedList/1/'.$bok_isbn);
    }

/*    public function addFine($rental_id){

    }*/

    public function returnBook($rental_id){

        DB::table('rental')
         ->where('rtl_id','=', $rental_id)
         ->update(array('rtl_is_returned' => 1));

        DB::table('fine')
         ->where('fne_rtl_id','=', $rental_id)
         ->update(array('fne_status' => 0));

        $bok_id = DB::table('rental')
                    ->where('rtl_id', '=', $rental_id)
                    ->first()->rtl_bok_id;

        DB::table('reservation')
                    ->where('rvn_bok_id', '=', $bok_id)
                    ->where('rvn_status', '=', 1)
                    ->update(array('rvn_is_ready' => 1, 'rvn_date' => new DateTime));

        return Redirect::to('/rentedList/1/all');
    }

}
