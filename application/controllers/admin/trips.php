<?php

class Admin_Trips_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        parent::__construct();
        
        $this->filter('before', 'authAdmin');
    }

    public function get_index()
    {
        return View::make('admin/trips.index');
    }

    public function get_show()
    {
        $trips = Trips::getAll();
        
        return View::make('admin/trips.show')
            ->with('trips', $trips);
    }

    public function get_add()
    {
        $locations = Locations::getAll();

        return View::make('admin/trips.add')
            ->with('locations', $locations);
    }

    public function post_add()
    {
        $rules = array(
            'number' => 'required|integer',
            'locationID' => 'required|integer',
            'title' => 'required|max:120',
            'cost' => 'required|integer'
        );

        $validation = Validator::make(Input::get(), $rules);
        
        if ($validation->fails()) {
            $message = "Invalid input!";
            return Helper::json(false, $message);
        }

        if (Trips::hasNumber(Input::get('number'))) {
            $message = "Number already in use!";
            return Helper::json(false, $message);
        }

        Trips::insert(Input::get('number'), Input::get('locationID'), 
            Input::get('title'), Input::get('cost'));

        return Response::json(array('success' => true));
    }

    public function get_search()
    {
        return View::make('admin/trips.search');
    }

    public function post_search()
    {
        $validation = Validator::make(Input::get(), array('number' => 'required|integer'));
        
        if ($validation->fails()) return Response::json(array('success' => false));

        $trip = Trips::getByNumber(Input::get('number'));

        if ($trip == null) return Response::json(array('success' => false));

        $data = array(
            'success' => true,
            'tid' => $trip->id,
            'title' => $trip->title,
            'location' => $trip->name,
            'number' => $trip->number
        );

        return Response::json($data);
    }

    /*public function get_delete()
    {
        $users = Users::getAll();

        return View::make('admin/users.delete')
            ->with('users', $users);
    }

    public function post_delete()
    {
        $validation = Validator::make(Input::get(), array('userID' => 'required|integer'));
        
        if ($validation->fails()) {
            return Redirect::to('admin/users/delete');
        }

        Users::delete(Input::get('userID'));

        return Redirect::to('admin/users/');
    }*/

    public function get_status($number)
    {
        
    }

}
