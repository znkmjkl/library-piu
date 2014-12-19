<?php

class UserController extends \BaseController {

    public function getIndex()
    {
        $users = DB::table('user')->get();

        return $users;
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
            return Redirect::intended('/')->with('flash_message2', 'Wprowadzono nieprawidłowy kod z obrazka.');
        }
        if ($validator->passes()) {
            $user = new User;
            $user->usr_name = Input::get('firstname');
            $user->usr_surname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            //  Mail::send('emails.registration.welcome', array('firstname'=>Input::get('firstname')), function($message){
            //     $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Witamy w naszej księgarni!');
            // });
            $user->save();
            return Redirect::intended('/')->with('flash_message1', 'Dziękujemy za rejestrację. Link aktywacyjny został wysłany na podany adres emailowy.');
        }
        else
        {
            return Redirect::intended('/')->with('flash_message2', 'Podany adres email jest już zajęty! Proszę wprowadzić inny.')->withInput();
        }
    }

    public function getLogin()
    {
        return View::make('users.login');
    }

    public function postLogin()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password'))))
        {
            return Redirect::intended('/')->with('flash_message1', 'Zostałeś zalogowany!');
            //return View::make('home.index');
        }
        else
        {
           return Redirect::to('/')->withErrors($validator)
                                   ->with('flash_message2', 'Wprowadzony email i hasło nie są poprawne!')
                                   ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('/')->with('flash_message4', 'Zostałeś wylogowany...');;
    }

    public function getResetPassword()
    {
        return View::make('users.password_reset');
    }

    public function postResetPassword()
    {

        $user = DB::table('user')->where('usr_surname', Input::get('lastname'))
                                 ->where('email', Input::get('email'))
                                 ->first();

        if (!empty($user))
        {
                $password=str_random(8);
                DB::table('user')->where('usr_email', Input::get('email'))
                                 ->update(array('password' => Hash::make($password)));

                Mail::send('emails.auth.reminder', array('usr_password'=>$password), function($message)
                {
                    $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))
                            ->subject('Prośba o zmianę hasła w księgarni');
                });

            return Redirect::intended('/')->with('flash_message1', 'Hasło zostało wysłane na podanego emaila.');
        }
        else
        {
           return Redirect::to('/')->with('flash_message2', 'Nie ma takiego użytkownika.')
                                   ->withInput();
        }
    }

}
