<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Request;

class Url
{
    /**
     * Returns a path that follows localization.
     * Examples:
     *
     * Path			LANG	| OUTPUT
     * =====================|=======
     * /			it		| it/
     * it/			en		| en/
     * it/			it		| it/
     * packages		it		| it/packages
     * it/packages	en		| en/packages
     */
    public static function replaceLang($path, $reqlang)
    {
        // Get a list of supported locales
        $locales = Locale::getLocales();

        // If not empty, check if reqlang is a supported locale
        if (! empty($reqlang) && ! in_array($reqlang, $locales)) {
            return $path;
        }

        // path may start with a slash ("/").
        // Check if it does, and remove it.
        if (! empty($path) && $path[0] === '/') {
            $path = substr($path, 1);
        }

        // Check if path starts with a supported locale
        $pathlang = substr($path, 0, 2);
        if (in_array($pathlang, $locales)) {
            // If reqlang is empty, return the path without lang
            if (empty($reqlang)) {
                return substr($path, 3);
            }

            return $reqlang.substr($path, 2);
        }

        // path does not start with a supported locale
        // If reqlang is empty, return the path without /,
        // otherwhise add the language
        // Example: /page -> /it/page
        if (empty($reqlang)) {
            return $path;
        }

        return "{$reqlang}/{$path}";
    }

    /**
     * Get base URL (scheme + host)
     * <scheme>://<host>
     */
    public static function getBaseURL()
    {
        return Request::schemeAndHttpHost();
    }

    /* Get localized path (aka do not strip localization from path) */
    public static function getPathLocal()
    {
        return Request::path();
    }

    /**
     * Get current path WITHOUT localization
     * Examples:
     *
     * Path      | OUTPUT
     * ==========|=======
     * it/page   | page
     * en/page   | page
     * page      | page
     *
     * We take advantage of the function replaceLang(), by passing
     * an empty reqlang, thus stripping it from the final path.
     */
    public static function getPath()
    {
        // Strip lang from path
        return Url::replaceLang(Request::path(), '');
    }

    /* Get URL without localization */
    public static function getURL()
    {
        return URL::getBaseURL().'/'.URL::getPath();
    }

    /* Returns a URL based on the current chosen locale */
    public static function subUrl($page = '')
    {
        /* Get base URL */
        $base = Url::getBaseURL();

        /* Get the path with localization */
        $path = Url::getPathLocal();

        /* Get current locale */
        $locale = Locale::getLocale();

        /* If URL starts with requested locale, then
         * return string prepended with it */
        if (str_starts_with($path, $locale)) {
            return "{$base}/{$locale}/{$page}";
        }

        /* No locale was chosen: return URL without it */
        return "{$base}/{$page}";
    }

    // Get CV link based on lang
    public static function getCVLink()
    {
        // Get the current lang
        $lang = Locale::getLocale();

        // Check it
        if ($lang === 'it') {
            return 'cv.pdf';
        }

        return 'cv_en.pdf';
    }

    // Return a bold string
    public static function makeBold($text)
    {
        return "<strong>{$text}</strong>";
    }

    // Return a valid link item
    public static function makeLink($link, $text, $color = '700')
    {
        return "<a class='text-blue-{$color} u u-LR' href='{$link}'><strong>{$text}</strong></a>";
    }
}
