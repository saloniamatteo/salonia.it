@use('App\Helpers\Locale')
@use('App\Helpers\Url')
<!DOCTYPE html>
<html lang="{{ $lang ?? Locale::getDefaultLocale() }}">
<head>
	<title>{{ $title ?? 'Hello, world!' }}</title>

	<!-- Optimize page loading -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO (do not include if "noseo" is set) -->
	@if (!isset($noseo))
	<meta name="description"				content="{{ $desc ?? 'Desc' }}">
	<meta property="og:description"			content="{{ $desc ?? 'Desc' }}">
	<meta property="twitter:description"	content="{{ $desc ?? 'Desc' }}">
	<meta property="og:title"				content="{{ $title ?? 'Hello, world!'}}">
	<meta property="twitter:title"			content="{{ $title ?? 'Hello, world' }}">
	<meta property="og:url"					content="{{ $url ?? Url::getURL() }}">
	<meta property="og:image"				content="/favicon.png">
	<meta property="twitter:image"			content="/favicon.png">
	@endif

	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.png">

	<!-- CSS & Fonts -->
	@vite(['resources/css/cirrus.min.css', 'resources/css/fonts/fonts.css'])

	<!-- JS -->
	@vite(['resources/js/main.js'])

	<!-- Overrides -->
	<style>
	.card { box-shadow: none }
	code { padding: .2rem }
	</style>
</head>
