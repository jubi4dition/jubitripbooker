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

    public static function get_user_data($uid)
    {
        return DB::table('users')->where_id($uid)->first();
    }
    
}
