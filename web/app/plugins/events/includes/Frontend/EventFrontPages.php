<?php 

namespace Events\Frontend;

class EventFrontPages
{
    /**
     * Creates the event list page if it doesn't exist.
     */
    public static function create_event_list_page()
    {
        $page = get_posts([
            'title' => 'event-list',
            'post_type' => 'page'
        ]);

        if (!$page) {
            $page_data = array(
                'post_title' => 'event-list',
                'post_content' => '',
                'post_status' => 'publish',
                'post_type' => 'page',
                'post_author' => get_current_user_id(),
            );

            $new_page = wp_insert_post($page_data);

            if ($new_page) {
                update_post_meta($new_page, '_wp_page_template', 'templates/template-event-list-page.php');
            }
        }
    }

    /**
     * Deletes the event list page if it exists.
     */
    public static function delete_event_list_page()
    {
        // Get the page by title
        $page = get_posts([
            'title' => 'event-list',
            'post_type' => 'page',
            'posts_per_page' => 1
        ]);

        // Check if the page exists
        if ($page) {
            // Get the page ID
            $page_id = $page[0]->ID;

            // Delete the page
            wp_delete_post($page_id, true);  // true to force delete, skipping trash
        }
    }
}
