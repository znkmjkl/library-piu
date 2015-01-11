<?php

class FineController extends \BaseController {


	public function showFine($rental_id)
	{
        $bookRented = DB::table('rental')
                        ->join('book', 'rtl_bok_id','=', 'book.bok_id')
                        ->join('user','rtl_usr_id','=','user.id')
                        ->leftjoin('fine','rtl_id','=','fine.fne_rtl_id')                        
                        ->where('rtl_id','=', $rental_id)
                        ->get();

        $today = new DateTime('today');

        $returnDay = new DateTime($bookRented[0]->rtl_end_date);

       if($today > $returnDay)
       { 
            $calculateDefaultFine = (($today->diff($returnDay)->d)+1)*0.5;                
        }else{
         $calculateDefaultFine = 0;   
        }

       return View::make('for_testing_purposes.return_book', array('rentedBooks' => $bookRented,
                                                                   'fine' => $calculateDefaultFine));
	}

	public function addFine($rental_id)
	{ 

	    $validator = Validator::make(Input::all(), Fine::$rules);
    	if ($validator->passes()) 
    	{              
				$fine_amount = Input::get('fine_amount');

			 	$bookRented = DB::table('fine')
			 					->where('fne_rtl_id','=',$rental_id)
			 					->count();

		 		if($bookRented == 1){

		 			DB::table('fine')
          	   			->where('fne_rtl_id','=',$rental_id)
           	   			->update(array('fne_amount' => $fine_amount));
		 		}
		 		else
		 		{

		 			$fine = new Fine;
		 			$fine->fne_rtl_id = $rental_id;
		 			$fine->fne_amount = $fine_amount;
		 			$fine->fne_status = true;
		 			$fine->save();
		   		}

        	return Redirect::back()->with('flash_message_success', 'Dodano kare');
    	}
    	else
    	{
        	return Redirect::back()->with('flash_message_danger', 'Należy podać dane liczbowe')->withInput();

    	}
	}
	public function deleteFine($rental_id)
	{           

		DB::table('fine')
		->where('fne_rtl_id','=',$rental_id)
		->delete();

        return Redirect::back()->with('flash_message_success', 'Usunięto kare');

    }
}
