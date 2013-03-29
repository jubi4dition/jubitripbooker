<?php

class Trips {
    
    public static function get($locationID)
    {
        return DB::table('trips')->where_lid($locationID)->get();
    }

    public static function getAll()
    {
        return DB::table('trips')
            ->join('locations', 'trips.lid', '=', 'locations.id')
            ->get(array('trips.number', 'trips.title', 'trips.cost', 'locations.name', 'locations.day'));
    }

    public static function paginate()
    {
        return DB::table('trips')
            ->join('locations', 'trips.lid', '=', 'locations.id')
            ->order_by('trips.number', 'asc')
            ->paginate(25, array('trips.number', 'trips.title', 'trips.cost', 'locations.name', 'locations.day'));
    }

    public static function getByNumber($number)
    {
        return DB::table('trips')
            ->join('locations', 'trips.lid', '=', 'locations.id')
            ->where('number', '=', $number)
            ->first(array('trips.id', 'trips.number', 'trips.title', 'trips.places', 'locations.name'));
    }

    public static function hasNumber($number)
    {
        $trip = self::getByNumber($number);

        return ($trip != null) ? true : false;
    }

    public static function insert($number, $locationID, $title, $cost)
    {
        return DB::table('trips')->insert(array(
            'lid' => $locationID, 'number' => $number, 'title' => $title, 'cost' => $cost));
    }

}
