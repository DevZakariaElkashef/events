<?php


namespace Events\Admin;

class OptionPage
{
    public function __construct()
    {
        add_action('admin_menu', [$this, 'add_admin_menu']);
    }

    public function add_admin_menu()
    {
        add_options_page(
            'Events Settings',
            'Events Settings',
            'manage_options',
            'events-settings',
            [$this, 'settings_page']
        );
    }

    public function settings_page()
    {
        // Include the template for the settings page
        include plugin_dir_path(__FILE__) . '../../templates/admin-settings-page.php';
    }
}
