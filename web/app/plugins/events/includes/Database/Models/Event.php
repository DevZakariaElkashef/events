<?php

namespace Events\Database\Models;

class Event
{
    private $show_past_events;
    private $events_per_page;
    private $wpdb;

    public function __construct()
    {
        $this->show_past_events = get_option('show_past_events');
        $this->events_per_page = get_option('events_per_page', 10);
        $this->wpdb = $GLOBALS['wpdb'];
    }

    /**
     * Get events based on provided parameters.
     * 
     * @param string $search_query The search query for event title and description.
     * @param int $paged The current page number for pagination.
     * @return array The list of events and total count.
     */
    public function get_events($search_query = '', $paged = 1)
{
    // Ensure paged is at least 1 to avoid negative offset
    $paged = max(1, $paged); // Set $paged to 1 if it's less than 1

    $offset = ($paged - 1) * $this->events_per_page;

    $query = "
        SELECT * FROM {$this->wpdb->prefix}events
    ";

    // Add a search filter if search query is provided
    if ($search_query) {
        $search_query_wildcard = '%' . $search_query . '%';
        $query .= " WHERE (title LIKE '$search_query_wildcard' OR description LIKE '$search_query_wildcard')";
    }

    // Get the total number of events for pagination
    $total_events = $this->wpdb->get_var(
        "
        SELECT COUNT(*) FROM {$this->wpdb->prefix}events
        " . ($search_query ? "WHERE (title LIKE '$search_query_wildcard' OR description LIKE '$search_query_wildcard')" : "")
    );

    // Add ordering and LIMIT to the query
    $query .= "
        ORDER BY date DESC
        LIMIT $this->events_per_page OFFSET $offset
    ";

    // Run the query to get the events
    $events = $this->wpdb->get_results($query);

    return [
        'events' => $events,
        'total_events' => $total_events
    ];
}


    /**
     * Get total number of pages based on total events.
     * 
     * @param int $total_events The total count of events.
     * @return int The total number of pages.
     */
    public function get_total_pages($total_events)
    {
        return ceil($total_events / $this->events_per_page);
    }

    /**
     * Get the current page URL without any query parameters.
     * 
     * @return string The current page URL.
     */
    public function get_current_url()
    {
        return get_permalink();
    }

    /**
     * Append query parameters to the URL.
     * 
     * @param string $url The base URL.
     * @param string $key The query parameter key.
     * @param string $value The query parameter value.
     * @return string The modified URL with the new query parameter.
     */
    public function add_query_arg_to_url($url, $key, $value)
    {
        $parsed_url = parse_url($url);
        parse_str($parsed_url['query'] ?? '', $query_args);
        $query_args[$key] = $value;
        return $parsed_url['path'] . '?' . http_build_query($query_args);
    }
}
