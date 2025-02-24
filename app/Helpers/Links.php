<?php

namespace App\Helpers;

use App\Helpers\Url;

class Links
{
	public const maps = [
		'kernel' => 'server-cog',
		'packages' => 'package',
		'software' => 'binary',
		'services' => 'server',
		'cv' => 'file-badge',
		'info' => 'user-round',
		'contact' => 'send',
		'donate' => 'hand-coins',
	];

	public const link_maps = [
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
				: Url::subUrl("{$key}");
	}

	public static function getPagesIcon($key)
	{
		return self::maps["{$key}"];
	}

	public static function getLink($key)
	{
		return self::link_maps["{$key}"]["link"];
	}

	public static function getIcon($key)
	{
		return self::link_maps["{$key}"]["icon"];
	}
}
