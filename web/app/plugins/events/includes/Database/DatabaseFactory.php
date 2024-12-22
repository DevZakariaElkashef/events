<?php

namespace Events\Database;


class DatabaseFactory
{
    public function __construct()
    {
        add_action('admin_head', [$this, 'populate_fast']);

    }

    function populate_fast()
    {
        global $wpdb;

        // Step 1: Insert categories into the event_categories table
        $category_table = $wpdb->prefix . 'event_categories';
        $category_query = "INSERT INTO $category_table (`name`) VALUES ";

        // Insert 10 categories
        $category_names = ['Music', 'Technology', 'Art', 'Sports', 'Education', 'Business', 'Health', 'Environment', 'Food', 'Travel'];
        foreach ($category_names as $index => $category_name) {
            $category_query .= "('{$category_name}')";
            if ($index !== count($category_names) - 1) {
                $category_query .= ", ";
            }
        }

        // Execute category insertion
        $result = $wpdb->query($category_query);
        if ($result === false) {
            error_log('Error inserting categories: ' . $wpdb->last_error);
        } else {
            error_log('Categories inserted successfully.');
        }

        // Step 2: Insert events into the events table
        $event_table = $wpdb->prefix . 'events';
        $event_query = "INSERT INTO $event_table (`title`, `image`, `description`, `date`, `start_time`, `end_time`, `category_id`) VALUES ";

        $event_titles = ['Event 1', 'Event 2', 'Event 3', 'Event 4', 'Event 5', 'Event 6', 'Event 7', 'Event 8', 'Event 9', 'Event 10'];
        $event_descriptions = ['Description for Event 1', 'Description for Event 2', 'Description for Event 3', 'Description for Event 4', 'Description for Event 5', 'Description for Event 6', 'Description for Event 7', 'Description for Event 8', 'Description for Event 9', 'Description for Event 10'];

        // Default values for the image, start_time, and end_time
        $image = 'default_image.jpg';  // Replace with actual image logic if needed
        $start_time = '2024-01-01 09:00:00';  // Example start time
        $end_time = '2024-01-01 17:00:00';  // Example end time

        foreach ($event_titles as $index => $event_title) {
            // Here we are randomly selecting a category ID (1-10) from the categories inserted earlier.
            $category_id = rand(1, 10);  // Assuming you have 10 categories inserted.

            // Adding the event data to the query
            $event_query .= "('{$event_title}', '{$image}', '{$event_descriptions[$index]}', NOW(), '{$start_time}', '{$end_time}', {$category_id})";
            if ($index !== count($event_titles) - 1) {
                $event_query .= ", ";
            }
        }

        // Execute event insertion
        $result = $wpdb->query($event_query);
        if ($result === false) {
            error_log('Error inserting events: ' . $wpdb->last_error);
        } else {
            error_log('Events inserted successfully.');
        }
    }

}