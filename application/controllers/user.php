<?php

class User_Controller extends Base_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->filter('before', 'logged_in');
    }

    public function action_index()
    {
        $locations = Locations::getAll();

        return View::make('user.index')->with('locations', $locations);
    }

    public function action_book()
    {
        $locations = Locations::getAll();

        foreach ($locations as $location) {
            $trips[$location->name] = Trips::get($location->id);
        }
        
        return View::make('user.book')
            ->with('locations', $locations)
            ->with('trips', $trips);
    }

    public function action_book_trip()
    {
        $location = Input::get('location');
        $tripID = Input::get($location);
        $userID = Session::get('uid');

        $booked = Bookings::book($userID, $tripID);
        
        if ($booked) {
            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    }

    public function action_cancel_trip()
    {
        $validation = Validator::make(Input::all(), array('booking_id' => 'required|integer'));
        
        if ($validation->fails()) {
            return Response::json(array('success' => false));
        } 

        $bookingID = Input::get('booking_id');
        $deleted = Bookings::delete($bookingID);
        
        if ($deleted) {
            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    }

    public function action_booked()
    { 
        $bookedTrips = Bookings::get(Session::get('uid'));

        return View::make('user.booked')->with('booked_trips', $bookedTrips);
    }

    public function action_profile()
    {
        $user = Users::getUserData(Session::get('uid'));

        return View::make('user.profile')->with('user', $user);
    }

}
