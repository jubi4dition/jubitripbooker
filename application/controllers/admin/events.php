<?php

class Admin_Events_Controller extends Base_Controller {

    public function action_index()
    {
        $events = Events::getCurrent();

        return View::make('admin/events.index')
            ->with('events', $events);
    }

}
