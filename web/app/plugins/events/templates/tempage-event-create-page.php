<div class="wrap">
    <h1 class="wp-heading-inline">Create New Event</h1>

    <!-- Event Form -->
    <form method="post" enctype="multipart/form-data" class="form-table">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="event_title">Event Title</label>
                    </th>
                    <td>
                        <input name="event_title" type="text" id="event_title" class="regular-text" required />
                        <p class="description">Enter the title of the event.</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="event_description">Event Description</label>
                    </th>
                    <td>
                        <textarea name="event_description" id="event_description" class="large-text" rows="5" required></textarea>
                        <p class="description">Provide a brief description of the event.</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="event_date">Event Date</label>
                    </th>
                    <td>
                        <input name="event_date" type="date" id="event_date" class="regular-text" required />
                        <p class="description">Select the event date.</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="event_start_time">Event Start Time</label>
                    </th>
                    <td>
                        <input name="event_start_time" type="time" id="event_start_time" class="regular-text" required />
                        <p class="description">Select the event start time.</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="event_end_time">Event End Time</label>
                    </th>
                    <td>
                        <input name="event_end_time" type="time" id="event_end_time" class="regular-text" required />
                        <p class="description">Select the event end time.</p>
                    </td>
                </tr>

                <tr>
                    <th scope="row">
                        <label for="event_image">Event Image</label>
                    </th>
                    <td>
                        <input name="event_image" type="file" id="event_image" accept="image/*" class="regular-text" />
                        <p class="description">Upload an image for the event (optional).</p>
                    </td>
                </tr>

            </tbody>
        </table>

        <!-- Submit Button -->
        <p class="submit">
            <input type="submit" name="submit_event" id="submit_event" class="button-primary" value="Create Event" />
        </p>
    </form>
</div>

<!-- Custom JS for Image Preview (if required) -->
<script>
    // Optional: Add image preview functionality if needed
    document.getElementById("event_image").addEventListener("change", function(e) {
        var reader = new FileReader();
        reader.onload = function(event) {
            var imagePreview = document.createElement("img");
            imagePreview.src = event.target.result;
            imagePreview.style.maxWidth = "200px"; // Limit image size
            imagePreview.style.marginTop = "10px";
            document.querySelector("form").appendChild(imagePreview);
        };
        reader.readAsDataURL(e.target.files[0]);
    });
</script>
