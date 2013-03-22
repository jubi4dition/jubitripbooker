<?php

class Admin_Controller extends Base_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->filter('before', 'authAdmin')->except(array('login', 'auth'));
    }

    public function action_index()
    {
        return View::make('admin.index');
    }

    public function action_login()
    {
        return View::make('admin.login');
    }

    public function action_auth()
    {
        $rules = array(
            'administrator' => 'required|max:60|alpha_num',
            'password' => 'required|max:60|alpha_num'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('login');
        }

        $name = Input::get('administrator');
        $password = Input::get('password');
        $credentials = array('username' => $name, 'password' => $password);
        
        if (Auth::attempt($credentials)) {
            Session::put('uid', Auth::user()->id);
            Session::put('name', Auth::user()->name);
            
            return Redirect::to('admin');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function action_logout()
    {
        Auth::logout();

        return Redirect::to('admin/login');
    }

}
