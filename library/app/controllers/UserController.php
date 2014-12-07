<?php

class UserController extends \BaseController {

    public function getIndex()
    {
        $users = DB::table('users')->get();

        return $users;
    }

    public function getRegister()
    {
        return View::make('users.register');
    }

    public function postRegister()
    {
        $validator = Validator::make(Input::all(), User::$rules);

        if ($validator->passes()) {
            $user = new User;
            $user->username = Input::get('username');
            $user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
             Mail::send('emails.registration.welcome', array('firstname'=>Input::get('firstname')), function($message){
                $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Witamy w naszej księgarni!');
            });
            $user->save();
            return Redirect::intended('/')->with('flash_message', 'Thanks for registering. Please confirm your account by clicking link in a confirmation email... then you can log in.');
        }
        else
        {
            return Redirect::intended('/')->with('flash_message', 'Username or email is in use. Try another.')->withInput();
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
            return Redirect::intended('/')->with('flash_message', 'You are now logged in!');
        }
        else
        {
           return Redirect::to('/')->withErrors($validator)
                                   ->with('flash_message', 'Your email and password don\'t match')
                                   ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('login')->with('flash_message', 'You are now logged out...');;
    }

    public function getResend_Password()
    {
        return View::make('users.password_reset');
    }

    public function sendNewPassword(){

        $users = DB::table('users')
                            ->where('username', Input::get('username'))
                            ->where('email', Input::get('email'))
                            ->first();

        if (!empty($users))
        {
                $password=str_random(8);
                DB::table('users')
                    ->where('email', Input::get('email'))
                    ->update(array('password' => Hash::make($password)));

                Mail::send('emails.auth.reminder', array('password'=>$password), function($message){
                $message->to(Input::get('email'), Input::get('firstname').' '.Input::get('lastname'))->subject('Zmiana hasła w księgarni!');
            });
            return Redirect::intended('/')->with('flash_message', 'Wysłano hasło na podanego maila!');
        }
        else
        {
           return Redirect::to('/')->with('flash_message', 'Nie ma takiego użytkownika!')
                                   ->withInput();
        }
    }


}