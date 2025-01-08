@use('App\Helpers\Locale')
@use('App\Helpers\Url')
@use('Illuminate\Support\Facades\Config')
<!DOCTYPE html>
<html lang="{{ $lang ?? Locale::getDefaultLocale() }}">
<head>
	<title>{{ $title ?? 'Hello, world!' }}</title>

	<!-- Optimize page loading -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO (do not include if "noseo" is set) -->
	@if (!isset($noseo))
	<!-- Description -->
	<meta name="description"                content="{{ $desc ?? 'Desc' }}">
	<meta property="og:description"         content="{{ $desc ?? 'Desc' }}">
	<meta property="twitter:description"    content="{{ $desc ?? 'Desc' }}">

	<!-- Title -->
	<meta property="og:title"               content="{{ $title ?? 'Hello, world!'}}">
	<meta property="twitter:title"          content="{{ $title ?? 'Hello, world' }}">
	<meta property="og:url"                 content="{{ $url ?? Url::getURL() }}">

	<!-- Banner image -->
	<meta property="og:image:alt"           content="{{ Config::get('app.name') }}">
	<meta property="og:image"               content="/banner.png">
	<meta property="twitter:image"          content="/banner.png">
	<meta property="og:image:width"         content="1200">
	<meta property="og:image:height"        content="600">

	<!-- Misc -->
	<meta property="og:site_name"           content="{{ Config::get('app.sitename') }}">
	<meta property="og:type"                content="website">
	@endif

	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.png">

	<!-- CSS & Fonts -->
	@vite([
		'resources/css/cirrus.min.css',
		'resources/css/fonts/fonts.css',
		'resources/css/overrides.css',
	])

	<!-- JS -->
	@vite(['resources/js/main.js'])
</head>
