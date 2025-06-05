// Speed-highlight
import { highlightElement } from '@speed-highlight/core';

// Clipboard JS
import Clipboard from 'clipboard';

// Sleep
import { sleep } from './sleep.js';

// Style
import '../../node_modules/@speed-highlight/core/dist/themes/atom-dark.css';

let span_text = '';

async function confirmClick(ele) {
    // Show a checkmark
    ele.innerText = ' ✅ OK! ';

    // Wait 1 second
    await sleep(1000);

    // Show original text
    ele.innerText = span_text;
}

// Initialize Clipboard.js
var clipboard = new Clipboard('.copyButton', {
    text: function(trigger) {
        // Get span text
        let span = trigger.querySelector("span");

        // Check if text is already set
        // If not, set it
        if (!span_text) {
            span_text = span.innerText;
        }

        // Confirm user click (show checkmark)
        confirmClick(span);

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
