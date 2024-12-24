<?php

namespace Events\Frontend;

class PermaLinkSetting
{
    public function __construct()
    {
        add_action('init', [$this, 'set_custom_permalink_structure']);
    }


    public function set_custom_permalink_structure()
    {
        // Set the permalink structure to 'post_name'
        global $wp_rewrite;
        $wp_rewrite->set_permalink_structure('/%postname%/');

        // Flush rewrite rules to apply changes
        flush_rewrite_rules();
    }
}
