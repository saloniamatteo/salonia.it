<?php

namespace App\Http\Controllers;

use App\Helpers\Locale;
use App\Helpers\Page;
use Illuminate\Support\Facades\View;

class PageController
{
    /*
     * Language override
     *
     * Setting this to true means that we do not care about the user's
     * preferred language (aka HTTP Accept-Language). This happens
     * if we load a page with a forced lang in the URL (/it/page)
    */
    private $langOverride = false;

    public function viewLang($lang, $page = 'index') {
        // Make sure page is loaded with lang
        $this->langOverride = true;
        Locale::setLocale($lang);

        // Continue to our main view() func
        return $this->view($page);
    }

    public function view($page = 'index') {
        // Check if we need to negotiate locale
        if (!$this->langOverride)
            // Negotiate and set locale
            Locale::setLocale(Locale::negotiateLang());

        // Check if view exists
        if (View::exists($page))
            // Load requested page, minified
            return Page::minify($page);

        // Return 404
        abort(404);
    }
}
