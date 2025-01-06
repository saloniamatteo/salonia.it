// Load assets (for Vite)
import.meta.glob([
    '../img/*',
    '../css/fonts/*.woff2',
]);

// Icons
import { createIcons,
AtSign, Binary, BookOpenText, CirclePlus, Facebook, FileBadge, FolderCog,
Github, Globe, HandCoins, Info, Instagram, Laptop, Link, Mail, MapPin,
Package, ScrollText, Search, Send, Server, ServerCog, TriangleAlert, UserRound,
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

// Fire events after page load
document.addEventListener('DOMContentLoaded', () => {
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
            Info,
            Instagram,
            Laptop,
            Link,
            Mail,
            MapPin,
            Package,
            ScrollText,
            Search,
            Send,
            Server,
            ServerCog,
            TriangleAlert,
            UserRound,
        }
    });

    // Make nav-btns clickable
    // Not really important to load immediately, since it is only
    // visible after the page has loaded anyway.
    handleNavBtns();
});
