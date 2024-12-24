<?php

namespace Events\Admin;

class EventsPage
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_event_menu']);
    }

    public function add_event_menu()
    {
        add_menu_page(
            'Events', 
            'Events', 
            'manage_events',
            'events', 
            [$this, 'events_page'], 
            'dashicons-calendar',
            30
        );

        add_submenu_page(
            'events', 
            'Create Event', 
            'Create Event', 
            'create_event',
            'create-event', 
            [$this, 'create_event_page']
        );
    }

    public function events_page()
    {
        if (!current_user_can('manage_events')) {
            wp_die('You do not have sufficient permissions to access this page.');
        }

        include plugin_dir_path(__FILE__) . '../../templates/tempage-event-list-page.php';
    }

    public function create_event_page()
    {
        if (!current_user_can('create_event')) {
            wp_die('You do not have sufficient permissions to create an event.');
        }

        include plugin_dir_path(__FILE__) . '../../templates/tempage-event-create-page.php';
    }
}
