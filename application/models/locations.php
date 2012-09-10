<?php

class Locations {
	
	public static function get_location()
	{
		return DB::table('locations')->first();
	}

	public static function get_locations()
	{
		return DB::table('locations')->order_by('day', 'asc')->get();
	}

}
