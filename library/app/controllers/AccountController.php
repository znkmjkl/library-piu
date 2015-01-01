<?php

class AccountController extends \BaseController {

    public function getAccount()
    {
        return View::make('home.account');
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
}
