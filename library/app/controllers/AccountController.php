<?php

class AccountController extends \BaseController {

    public function getAccount()
    {

      $address = DB::table('address')->where('adr_id', Auth::user()->usr_adr_id)->get();
      $rvns = DB::table('reservation')->where('rvn_usr_id', Auth::user()->id)
                    ->where('rvn_status','1')
                    ->join('book', 'bok_id', '=', 'reservation.rvn_bok_id')                  
                    ->get();

      $rtls = DB::table('rental')->where('rtl_usr_id', Auth::user()->id)
                    ->where('rtl_is_returned','0')
                    ->join('book', 'bok_id', '=', 'rental.rtl_bok_id')
                    ->join('fine', 'fne_rtl_id', '=', 'rental.rtl_id')
                    ->get();
      $rtlsOld = DB::table('rental')->where('rtl_usr_id', Auth::user()->id)
                    ->where('rtl_is_returned','1')
                    ->join('book', 'bok_id', '=', 'rental.rtl_bok_id')
                    ->join('fine', 'fne_rtl_id', '=', 'rental.rtl_id')
                    ->get();

      return View::make('home.account', array('address' => $address, 'rvns' => $rvns, 'rtls' => $rtls, 'rtlsOld' => $rtlsOld));

    }

    public function changePassword(){
      
      if (!Hash::check(Input::get('usr_oldPass'), Auth::user()->password)){
        return Redirect::intended('/account')->with('flash_message_danger', 'Podano nieprawidłowe hasło!');
      }
     
      $validator = Validator::make(Input::all(), User::$change_pass_rules);
      if($validator->passes()){  
        $user = Auth::user();      
        $user->password = Hash::make(Input::get('password'));
        $user->save();
        return Redirect::intended('/account')->with('flash_message_success', 'Zmiana hasła zakończona sukcesem!');
      }else {
        return Redirect::intended('/account')->with('flash_message_danger', 'Hasła nie spełniają wymagań!')->withErrors($validator)->withInput();
      }

    }

    public function prolongate($rtl_id, $book_name){
      Rental::extendEndDate($rtl_id);
      
      return Redirect::back()->with('flash_message_success', 'Prolongowałeś książkę o 30 dni.'.$book_name
        );
    }
}


