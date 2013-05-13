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
            ->order_by('trips.id', 'desc')
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

    public static function insert($number, $locationID, $title, $cost, $places)
    {
        return DB::table('trips')->insert(array(
            'lid' => $locationID, 'number' => $number, 'title' => $title, 'cost' => $cost, 'places' => $places));
    }

    public static function insertExt($number, $locationID, $title, $cost, $places)
    {
        $id = DB::table('trips')->insert_get_id(array(
            'lid' => $locationID, 'number' => $number, 'title' => $title, 'cost' => $cost, 'places' => $places));

        return DB::table('trips')->where('id', '=', $id)->first();
    }

    public static function delete($id)
    {
        return DB::table('trips')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function deleteExt($id)
    {
        $trip = DB::table('trips')->where('id', '=', $id)->first();

        DB::table('trips')
            ->where('id', '=', $id)
            ->delete();

        return $trip;
    }

    public static function count()
    {
        return DB::table('trips')->count();
    }

    public static function places($tripID)
    {
        $trip = DB::table('trips')->where_id($tripID)->first();

        return ($trip != null) ? $trip->places : 0;
    }

}
