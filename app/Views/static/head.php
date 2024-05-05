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
	<meta property="og:image"				content="<?= base_url('favicon.png') ?>">
	<meta property="twitter:image"			content="<?= base_url('favicon.png') ?>">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('favicon.png') ?>">

	<!-- CSS & Fonts -->
	<link rel="stylesheet" href="<?= base_url('css/cirrus.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/fonts/fonts.css') ?>">
</head>
