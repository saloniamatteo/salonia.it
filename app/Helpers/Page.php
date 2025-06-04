<?php

namespace App\Helpers;

class Page
{
    // Strip comments and spaces from HTML
    public static function cleanHTML($html)
    {
        $search = [
            '/\n/',             // Remove EOL
            '/\>[^\S ]+/s',     // Strip whitespaces after tags, except space
            '/[^\S ]+\</s',     // Strip whitespaces before tags, except space
            '/(\s)+/s',         // Shorten multiple whitespace sequences
            '/<!--(.|\s)*?-->/', // Remove comments
        ];

        $replace = [
            '',
            '>',
            '<',
            '\\1',
            '',
        ];

        // Split string
        $blocks = preg_split(
            '/(<\/?pre[^>]*>)/', $html,
            null, PREG_SPLIT_DELIM_CAPTURE
        );

        // Empty buffer
        $html = '';

        // Check each block
        foreach ($blocks as $i => $block) {
            if ($i % 4 == 2) {
                // Break out <pre>...</pre> with \n's
                $html .= $block;
            } else {
                // Classic search & replace
                $html .= preg_replace($search, $replace, $block);
            }
        }

        return $html;
    }

    // Minify a page
    public static function minify($page, $params = [])
    {
        // Flush buffer
        while (ob_get_level() > 0) {
            ob_end_flush();
        }

        // Start output buffering
        ob_start();

        // Get rendered page
        echo view($page, $params)->render();
        $html = ob_get_clean();

        // Return minified HTML (aka clean it up)
        return Page::cleanHTML($html);
    }
}
