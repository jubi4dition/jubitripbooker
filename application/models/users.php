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

    public static function getByNumber($number)
    {
        return DB::table('users')
            ->where('number', '=', $number)
            ->first();
    }

    public static function getAll()
    {
        return DB::table('users')->get();
    }

    public static function getUserData($id)
    {
        return DB::table('users')->where_id($id)->first();
    }

    public static function insert($firstname, $lastname, $number)
    {
        return DB::table('users')->insert(array(
            'firstname' => $firstname, 'lastname' => $lastname, 'number' => $number));
    }

    public static function delete($id)
    {
        return DB::table('users')->where_id($id)->delete();
    }
    
}
