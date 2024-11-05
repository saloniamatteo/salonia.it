// These events are fired AFTER the page has loaded,
// thanks to this script being called with the "defer" attribute.
// Event listener: hashChange
window.addEventListener("hashchange", handleHashChange());

// DOMContentLoaded (see above)
// Handle hash change
// If the page hash has changed, scroll to the element,
// and scroll back some pixels, in order to account for header height
handleHashChange();

// Load icons
// This is a heavier task, compared to handling hash changes,
// and making nav-btns clickable. Since this impacts our
// loading times visibily, and it is visible only after
// the page scrolling (handle hash change), execute it later.
lucide.createIcons();

// Make nav-btns clickable
// Not really important to load immediately, since it is only
// visible after the page has loaded anyway.
handleNavBtns();
