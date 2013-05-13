<?php

class Events {

    public static function getAll()
    {
        return DB::table('events')
            ->order_by('id', 'desc')
            ->get();
    }

    public static function getCurrent()
    {
        return DB::table('events')
            ->order_by('id', 'desc')
            ->take(25)->get();
    }
    
    public static function user($type, $user, $admin)
    {
        $description = $user->firstname." ".$user->lastname."(".$user->number.")";

        if ($type === 0) {
            $message = "The user ".$description." has been added by ".$admin."!";
        } elseif ($type == 1) {
            $message = "The user ".$description." has been deleted by ".$admin."!";
        } else {
            return;
        }

        return DB::table('events')->insert(array(
            'type' => $type, 'message' => $message));
    }

    public static function trip($type, $trip, $admin)
    {
        $description = $trip->title."(".$trip->number.")";

        if ($type === 2) {
            $message = "The trip ".$description." has been added by ".$admin."!";
        } elseif ($type == 3) {
            $message = "The trip ".$description." has been deleted by ".$admin."!";
        } else {
            return;
        }

        return DB::table('events')->insert(array(
            'type' => $type, 'message' => $message));
    }

    public static function deleteAll()
    {
        return DB::table('events')->delete();
    }

}
