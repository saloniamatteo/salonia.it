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
	<meta name="description" content="{{ $desc ?? 'Desc' }}">

	<!-- OpenGraph (Facebook) tags -->
	<meta property="og:title"        content="{{ $title ?? 'Hello, world!'}}">
	<meta property="og:description"  content="{{ $desc ?? 'Desc' }}">
	<meta property="og:site_name"    content="{{ Config::get('app.sitename') }}">
	<meta property="og:image"        content="/banner.png">
	<meta property="og:image:alt"    content="{{ Config::get('app.name') }}">
	<meta property="og:image:height" content="600">
	<meta property="og:image:width"  content="1200">
	<meta property="og:type"         content="website">
	<meta property="og:url"          content="{{ $url ?? Url::getURL() }}">

	<!-- Twitter/X tags -->
	<meta name="twitter:card"            content="summary_large_image">
	<meta property="twitter:title"       content="{{ $title ?? 'Hello, world' }}">
	<meta property="twitter:description" content="{{ $desc ?? 'Desc' }}">
	<meta property="twitter:image"       content="/banner.png">
	<meta property="twitter:url"         content="{{ $url ?? Url::getURL() }}">
	@endif

	<!-- Favicon -->
	<link rel="apple-touch-icon" href="/favicon.png">
	<link rel="icon"             href="/favicon.png">

	<!-- CSS & Fonts -->
	@vite([
		'resources/css/cirrus.css',
		'resources/css/fonts/fonts.css',
		'resources/css/overrides.css',
	])

	<!-- JS -->
	@vite(['resources/js/main.js'])

	<!-- Check if head.after.blade.php exists, and include it -->
	@if (file_exists(resource_path("views/static/head-after.blade.php")))
		@include('static/head-after')
	@endif
</head>
