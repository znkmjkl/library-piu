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

}