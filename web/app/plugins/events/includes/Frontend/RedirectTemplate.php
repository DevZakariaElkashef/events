<?php

namespace Events\Frontend;

class RedirectTemplate
{
    public function __construct()
    {
        add_filter('template_include', [$this, 'load_event_list_template']);
        
        add_action('wp_enqueue_scripts', [$this, 'enqueue_event_list_assets']);
    }

    /**
     * Load the custom template for the event list page.
     * 
     * @param string $template
     * @return string
     */
    public function load_event_list_template($template)
    {
        $page = get_posts([
            'title' => 'event-list',
            'post_type' => 'page'
        ]);

        if ($page) {
            return plugin_dir_path(__FILE__) . '../../templates/template-event-list-page.php';
        }

        return $template;
    }

    /**
     * Enqueue the CSS and JS assets for the event list page.
     */
    public function enqueue_event_list_assets()

    {
        $page = get_posts([
            'title' => 'event-list',
            'post_type' => 'page'
        ]);

        if ($page) {
            // Enqueue the CSS
            wp_enqueue_style(
                'event-list-style', // Handle
                plugin_dir_url(__FILE__) . '../../assets/event-list.css', // Path to the CSS file
                [], // Dependencies (none in this case)
                '1.0', // Version
                'all' // Media type
            );

            // Enqueue the JS
            wp_enqueue_script(
                'event-list-script', // Handle
                plugin_dir_url(__FILE__) . 'assets/event-list.js', // Path to the JS file
                [], // Dependencies (none in this case)
                '1.0', // Version
                true // Load in footer
            );
        }
    }
}
