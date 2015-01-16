<?php

class UserController extends \BaseController {

    public function getIndex()
    {
        $users = DB::table('user')
                                ->join('librarian', 'librarian.lbn_usr_id', '!=', 'user.id')
                                ->get();

        return View::make('for_testing_purposes.manage_users', array('users' => $users));
    }

    public function getRegister()
    {
        return View::make('users.register');
    }

    public function postRegister()
    {
        $validator = Validator::make(Input::all(), User::$rules);
        $rulesCaptcha =  array('captcha' => array('required', 'captcha'));
        $validatorCaptcha = Validator::make(Input::all(), $rulesCaptcha);

        if ($validatorCaptcha->fails()){
            return Redirect::back()->with('flash_message_danger', 'Wprowadzono nieprawidłowy kod z obrazka.')->withInput(Input::except('password','captcha'));
        }
        if ($validator->passes()) {
            $userNumber = DB::table('user')->orderBy('id', 'desc')->first();

            $user = new User;
            $user->usr_name = Input::get('firstname');
            $user->usr_surname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->usr_number = $userNumber->usr_number + 1;
            $user->usr_active = 0;
            $user->usr_verified = 0;

            $address = new Address;
            
            if(!empty(Input::get('city')))
                $address->adr_city = Input::get('city');
            if(!empty(Input::get('street')))
                $address->adr_street = Input::get('street');
            if(!empty(Input::get('houseNr')))
                $address->adr_house_number = Input::get('houseNr');
            if(!empty(Input::get('zipCode')))
                $address->adr_postal_code = Input::get('zipCode');
            $address->save();
            
            $addressID = DB::table('address')->orderBy('adr_id', 'desc')->first();
            $user->usr_adr_id = $addressID->adr_id;

            $user->save();

              Mail::send('emails.registration.welcome', array('firstname' => Input::get('firstname') , 'id'=>$user->usr_number), function($message){
              $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Witamy w naszej księgarni!');
                 });

            return Redirect::back()->with('flash_message_success', 'Dziękujemy za rejestrację. Link aktywacyjny został wysłany na podany adres emailowy.');
        }
        else
        {
            return Redirect::back()->with('flash_message_danger', 'Podany adres email jest już zajęty! Proszę wprowadzić inny.')->withInput(Input::except('password','captcha'));
        }
    }

    public function getLogin()
    {
        return View::make('users.login');
    }

    public function postLogin()
    {
        $validator = Validator::make(Input::all(), User::$rules);

       //$user
        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
        {

            $user = DB::table('user')->where('email', Input::get('email'))->get();

            if($user[0]->usr_active && !$user[0]->usr_is_blocked){                
                return Redirect::intended('/')->with('flash_message_success', 'Zostałeś zalogowany!');
            } else if($user[0]->usr_is_blocked){              
                Auth::logout();
                return Redirect::back()->with('flash_message_danger', 'Twoje konto jest zablokowane w sprawie wyjaśnień skontaktuj się z administracją!');
            } else {
                Auth::logout();
                return Redirect::back()->with('flash_message_danger', 'Twoje konto nie jest aktywne sprawdź skrzynke mailową lub skontaktuj się z administracją!');
            }
            //return View::make('home.index');
        }
        else
        {
           return Redirect::back()->withErrors($validator)
                                   ->with('flash_message_danger', 'Wprowadzony email i hasło nie są poprawne!')
                                   ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/')->with('flash_message_info', 'Zostałeś wylogowany...');;
    }

    public function getResetPassword()
    {
        return View::make('users.password_reset');
    }

    public function postResetPassword()
    {

        $user = DB::table('user')->where('usr_surname', Input::get('surname'))
                                 ->where('email', Input::get('email'))
                                 ->first();

        if (!empty($user))
        {
                $password=str_random(8);
                
                DB::table('user')->where('email', Input::get('email'))
                                 ->update(array('password' => Hash::make($password)));

                Mail::send('emails.auth.reminder', array('usr_password'=>$password), function($message)
                {
                    $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))
                            ->subject('Prośba o zmianę hasła w biliotece');
                });

            return Redirect::intended('/')->with('flash_message_success', 'Hasło zostało wysłane na podany adres email.');
        }
        else
        {
           return Redirect::to('/')->with('flash_message_danger', 'Nie ma takiego użytkownika.')
                                   ->withInput();
        }
    }

    public function blockUser($id=null)
    {
        DB::table('user')->where('id', $id)->update(array('usr_is_blocked' => true));

        return Redirect::back()->with('flash_message_success', 'Użytkownik został zablokowany.');
    }

    public function activateUser($id=null)
    {
        DB::table('user')->where('id', $id)->update(array('usr_active' => 1));

        return Redirect::back()->with('flash_message_success', 'Użytkownik został aktywowany.');
    }

    // public function getAddUser() {
    //     return View::make('for_testing_purposes.add_user');
    // }


    public function postAddUser() {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $userNumber = DB::table('user')->orderBy('id', 'desc')->first();

            $address = new Address;
            $address->adr_street = Input::get('street');
            $address->adr_city = Input::get('city');
            $address->adr_postal_code = Input::get('zipCode');
            $address->adr_house_number = Input::get('houseNr');
            $address->save();
            $address_id = $address->id;

            $user = new User;
            $user->usr_name = Input::get('firstname');
            $user->usr_surname = Input::get('lastname');
            $user->usr_adr_id = $address_id;
            $user->usr_phone = Input::get('phone');
            $user->usr_pesel = Input::get('pesel');
            $user->usr_active = true;
            $user->usr_verified = true;
            $user->usr_is_blocked = false;
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->usr_number = $userNumber->usr_number + 1;
            $user->save();
            return Redirect::back()->with('flash_message_success', 'Użytkownik został dodany.');
        }
        else
        {
            return Redirect::back()->with('flash_message_danger', 'Podany adres email jest już zajęty! Proszę wprowadzić inny.')->withInput();
        }
    }


    public function getEditUser($id) {
        $user = DB::table('user')->where('id', $id)->get();
        $address =  DB::table('address')->where('adr_id', $user[0]->usr_adr_id)->get();

        return View::make('for_testing_purposes.edit_user', array('user' => $user, 'address' => $address));
    }


    public function postEditUser($id) {
        $validator = Validator::make(Input::all(), User::$editRules);

        $adr_id = DB::table('user')->where('id', $id)->first()->usr_adr_id;

        if ($validator->passes()) {
            if(empty(Input::get('password'))) {
                    DB::table('address')->where('adr_id',$adr_id)->update(array('adr_street' => Input::get('street'),
                                                                         'adr_city' => Input::get('city'),
                                                                         'adr_postal_code' => Input::get('zipCode'),
                                                                         'adr_house_number' => Input::get('houseNr')));

                    DB::table('user')->where('id',$id)->update(array('usr_name' => Input::get('firstname'),
                                                                         'usr_surname' => Input::get('lastname'),
                                                                         'usr_phone' => Input::get('phone'),
                                                                         'usr_pesel' => Input::get('pesel'),
                                                                         'usr_active' => Input::get('active'),
                                                                         'usr_verified' => Input::get('verified'),
                                                                         'usr_is_blocked' => Input::get('blocked')
                                                                         ));

                    return Redirect::back()->with('flash_message_success', 'Dane użytkownika zostały zmienione.');
            } else {
                    DB::table('address')->where('adr_id',$adr_id)->update(array('adr_street' => Input::get('street'),
                                                                         'adr_city' => Input::get('city'),
                                                                         'adr_postal_code' => Input::get('zipCode'),
                                                                         'adr_house_number' => Input::get('houseNr')));

                    DB::table('user')->where('id',$id)->update(array('usr_name' => Input::get('firstname'),
                                                                         'usr_surname' => Input::get('lastname'),
                                                                         'usr_phone' => Input::get('phone'),
                                                                         'usr_pesel' => Input::get('pesel'),
                                                                         'usr_active' => Input::get('active'),
                                                                         'password' => Hash::make(Input::get('password')),
                                                                         'usr_verified' => Input::get('verified'),
                                                                         'usr_is_blocked' => Input::get('blocked')
                                                                         ));

                    return Redirect::back()->with('flash_message_success', 'Dane użytkownika zostały zmienione.');
            }
        }
    }


    public function verifyUser($id) {
        DB::table('user')->where('id', $id)->update(array('usr_verified' => 1));

        return Redirect::back()->with('flash_message_success', 'Użytkownik został zweryfikowany.');
    }


    public function confirmUser($usr_number){

        $user = DB::table('user')->where('usr_number',$usr_number)
                         ->where('usr_active',0)->count();
        if($user == 1)
        {
            DB::table('user')->where('usr_number',$usr_number)->update(array('usr_active' => 1 ));
            return Redirect::intended('/')->with('flash_message_success', 'Konto zostało aktywowane, możesz się zalogować.');            
        }
        else
        {
            return Redirect::intended('/')->with('flash_message_danger', 'Nie ma takiego linka !.')->withInput();            
        }   
    }

}
