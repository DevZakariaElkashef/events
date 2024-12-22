<?php

namespace Events;

use Events\Admin\EventAdminPage;
use Events\Database\DatabaseFactory;
use Events\Database\DatabaseManager;
use Events\Frontend\EventFrontPages;
use Events\Frontend\RedirectTemplate;

class EventsPlugin
{
    public function __construct()
    {
        // create tables
        add_action('activate_events/events.php', [$this, 'activate']);

        // rollback
        add_action('deactivate_events/events.php', [$this, 'deactivate']);

        // Add setting page in the admin - frontend list page 
        add_action('init', [$this, 'init_plugin']);


    }

    public function activate()
    {
        DatabaseManager::runMigrations();
        EventFrontPages::create_event_list_page(); // add frontend templates
        flush_rewrite_rules();

    }

    public function deactivate()
    {
        DatabaseManager::rollbackMigrations();
        EventFrontPages::delete_event_list_page();
        flush_rewrite_rules();
    }

    public function init_plugin()
    {
        new EventAdminPage(); // add event setting to setting menue
        new RedirectTemplate(); // redirect to plugin template
        // new DatabaseFactory(); // factory to fill dummy data
    }
}
