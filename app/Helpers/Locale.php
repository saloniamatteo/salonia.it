<?php

namespace App\Helpers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Request;

class Locale
{
    /* Return all the accepted languages from the browser. */
    private static function getAcceptLanguage()
    {
        $matches = [];

        if ($acceptLangs = Request::header('Accept-Language')) {
            $acceptLangs = explode(',', $acceptLangs);

            $generic_matches = [];
            foreach ($acceptLangs as $lang) {
                // Split lang from preference (q)
                // We also remove the country, because we do not need it.
                $lang = explode(';', $lang) + [0 => explode('-', $lang)[0]];
                $l = $lang[0];

                // Check if we have lang preference (q)
                if (isset($lang[1])) {
                    $q = (float) str_replace('q=', '', $lang[1]);
                } else {
                    $q = null;

                    // Assign default low weight for generic values
                    if ($l == '*/*') {
                        $q = 0.01;
                    } elseif (substr($l, -1) == '*') {
                        $q = 0.02;
                    }
                }

                // Unweighted values, get high weight by their position in the list
                $q = $q ?? 1000 - \count($matches);
                $matches[$l] = $q;

                $l = explode('-', $l);
                array_pop($l);

                while (! empty($l)) {
                    // The new generic option needs to be slightly less important than it's base
                    $q -= 0.001;
                    $op = implode('-', $l);

                    if (empty($generic_matches[$op]) || $generic_matches[$op] > $q) {
                        $generic_matches[$op] = $q;
                    }

                    array_pop($l);
                }
            }

            $matches = array_merge($generic_matches, $matches);
            arsort($matches, SORT_NUMERIC);
        }

        return $matches;
    }

    // Get default locale
    public static function getDefaultLocale()
    {
        return Config::get('locale.languages')[0];
    }

    // Get current locale
    public static function getLocale()
    {
        return App::getLocale();
    }

    // Get a list of supported locales
    public static function getLocales()
    {
        return Config::get('locale.languages');
    }

    // Set locale
    public static function setLocale($locale)
    {
        return App::setLocale($locale);
    }

    /**
     * Negotiates language with the user's browser through the Accept-Language
     * HTTP header. Quality factors in the Accept-Language header are supported,
     * e.g.:
     *      Accept-Language: en-UK;q=0.7, en-US;q=0.6, no, dk;q=0.8
     */
    public static function negotiateLang()
    {
        // Check if browser has matching request lang
        $matches = Locale::getAcceptLanguage();
        $langs = Locale::getLocales();

        // Loop over user locales
        foreach ($matches as $key => $q) {
            // If key was found, set locale to that
            if (in_array($key, $langs)) {
                return $key;
            }
        }

        // Return default locale if not matching
        return Locale::getLocales()[0];
    }

    // Convert text to flag emoji
    public static function textToFlag($text)
    {
        $emojis = Config::get('locale.emojis');

        // Check if the input text exists in the mapping array
        if (array_key_exists($text, $emojis)) {
            return $emojis[$text];
        }

        return $text; // Return original if not matching
    }

    // Get language string
    public static function langStr($lang)
    {
        $strings = Config::get('locale.strings');

        // Check if lang is in array
        if (array_key_exists($lang, $strings)) {
            return $strings[$lang];
        }

        return $lang; // Return original if not matching
    }

    // Make header lang links
    public static function makeLangLinks()
    {
        // Get path
        $path = Url::getPath();

        // Get languages
        $langs = Locale::getLocales();

        // Iterate over each lang
        for ($i = 0; $i < count($langs); $i++) {
            $lang = $langs[$i];
            $href = URL::replaceLang($path, $lang);

            // Create link
            echo "<a class='u u-LR font-bold text-gray-900' href='/$href'>"
                .Locale::textToFlag($lang).'&nbsp;&nbsp;'
                .Locale::langStr($langs[$i])
                .'</a>';
        }
    }
}
