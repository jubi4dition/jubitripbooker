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
        return View::make('admin/users.index');
    }

    public function get_show()
    {
        $users = Users::paginate();
        
        return View::make('admin/users.show')
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
            $message = "Invalid input!";
            return Helper::json(false, $message);
        }

        if (Users::hasNumber(Input::get('number'))) {
            $message = "Number already in use!";
            return Helper::json(false, $message);
        }

        Users::insert(Input::get('firstname'), Input::get('lastname'), Input::get('number'));

        return Response::json(array('success' => true));
    }

    public function get_search()
    {
        return View::make('admin/users.search');
    }

    public function post_search()
    {
        $validation = Validator::make(Input::get(), array('number' => 'required|integer'));
        
        if ($validation->fails()) return Response::json(array('success' => false));

        $user = Users::getByNumber(Input::get('number'));

        if ($user == null) return Response::json(array('success' => false));

        $data = array(
            'success' => true,
            'uid' => $user->id,
            'firstname' => $user->firstname,
            'lastname' => $user->lastname,
            'number' => $user->number
        );

        return Response::json($data);
    }

    public function get_delete($number)
    {
        $validation = Validator::make(array('number' => $number), array('number' => 'required|integer'));

        if ($validation->fails()) {
            return Redirect::to('admin/users');
        }

        $user = Users::getByNumber($number);

        if ($user == null) return Redirect::to('admin/users');

        return View::make('admin/users.delete')
            ->with('user', $user);
    }

    public function post_delete()
    {
        $validation = Validator::make(Input::get(), array('userID' => 'required|integer'));
        
        if ($validation->fails()) {
            $message = "Invalid input!";
            return Helper::json(false, $message);
        }

        Users::delete(Input::get('userID'));

        return Response::json(array('success' => true));
    }

    public function get_bookings($number)
    {
        $validation = Validator::make(array('number' => $number), array('number' => 'required|integer'));

        if ($validation->fails()) {
            return Redirect::to('admin/users');
        }

        $user = Users::getByNumber($number);

        if ($user == null) return Redirect::to('admin/users');

        $trips = Bookings::get($user->id);

        return View::make('admin/users.bookings')
            ->with('user', $user)
            ->with('trips', $trips);
    }

}
