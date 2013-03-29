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
        $trips = Trips::paginate();
        
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

    public function get_delete($number)
    {
        $trip = Trips::getByNumber($number);

        return View::make('admin/trips.delete')
            ->with('trip', $trip);
    }

    public function post_delete()
    {
        $validation = Validator::make(Input::get(), array('tripID' => 'required|integer'));
        
        if ($validation->fails()) {
            $message = "Invalid input!";
            return Helper::json(false, $message);
        }

        Trips::delete(Input::get('tripID'));

        return Response::json(array('success' => true));
    }

    public function get_status($number)
    {
        $trip = Trips::getByNumber($number);

        if ($trip == null) return Redirect::to('admin/trips');

        $users = Bookings::who($trip->id);

        $status = (count($users) * 100 ) / $trip->places;

        return View::make('admin/trips.status')
            ->with('trip', $trip)
            ->with('users', $users)
            ->with('status', $status);
    }

}
