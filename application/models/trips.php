<?php

class Trips {
	
	public static function get_trips($location_id)
	{
		return DB::table('trips')->where_lid($location_id)->get();
	}

}
