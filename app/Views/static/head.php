<!DOCTYPE html>
<html lang="<?= esc($locale) ?>">
<head>
	<title><?= esc($title) ?></title>

	<!-- Optimize page loading -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- SEO -->
	<meta name="description"				content="<?= esc($desc) ?>">
	<meta property="og:description"			content="<?= esc($desc) ?>">
	<meta property="twitter:description"	content="<?= esc($desc) ?>">
	<meta property="og:title"				content="<?= esc($title) ?>">
	<meta property="twitter:title"			content="<?= esc($title) ?>">
	<meta property="og:url"					content="<?= esc($url) ?>">
	<meta property="og:image"				content="/favicon.png">
	<meta property="twitter:image"			content="/favicon.png">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.png">

	<!-- CSS & Fonts -->
	<link rel="stylesheet" href="/css/cirrus.min.css">
	<link rel="stylesheet" href="/css/fonts/fonts.css">

	<!-- Preload fonts to reduce CLS -->
	<link rel="preload" href="/css/fonts/Montserrat.woff2" as="font" type="font/woff2">
	<link rel="preload" href="/css/fonts/NunitoSans.woff2" as="font" type="font/woff2">

	<!-- JS for header -->
	<script src="/js/header.js" defer></script>

	<!-- Lucide Icons styles -->
	<style>
	.lucide {
		stroke-width: 1.7;
	}
	</style>
</head>
