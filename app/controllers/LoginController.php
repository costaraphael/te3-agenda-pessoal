<?php

class LoginController extends BaseController
{

    public function login()
    {
        return View::make('login.login');
    }

    public function logar()
    {
        $input = Input::All();


        $user = User::where('login', '=', $input['login'])->first();

        if ($user) {
            $password = hash('sha512', $input['password'] . $user->salt);
            $remember = isset($input['remember_me']) ? $input['remember_me'] : false;

            if ($user->password == $password) {
                Auth::login($user, $remember);

                if (Auth::check())
                    return Redirect::route('home');
            }

        }

        return Redirect::route('login')
            ->withInput()
            ->with('message', 'Dados de login incorretos.');

    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('login');
    }

}
