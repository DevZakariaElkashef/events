<?php

namespace Events\Admin;

class RegisterSetting
{
    public function __construct()
    {
        add_action('admin_init', [$this, 'register_settings']);
    }


    public function register_settings()
    {
        register_setting('events_settings_group', 'show_past_events');
        register_setting('events_settings_group', 'events_per_page');
    }
}