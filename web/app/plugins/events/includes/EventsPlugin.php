<?php

namespace Events;

use Events\Admin\Admin;
use Events\Admin\EventPermissions;
use Events\Database\DatabaseManager;
use Events\Frontend\EventFrontPages;
use Events\Frontend\Frontend;

class EventsPlugin
{
    public function __construct()
    {
        // active plugin config
        add_action('activate_events/events.php', [$this, 'activate']);

        // disactive plugin config
        add_action('deactivate_events/events.php', [$this, 'deactivate']);

        // Add setting page in the admin - frontend list page 
        add_action('init', [$this, 'init_plugin']);


    }

    public function activate()
    {
        DatabaseManager::runMigrations();
        EventPermissions::create();
        EventFrontPages::create_event_list_page(); // add frontend templates
        flush_rewrite_rules();

    }

    public function deactivate()
    {
        DatabaseManager::rollbackMigrations();
        EventPermissions::remove();
        EventFrontPages::delete_event_list_page();
        flush_rewrite_rules();
    }

    public function init_plugin()
    {
        new Admin(); // all admin config, pages, ...
        new Frontend(); // all frontend pages, config, ...
    }
}
