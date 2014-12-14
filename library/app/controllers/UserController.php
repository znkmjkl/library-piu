<?php
/*include_once("../app/lib/SecureImage/securimage.php");*/

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
        $validator2 = Validator::make(Input::all(), $rulesCaptcha);
/*        $securimage = new Securimage();
        

        $captcha_code = Input::get('captcha_code');
        if (!$securimage->check($captcha_code) == true)
            return Redirect::intended('/')->with('flash_message', 'Wprowadzono nieprawidłowy kod z obrazka.');
*/        
        
        if ($validator2->fails()){
            return Redirect::intended('/')->with('flash_message', 'Wprowadzono nieprawidłowy kod z obrazka.');  
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
            return Redirect::intended('/')->with('flash_message', 'Dziękujemy za rejestracje. Możesz już dokonac logowania do serwisu =).');
        }
        else
        {
            return Redirect::intended('/')->with('flash_message', 'Adres email jest już zajęty! Proszę wprowadzić inny.')->withInput();
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
            // return Redirect::intended('/')->with('flash_message', 'Zostałeś zalogowany!');
            return View::make('home.index');
        }
        else
        {
           return Redirect::to('/')->withErrors($validator)
                                   ->with('flash_message', 'Wprowadzony email i hasło nie są poprawne!')
                                   ->withInput();
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return Redirect::to('login')->with('flash_message', 'Zostałeś wylogowany...');;
    }

    public function getResend_Password()
    {
        return View::make('users.password_reset');
    }

    public function sendNewPassword()
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
                            ->subject('Zmiana hasła w księgarni!');
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
