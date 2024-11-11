<?php

use CodeIgniter\CodeIgniter;

/**
 * Returns a URI that follows localization.
 * Examples:
 *
 * URI			LANG	| OUTPUT
 * =====================|=======
 * /			it		| it/
 * it/			en		| en/
 * it/			it		| it/
 * packages		it		| it/packages
 * it/packages	en		| en/packages
 *
*/
function replace_lang($uri, $reqlang): string {
	// Get a list of supported locales
	$locales = config("App")->supportedLocales;

	// Check if reqlang is a supported locale
	if (!in_array($reqlang, $locales))
		return $uri;

	// URI may start with a slash ("/").
	// Check if it does, and remove it.
	if (!empty($uri) && $uri[0] == "/")
		$uri = substr($uri, 1);

	// Check if URI starts with a supported locale
	$urilang = substr($uri, 0, 2);
	if (in_array($urilang, $locales))
		return $reqlang . substr($uri, 2);

	// URI does not start with a supported locale,
	// therefore add language
	// Example: /page -> /it/page
	else
		return $reqlang . "/" . $uri;
}

/**
 * Returns a URL based on the current chosen locale
 */
function sub_url($page = ""): string {
	/* Get base URL */
	$base = base_url();

	/* Get the URI */
	$uri = uri_string();

	/* Get current locale
	 * Since we are not a controller, we access the "request" object
	 * thanks to CodeIgniter's services class.
	 * Escape the string just in case. */
	$locale = esc(\Config\Services::request()->getLocale());

	/* If URI starts with requested locale, then
	 * return string prepended with it */
	if (str_starts_with($uri, $locale))
		return prep_url($base . $locale . "/" . esc($page));

	/* No locale was chosen: return URL without it */
	return prep_url($base . $page);
}
