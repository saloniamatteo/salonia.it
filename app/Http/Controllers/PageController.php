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

    private function loadLang($lang, $callback)
    {
        // Make sure page is loaded with lang
        $this->langOverride = true;
        Locale::setLocale($lang);

        return $callback();
    }

    private function checkLocale()
    {
        // Check if we need to negotiate locale
        if (! $this->langOverride) {
            // Negotiate and set locale
            Locale::setLocale(Locale::negotiateLang());
        }
    }

    public function viewWriteupsLang($lang, $page)
    {
        return $this->loadLang(
            $lang, function () use ($page) {
                return $this->viewWriteups($page);
            }
        );
    }

    public function viewLang($lang, $page = 'index')
    {
        return $this->loadLang(
            $lang, function () use ($page) {
                return $this->view($page);
            }
        );
    }

    public function viewWriteups($page)
    {
        // Check if we need to negotiate locale
        $this->checkLocale();

        // Check if view exists
        if (View::exists("writeups/$page")) {
            // Load requested page, minified
            return Page::minify("writeups/$page");
        }

        // Return 404
        //abort(404);
    }

    public function view($page = 'index')
    {
        // Check if we need to negotiate locale
        $this->checkLocale();

        // Check if view exists
        if (View::exists($page)) {
            // Load requested page, minified
            return Page::minify($page);
        }

        // Return 404
        //abort(404);
    }
}
