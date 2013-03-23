<?php

class Admin_Users_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
        
        $this->filter('before', 'authAdmin');
    }

    public function get_index()
    {
        $users = Users::getAll();
        
        return View::make('admin/users.index')
            ->with('users', $users);
    }

    public function get_show()
    {
        $users = Users::getAll();
        
        return View::make('admin/users.index')
            ->with('users', $users);
    }

    public function get_add()
    {
        return View::make('admin/users.add');
    }

    public function post_add()
    {
        $rules = array(
            'firstname' => 'required|max:60|alpha_dash',
            'lastname' => 'required|max:60|alpha_dash',
            'number' => 'required|integer'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            return Redirect::to('admin/users/add');
        }

        Users::insert(Input::get('firstname'), Input::get('lastname'), Input::get('number'));

        return Redirect::to('admin/users');
    }

    /*public function get_edit($userID)
    {
        $user = Users::get($userID);

        if ($user != null) {
            return View::make('admin/users.edit')
                ->with('user', $user);
        } else {
            return "Error";
        }
    }

    public function post_edit($userID)
    {
        $validation = Validator::make(Input::get(), array('newUserPassword' => 'required|max:60'));
        
        if ($validation->fails()) {
            return Redirect::to('admin/users');
        }

        Users::password($userID, Input::get('newUserPassword'));

        return Redirect::to('admin/users');
    }

    public function get_delete($userID)
    {
        $user = Users::get($userID);

        if ($user != null) {
            return View::make('admin/users.delete')
                ->with('user', $user);
        } else {
            return "Error";
        } 
    }

    public function post_delete($userID)
    {
        Users::delete($userID);

        return Redirect::to('admin/users');
    }*/

}
