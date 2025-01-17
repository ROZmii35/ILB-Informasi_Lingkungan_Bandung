document.addEventListener('DOMContentLoaded', function() {
    // Handle logout menu item click
    document.getElementById('logout-menu-item').addEventListener('click', function(e) {
        e.preventDefault();
        document.getElementById('logout-form').submit();
    });
}); 