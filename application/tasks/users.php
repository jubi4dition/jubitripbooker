<?php

class Users_Task {
 
    public function insert($arguments)
    {
        for ($i = 0; $i < 100; $i++) {
            $number = 900000 + $i;
            
            Users::insert('Firstname', 'Lastname', $number);
        }
    }
 
    public function delete($arguments)
    {
        for ($i = 0; $i < 100; $i++) {
            $number = 900000 + $i;
            
            Users::deleteByNumber($number);
        }
    }

    public function number($arguments)
    {
        $i = 100;

        $trips = DB::table('trips')->get();

        foreach ($trips as $trip) {
            DB::table('trips')->where('id', '=', $trip->id)->update(array('number' => $i));

            $i++;
        }
    }
}
