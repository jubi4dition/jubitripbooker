<?php

class Helper {
    
    public static function json($success, $message)
    {
        return Response::json(array(
            'success' => $success,
            'message' => $message
        ));
    }
}
