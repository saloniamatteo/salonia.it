<!DOCTYPE html>
<html>
<head>
	<title><?= lang('Glob.err.title') ?></title>

	<!-- Do not index page -->
    <meta name="robots" content="noindex">

	<!-- Optimize page loading -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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
</head>

<body>
	<?= view("static/header") ?>

	<div class="card w-90p-md u-center mt-12 bg-red-200">
	<div class="content p-3 u-text-center">
		<h4 class="u-round-xs u-inline-flex bg-red-600 text-white my-0 py-1 px-2">
			<?= lang('Glob.err.extended') ?>
		</h4>

		<div class="divider"></div>

		<p class="lead u-text-center">
			<?= lang('Glob.err.desc') ?><br>
			<?= lang('Glob.err.contact') ?>
			<a class="font-bold text-blue-700 u u-LR" href="<?= site_url('contact') ?>">
			 <?= lang('Glob.err.admin') ?>.
		</p>

		<a class="tag tag--md bg-blue-700 text-white" href="<?= site_url() ?>">
			<?= lang('Glob.to-main') ?>
		</a>
	</div>
	</div>

	<?= view("static/footer") ?>
</body>
</html>
