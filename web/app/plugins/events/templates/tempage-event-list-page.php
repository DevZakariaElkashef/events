<div class="wrap">
    <h1 class="wp-heading-inline">Events Listing</h1>

    <!-- Search and Filter Form -->
    <form method="get" class="wp-clearfix">
        <input type="hidden" name="page" value="events">
        
        <div class="alignleft actions">
            <input type="text" name="search_events" placeholder="Search Events" />
            <select name="event_filter">
                <option value="">Filter by Category</option>
                <option value="upcoming">Upcoming</option>
                <option value="past">Past</option>
            </select>
            <input type="submit" value="Filter" class="button">
        </div>

        <div class="alignright actions">
            <!-- Export Buttons -->
            <button type="button" class="button" onclick="exportTableToExcel('events-table', 'events')">Export as Excel</button>
            <button type="button" class="button" onclick="exportTableToPDF('events-table', 'events')">Export as PDF</button>
        </div>
    </form>

    <!-- Table to display events -->
    <table class="wp-list-table widefat fixed striped events" id="events-table">
        <thead>
            <tr>
                <th class="manage-column">Title</th>
                <th class="manage-column">Image</th>
                <th class="manage-column">Description</th>
                <th class="manage-column">Date</th>
                <th class="manage-column">Start Time</th>
                <th class="manage-column">End Time</th>
            </tr>
        </thead>
        <tbody>
            <!-- Event 1 (Static Example) -->
            <tr>
                <td>Sample Event 1</td>
                <td><img src="https://via.placeholder.com/50" alt="Event Image"></td>
                <td>This is a sample event description. It can be long or short.</td>
                <td>January 15, 2024</td>
                <td>10:00 AM</td>
                <td>2:00 PM</td>
            </tr>

            <!-- Event 2 (Static Example) -->
            <tr>
                <td>Sample Event 2</td>
                <td><img src="https://via.placeholder.com/50" alt="Event Image"></td>
                <td>This is another sample event description with more content.</td>
                <td>January 20, 2024</td>
                <td>9:00 AM</td>
                <td>12:00 PM</td>
            </tr>

            <!-- Event 3 (Static Example) -->
            <tr>
                <td>Sample Event 3</td>
                <td><img src="https://via.placeholder.com/50" alt="Event Image"></td>
                <td>Short event description.</td>
                <td>February 5, 2024</td>
                <td>1:00 PM</td>
                <td>5:00 PM</td>
            </tr>

            <!-- No Events Found Message -->
            <!-- <tr><td colspan="6">No events found.</td></tr> -->
        </tbody>
    </table>
</div>

<script>
// Export functions (static, without any data fetching logic)
function exportTableToExcel(tableID, filename) {
    var table = document.getElementById(tableID);
    var rows = table.rows;
    var csvData = [];
    for (var i = 0; i < rows.length; i++) {
        var row = rows[i];
        var rowData = [];
        for (var j = 0; j < row.cells.length; j++) {
            rowData.push(row.cells[j].innerText);
        }
        csvData.push(rowData.join(','));
    }

    var csvFile = csvData.join('\n');
    var blob = new Blob([csvFile], { type: 'text/csv' });
    var url = URL.createObjectURL(blob);
    var a = document.createElement('a');
    a.href = url;
    a.download = filename + '.csv';
    a.click();
}

function exportTableToPDF(tableID, filename) {
    var table = document.getElementById(tableID);
    var doc = new jsPDF();
    doc.autoTable({ html: '#' + tableID });
    doc.save(filename + '.pdf');
}
</script>

<!-- Include jsPDF and AutoTable libraries for PDF export -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.9/jspdf.plugin.autotable.min.js"></script>
