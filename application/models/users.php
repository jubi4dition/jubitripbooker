<?php

class Users {

    public static function get($firstname, $lastname, $number)
    {
        return DB::table('users')
            ->where('firstname', '=', $firstname)
            ->where('lastname', '=', $lastname)
            ->where('number', '=', $number)
            ->first();
    }

    public static function getUserData($id)
    {
        return DB::table('users')->where_id($id)->first();
    }
    
}
