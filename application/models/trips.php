<?php

class Trips {
    
    public static function get($locationID)
    {
        return DB::table('trips')->where_lid($locationID)->get();
    }

}
