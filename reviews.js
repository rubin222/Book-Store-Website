//close button js
document.addEventListener('DOMContentLoaded', function () {
    // Get the close button by its ID
    const closeButton = document.getElementById('close-btn');

    // Check if the element is found
    if (closeButton) {
        // Add a click event listener
        closeButton.addEventListener('click', function () {
            // Redirect to 'buyer_dashboard.html'
            window.location.href = 'buyer_dashboard.html';
        });
    } else {
        console.error('Close button not found.');
    }
});