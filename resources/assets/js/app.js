// Mobile Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('mobile-menu-toggle');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function() {
            // Toggle mobile menu visibility
            mobileMenu.classList.toggle('hidden');

            // Toggle icons
            menuIcon.classList.toggle('hidden');
            closeIcon.classList.toggle('hidden');

            // Prevent body scroll when menu is open
            if (!mobileMenu.classList.contains('hidden')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });
    }
});
