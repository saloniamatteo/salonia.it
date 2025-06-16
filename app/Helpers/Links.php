<?php

namespace App\Helpers;

use App\Helpers\Url;

class Links
{
    public const MAPS = [
        'arch' => [
            'link' => 'https://arch.salonia.it',
            'icon' => 'book-open-text'
        ],

        'dotfiles' => [
            'link' => 'https://dotfiles.salonia.it',
            'icon' => 'folder-cog'
        ],

        'writeups' => 'notebook-pen',
        'kernel' => 'server-cog',
        'packages' => 'package',
        'software' => 'binary',
        'cv' => 'file-badge',
        'info' => 'user-round',
        'contact' => 'send',
        'donate' => 'hand-coins',
    ];

    public const LINK_MAPS = [
        'portfolio' => [
            'link' => 'https://portfolio.salonia.it',
            'icon' => 'globe',
        ],

        'searxng' => [
            'link' => 'https://s.salonia.it',
            'icon' => 'search',
        ],

        'oa' => [
            'link' => 'https://oa.salonia.it',
            'icon' => 'scroll-text',
        ],

        'github' => [
            'link' => 'https://github.com/saloniamatteo',
            'icon' => 'github',
        ],

        'source' => [
            'link' => 'https://github.com/saloniamatteo/salonia.it',
            'icon' => 'github',
        ],
    ];

    public static function getPagesLink($key)
    {
        return $key === 'cv'
                ? Url::getCVLink()
                : (
                    isset(self::MAPS["{$key}"]["link"])
                    ? self::MAPS["{$key}"]["link"]
                    : Url::subUrl("{$key}")
                );
    }

    public static function getPagesIcon($key)
    {
        return isset(self::MAPS["{$key}"]["icon"])
               ? self::MAPS["{$key}"]["icon"]
               : self::MAPS["{$key}"];
    }

    public static function getLink($key)
    {
        return self::LINK_MAPS["{$key}"]["link"];
    }

    public static function getIcon($key)
    {
        return self::LINK_MAPS["{$key}"]["icon"];
    }
}
