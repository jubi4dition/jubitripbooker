<?php

class Users {

	public static function get_user($firstname, $lastname, $number)
	{
		return DB::table('users')->where_firstname_and_lastname_and_number($firstname, $lastname, $number)->first();
	}

	public static function get_user_data($uid)
	{
		return DB::table('users')->where_id($uid)->first();
	}
	
}
