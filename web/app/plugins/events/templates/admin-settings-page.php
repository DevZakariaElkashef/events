<!-- templates/admin-settings-page.php -->
<div class="wrap">
    <h1>Events Settings</h1>
    <form method="post" action="options.php">
        <?php
        settings_fields('events_settings_group');
        do_settings_sections('events-settings');
        ?>
        <table class="form-table">
            <tr valign="top">
                <th scope="row">Show Past Events</th>
                <td>
                    <input type="checkbox" name="show_past_events" value="1" <?php checked(1, get_option('show_past_events'), true); ?> />
                    <label for="show_past_events">Check to show past events</label>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Number of Events Per Page</th>
                <td>
                    <input type="number" name="events_per_page"
                        value="<?php echo esc_attr(get_option('events_per_page', 10)); ?>" min="1" />
                    <p class="description">How many events should be shown per page in the listing.</p>
                </td>
            </tr>
        </table>
        <?php submit_button(); ?>
    </form>
</div>
