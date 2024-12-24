<?php

namespace Events\Admin;

class EventPermissions
{
    public static function create()
    {
        $role = get_role('administrator');

        if ($role) {            
            $role->add_cap('manage_events'); 
            $role->add_cap('create_event');  
            $role->add_cap('delete_event');  
            $role->add_cap('edit_event');    
        }
    }

    
    public static function remove()
    {
        $role = get_role('administrator');

        if ($role) {
            $role->remove_cap('manage_events');
            $role->remove_cap('create_event');
            $role->remove_cap('delete_event');
            $role->remove_cap('edit_event');
        }
    }
}
