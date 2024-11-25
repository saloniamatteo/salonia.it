// Load assets (for Vite)
import.meta.glob([
    '../img/*',
    '../css/fonts/*.woff2',
]);

// Icons
import { createIcons,
AtSign, Binary, BookOpenText, CirclePlus, Facebook, FileBadge, FolderCog,
Github, Globe, HandCoins, Instagram, Laptop, Link, Mail, MapPin, Network,
Package, ScrollText, Search, Send, Server, ServerCog, UserRound,
} from 'lucide';

// Make all nav-btns in the page clickable
function handleNavBtns() {
    // Get all the nav-btns in the page
    let navBtns = document.querySelectorAll('.nav-btn');

    // Add an event handler for all nav-btns to enable the dropdown functionality
    navBtns.forEach((ele) => {
        ele.onclick = () => {
            // Get the dropdown-menu associated with this nav button
            let dropDownMenu = document.getElementById('header-menu');

            // Toggle the nav-btn and the dropdown menu
            ele.classList.toggle('active');
            dropDownMenu.classList.toggle('active');
        };
    });
}

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
            const headerOffset = document.querySelector('.header').offsetHeight;

            // Calculate the position to scroll to
            // Add 15px on top of element
            const elementPosition = targetElement.getBoundingClientRect().top + window.scrollY - 15;
            const offsetPosition = elementPosition - headerOffset;

            // Smooth scroll to the adjusted position
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
        }
    }
}

// Handle hash change
window.onhashchange = () => { handleHashChange() };

// Fire events after page load
document.addEventListener('DOMContentLoaded', () => {
    // Handle hash change
    // If the page hash has changed, scroll to the element,
    // and scroll back some pixels, in order to account for header height
    handleHashChange();

    // Load icons
    // This is a heavier task, compared to handling hash changes,
    // and making nav-btns clickable. Since this impacts our
    // loading times visibily, and it is visible only after
    // the page scrolling (handle hash change), execute it later.
    //lucide.createIcons();
    createIcons({
        icons: {
            AtSign,
            Binary,
            BookOpenText,
            CirclePlus,
            Facebook,
            FileBadge,
            FolderCog,
            Github,
            Globe,
            HandCoins,
            Instagram,
            Laptop,
            Link,
            Mail,
            MapPin,
            Network,
            Package,
            ScrollText,
            Search,
            Send,
            Server,
            ServerCog,
            UserRound,
        }
    });

    // Make nav-btns clickable
    // Not really important to load immediately, since it is only
    // visible after the page has loaded anyway.
    handleNavBtns();
});
