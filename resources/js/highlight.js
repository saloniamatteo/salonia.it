// Speed-highlight
import { highlightElement } from '@speed-highlight/core';

// Clipboard JS
import Clipboard from 'clipboard';

// Style
import '../../node_modules/@speed-highlight/core/dist/themes/atom-dark.css';

// Initialize Clipboard.js
var clipboard = new Clipboard('.copyButton', {
    text: function(trigger) {
        // Get text from parent node -> pre code -> (inner text)
        return trigger.parentNode.querySelector('pre code').innerText;
    }
});

// Highlight all elements
document
    .querySelectorAll('[class*="shj-lang-"]')
    .forEach(elm => {
        const lang = elm.hasAttribute("data-lang")
                     ? elm.dataset.lang.toLowerCase()
                     : '';

        // Show line numbers
        highlightElement(elm, lang, 'multiline', { hideLineNumbers: false});
    });
