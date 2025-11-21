//admin logout
document.addEventListener('DOMContentLoaded', function () {
    const logout = document.querySelector('#logout');
  
    // Check if the element is found
    if (logout) {
        // Add a click event listener
        logout.addEventListener('click', function () {
            // Redirect to 'login3.php' when the logout button is clicked
            window.location.href = 'login2.php';
        });
    } else {
        console.error('Element with ID "logout" not found.');
    }
  
    // Toggle search form visibility
    const searchForm = document.querySelector('.search-form');
    document.querySelector('#search-btn').onclick = () => {
        searchForm.classList.toggle('active');
    };
  });