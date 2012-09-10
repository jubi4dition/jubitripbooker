<?php

class Bookings {
	
	public static function book_trip($uid, $tid)
	{
		return DB::table('bookings')->insert(
			array('uid' => $uid, 'tid' => $tid));
	}

	public static function get_trips($uid)
	{
		return DB::table('bookings')
			->join('trips', 'bookings.tid', '=', 'trips.id')
			->join('locations', 'trips.lid', '=', 'locations.id')
			->where_uid($uid)
			->order_by('day', 'asc')
			->get(array('bookings.id', 'locations.name', 'locations.day', 'trips.title', 'trips.cost'));
	}

	public static function delete($booked_trip)
	{
		return DB::table('bookings')->where_id($booked_trip)->delete();
	}

}