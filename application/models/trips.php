<?php

class Trips {
    
    public static function get($locationID)
    {
        return DB::table('trips')->where_lid($locationID)->get();
    }

    public static function getAll()
    {
        return DB::table('trips')
            ->left_join('locations', 'trips.lid', '=', 'locations.id')
            ->get(array('trips.id', 'trips.title', 'trips.cost', 'locations.name', 'locations.day'));
    }

}
