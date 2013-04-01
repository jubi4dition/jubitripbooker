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

    public function action_booked()
    { 
        $bookings = Bookings::get(Session::get('uid'));

        return View::make('user.booked')->with('bookings', $bookings);
    }

    public function action_cancel()
    {
        $validation = Validator::make(Input::get(), array('bookingID' => 'required|integer'));
        
        if ($validation->fails()) {
            return Response::json(array('success' => false));
        } 

        $deleted = Bookings::delete(Input::get('bookingID'));
        
        if ($deleted) {
            return Response::json(array('success' => true));
        } else {
            return Response::json(array('success' => false));
        }
    }

    public function action_profile()
    {
        $user = Users::getUserData(Session::get('uid'));

        return View::make('user.profile')->with('user', $user);
    }

}
