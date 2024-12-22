<?php

namespace Events;

use Events\Admin\EventAdminPage;
use Events\Database\DatabaseManager;

class EventsPlugin
{
    public function __construct()
    {
        // create tables
        add_action('activate_events/events.php', [$this, 'activate']);
        
        // rollback
        add_action('deactivate_events/events.php', [$this, 'deactivate']);

        // Add setting page in the admin - 
        add_action('init', [$this, 'init_plugin']);
    }

    public static function activate()
    {
        DatabaseManager::runMigrations();
        flush_rewrite_rules();
    }

    public static function deactivate()
    {
        DatabaseManager::rollbackMigrations();
        flush_rewrite_rules();
    }

    public static function init_plugin()
    {
        new EventAdminPage; // add event setting to setting menue
    }
}
