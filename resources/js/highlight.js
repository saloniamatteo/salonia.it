// Speed-highlight
import { highlightElement } from '../../node_modules/@speed-highlight/core/dist/index.js';

// Style
import '../../node_modules/@speed-highlight/core/dist/themes/atom-dark.css';

// Highlight all elements
document
	.querySelectorAll('[class*="shj-lang-"]')
    .forEach(elm => {
        const lang = elm.hasAttribute("data-lang")
                     ? elm.dataset.lang.toLowerCase()
                     : '';

        // Show line numbers
        highlightElement(elm, lang, 'multiline', { hideLineNumbers: false})
    });
