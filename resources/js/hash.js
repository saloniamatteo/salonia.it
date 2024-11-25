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
