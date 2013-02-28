<?php

class Locations {
    
    public static function get()
    {
        return DB::table('locations')->first();
    }

    public static function getAll()
    {
        return DB::table('locations')->order_by('day', 'asc')->get();
    }

}
