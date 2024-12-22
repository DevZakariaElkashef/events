document.getElementById('searchForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Prevent the default form submission

    const searchInput = document.querySelector('input[name="search"]');
    const searchQuery = searchInput.value.trim();

    // Get the current URL
    const currentUrl = new URL(window.location.href);

    // Extract the current page ID from the URL (if available)
    const pageId = currentUrl.searchParams.get('paged') || ''; // Default to empty string if not found

    // Construct the new URL with the current page ID
    currentUrl.searchParams.set('paged', pageId);
    
    if (searchQuery) {
        currentUrl.searchParams.set('search', searchQuery);
    } else {
        currentUrl.searchParams.delete('search'); // Remove 'search' if empty
    }

    // Redirect to the new URL
    window.location.href = currentUrl.toString();
});