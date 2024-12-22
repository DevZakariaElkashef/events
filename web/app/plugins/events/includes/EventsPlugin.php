<?php

namespace Events;

use Events\Database\DatabaseManager;

class EventsPlugin
{
    public function __construct()
    {
        // Hook for activation to create tables
        add_action('activate_events/events.php', [$this, 'activate']);
        
        // Hook for deactivation to rollback
        add_action('deactivate_events/events.php', [$this, 'deactivate']);

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
        
    }
}
