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
 
}
