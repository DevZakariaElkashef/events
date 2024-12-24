<?php

use Events\Database\Models\Event;
/**
 * Template Name: Event List Page
 * Description: A custom template to display a list of events with a switch for past events and a search input.
 */


$event_list = new Event();

// Get search query and page from the URL, and pass them to get_events
$search_query = isset($_GET['search']) ? sanitize_text_field($_GET['search']) : '';
$paged = isset($_GET['paged']) ? absint($_GET['paged']) : 1;

// Fetch the event data based on the search query and pagination
$event_data = $event_list->get_events($search_query, $paged);
$events = $event_data['events'];
$total_events = $event_data['total_events'];

// Calculate the total number of pages
$total_pages = $event_list->get_total_pages($total_events);

// Get the current URL
$current_url = $event_list->get_current_url();

// Function to append query parameters
$next_page_url = $event_list->add_query_arg_to_url($current_url, 'paged', $paged + 1);
$prev_page_url = $event_list->add_query_arg_to_url($current_url, 'paged', $paged - 1);
$search_url = $event_list->add_query_arg_to_url($current_url, 'search', $search_query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event List</title>
    
</head>

<body>
    <div class="container">
        <div class="event-list-page">
            <h1 class="text-center">Event List</h1>

            <div class="event-filter">
                <!-- Search input -->
                <form id="searchForm">
                    <input type="text" name="search" placeholder="Search events..."
                        value="<?php echo esc_attr($search_query); ?>">
                    <button type="submit">Search</button>
                </form>
            </div>

            <?php if ($events): ?>
                <table class="event-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Title</th>
                            <th>Description</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($events as $key => $event): ?>
                            <tr>
                                <td><?php echo esc_html($event->id) ?></td>
                                <td><?php echo esc_html($event->title); ?></td>
                                <td><?php echo esc_html($event->description); ?></td>
                                <td><?php echo esc_html($event->date); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p class="no-events">No events found.</p>
            <?php endif; ?>

            <!-- Pagination controls -->
            <div class="pagination">
                <?php if ($paged > 1): ?>
                    <a href="<?php echo $event_list->add_query_arg_to_url($current_url, 'paged', 1) . ($search_query ? '&search=' . urlencode($search_query) : ''); ?>"
                        class="pagination-link first-page">First</a>
                    <a href="<?php echo $event_list->add_query_arg_to_url($current_url, 'paged', $paged - 1) . ($search_query ? '&search=' . urlencode($search_query) : ''); ?>"
                        class="pagination-link prev-page">Prev</a>
                <?php endif; ?>

                <!-- Current page indicator -->
                <span class="current-page">
                    Page <?php echo $paged; ?> of <?php echo $total_pages; ?>
                </span>

                <?php if ($paged < $total_pages): ?>
                    <a href="<?php echo $event_list->add_query_arg_to_url($current_url, 'paged', $paged + 1) . ($search_query ? '&search=' . urlencode($search_query) : ''); ?>"
                        class="pagination-link next-page">Next</a>
                    <a href="<?php echo $event_list->add_query_arg_to_url($current_url, 'paged', $total_pages) . ($search_query ? '&search=' . urlencode($search_query) : ''); ?>"
                        class="pagination-link last-page">Last</a>
                <?php endif; ?>
            </div>

        </div>
    </div>
</body>

</html>
