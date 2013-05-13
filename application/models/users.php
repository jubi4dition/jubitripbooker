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

    public static function paginate()
    {
        return DB::table('users')
            ->order_by('users.id', 'desc')
            ->paginate(25);
    }

    public static function hasNumber($number)
    {
        $user = self::getByNumber($number);

        return ($user != null) ? true : false;
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

    public static function insertExt($firstname, $lastname, $number)
    {
        $id = DB::table('users')->insert_get_id(array(
            'firstname' => $firstname, 'lastname' => $lastname, 'number' => $number));

        return DB::table('users')->where('id', '=', $id)->first();
    }

    public static function delete($id)
    {
        return DB::table('users')
            ->where('id', '=', $id)
            ->delete();
    }

    public static function deleteExt($id)
    {
        $user = DB::table('users')->where('id', '=', $id)->first();

        DB::table('users')
            ->where('id', '=', $id)
            ->delete();

        return $user;
    }

    public static function deleteByNumber($number)
    {
        return DB::table('users')
            ->where('number', '=', $number)
            ->delete();
    }

    public static function count()
    {
        return DB::table('users')->count();
    }
    
}
