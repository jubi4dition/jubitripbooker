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
        Validator::register('alpha_space', function($attribute, $value) {
            return preg_match('/^([-a-z0-9_ ])+$/i', $value);
        });

        $rules = array(
            'number' => 'required|integer',
            'locationID' => 'required|integer',
            'title' => 'required|max:120|alpha_space',
            'cost' => 'required|integer',
            'places' => 'required|integer'
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

        $trip = Trips::insertExt(Input::get('number'), Input::get('locationID'), 
            Input::get('title'), Input::get('cost'), Input::get('places'));

        if ($trip == null) {
            $message = "Insert failed!";
            return Helper::json(false, $message);
        }

        Events::trip(
            2, 
            $trip, 
            Session::get('name')
        );

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
        $validation = Validator::make(array('number' => $number), array('number' => 'required|integer'));

        if ($validation->fails()) {
            return Redirect::to('admin/trips');
        }

        $trip = Trips::getByNumber($number);

        if ($trip == null) return Redirect::to('admin/trips');

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

        $trip = Trips::deleteExt(Input::get('tripID'));

        if ($trip == null) {
            $message = "Insert failed!";
            return Helper::json(false, $message);
        }

        Events::trip(
            3, 
            $trip, 
            Session::get('name')
        );

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

    public function get_book($number)
    {
        $validation = Validator::make(array('number' => $number), array('number' => 'required|integer'));

        if ($validation->fails()) {
            return Redirect::to('admin/trips');
        }

        $trip = Trips::getByNumber($number);

        if ($trip == null) return Redirect::to('admin/trips');

        return View::make('admin/trips.book')
            ->with('trip', $trip);
    }

    public function post_book()
    {
        $validation = Validator::make(Input::get(), array(
            'tripID' => 'required|integer', 'number' => 'required|integer'));
        
        if ($validation->fails()) {
            $message = "Invalid input!";
            return Helper::json(false, $message);
        }

        $tripID = Input::get('tripID');
        $user = Users::getByNumber(Input::get('number'));

        if ($user == null) {
            $message = "User does not exits!";
            return Helper::json(false, $message);
        }

        if (Bookings::exists($user->id, $tripID)) {
            $message = "Already booked!";
            return Helper::json(false, $message);
        }

        if (!Bookings::free($tripID)) {
            $message = "The trip is booked out!";
            return Helper::json(false, $message);
        }

        if (Bookings::insert($user->id, $tripID)) {
            return Response::json(array('success' => true));
        } else {
            $message = "Insert failed!";
            return Response::json(array('success' => false));
        }
    }

}
