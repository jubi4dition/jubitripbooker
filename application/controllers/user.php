<?php

class User_Controller extends Base_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->filter('before', 'logged_in');
	}

	public function action_index()
	{
		$locations = Locations::get_locations();
		return View::make('user.index')->with('locations', $locations);
	}

	public function action_book()
	{
		$locations = Locations::get_locations();
		foreach ($locations as $location) {
			$trips[$location->name] = Trips::get_trips($location->id);
		}
		
		return View::make('user.book')
			->with('locations', $locations)
			->with('trips', $trips);
	}

	public function action_book_trip()
	{
		sleep(1);
		$location = Input::get('location');
		$trip_id = Input::get($location);
		$user_id = Session::get('uid');

		$booked = Bookings::book_trip($user_id, $trip_id);
		if ($booked) {
			return Response::json(array('success' => true));
		} else {
			return Response::json(array('success' => false));
		}
	}

	public function action_cancel_trip()
	{
		sleep(1);
		$validation = Validator::make(Input::all(), array('booking_id' => 'required|integer'));
		if ($validation->fails()) {
			return Response::json(array('success' => false));
		} 

		$booking_id = Input::get('booking_id');
		$deleted = Bookings::delete($booking_id);
		if ($deleted) {
			return Response::json(array('success' => true));
		} else {
			return Response::json(array('success' => false));
		}
	}

	public function action_booked()
	{
		
		$booked_trips = Bookings::get_trips(Session::get('uid'));
		return View::make('user.booked')->with('booked_trips', $booked_trips);
	}

	public function action_trips()
	{
		$trips = Bookings::get_trips(1);
		print_r($trips);
	}

	public function action_profile()
	{
		$user = Users::getUserData(Session::get('uid'));
		return View::make('user.profile')->with('user', $user);
	}

}