<?php

namespace Events\Frontend;

class RedirectTemplate
{
    public function __construct()
    {
        add_filter('template_include', [$this, 'load_event_list_template']);
    }

    public function load_event_list_template($template)
    {
        if (is_page('event-list')) {
            return plugin_dir_path(__FILE__) . '../../templates/template-event-list-page.php';
        }

        return $template;
    }
}