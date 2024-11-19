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
	<link rel="preload" href="/css/fonts/Montserrat.woff2" as="font" type="font/woff2" crossorigin>
	<link rel="preload" href="/css/fonts/NunitoSans.woff2" as="font" type="font/woff2" crossorigin>

	<!-- JS -->
	<script src="/js/hash.js" defer></script>
	<script src="/js/lucide.min.js" defer></script>
	<script src="/js/header.js" defer></script>
	<script src="/js/events.js" defer></script>

	<!-- Overrides -->
	<style>
	.card {
		box-shadow: none;
	}

	.lucide {
		stroke-width: 1.7;
	}
	</style>
</head>

<body>
	<?= view("static/header") ?>

	<div class="content u-text-left mt-12 mb-5 w-90p-md">
	<div class="card u-border-1 border-danger">
	<div class="m-2 u-text-center">
		<h4 class="u-round-xs u-inline-flex bg-red-600 text-white mb-1 py-1 px-2">
			<?= lang('Glob.err.extended') ?>
		</h4>

		<p class="lead u-text-center">
			<?= lang('Glob.err.desc') ?><br>
			<?= lang('Glob.err.contact') ?>
			<a class="font-bold text-blue-700 u u-LR" href="<?= site_url('contact') ?>">
			 <?= lang('Glob.err.admin') ?>.
		</p>

		<a class="tag tag--md bg-blue-700 text-white mt-2" href="<?= site_url() ?>">
			<?= lang('Glob.to-main') ?>
		</a>
	</div>
	</div>
	</div>

	<?= view("static/footer") ?>
</body>
</html>
