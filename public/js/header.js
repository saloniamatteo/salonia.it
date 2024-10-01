// Compensate for header height when an element is 'opened' (eg. /page#item)
// More technically, handle hash changes
function handleHashChange() {
    // Check if page has hash
    const hash = window.location.hash;

    if (hash) {
        // Get the element by the hash
        const targetElement = document.querySelector(hash);

        if (targetElement) {
            // Get the height of the fixed header
            const headerOffset = document.querySelector('.header').offsetHeight; // Adjust the selector as needed

            // Calculate the position to scroll to
            // Add 15px on top of element
            const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY - 15;
            const offsetPosition = elementPosition - headerOffset;

            // Scroll to the adjusted position
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth' // Optional: for smooth scrolling
            });
        }
    }
}

// Execute only after the page has finished rendering
document.addEventListener('DOMContentLoaded', function() {
    // Get all the nav-btns in the page
    let navBtns = document.querySelectorAll('.nav-btn');

    // Add an event handler for all nav-btns to enable the dropdown functionality
    navBtns.forEach(function (ele) {
        ele.addEventListener('click', function() {
            // Get the dropdown-menu associated with this nav button (insert the id of your menu)
            let dropDownMenu = document.getElementById('header-menu');

            // Toggle the nav-btn and the dropdown menu
            ele.classList.toggle('active');
            dropDownMenu.classList.toggle('active');
        });
    });

    handleHashChange();
});

// Handler for hash changes
document.addEventListener('hashchange', function() { handleHashChange(); });

// HACK: for some reason not all browsers support document.addEventListener('hashchange')
// (Meaning the event doesn't fire even when the hash actually changes...)
window.onhashchange = function() { handleHashChange(); };
