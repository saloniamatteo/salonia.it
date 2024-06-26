<!DOCTYPE html>
<html>
<head>
	<title><?= lang('glob.err.title') ?></title>

	<!-- Do not index page -->
    <meta name="robots" content="noindex">

	<!-- Optimize page loading -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?= base_url('favicon.png') ?>">

	<!-- CSS & Fonts -->
	<link rel="stylesheet" href="<?= base_url('css/cirrus.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/fonts/fonts.css') ?>">
</head>

<body>
	<?= view("static/header") ?>

	<div class="card w-90p-md u-center mt-12 bg-red-200">
	<div class="content p-3 u-text-center">
		<h4 class="u-round-xs u-inline-flex bg-red-600 text-white my-0 py-1 px-2">
			<?= lang('glob.err.extended') ?>
		</h4>

		<div class="divider"></div>

		<p class="lead u-text-center">
			<?= lang('glob.err.desc') ?><br>
			<?= lang('glob.err.contact') ?>
			<a class="font-bold text-link-dark u u-LR" href="<?= site_url('contact') ?>">
			 <?= lang('glob.err.admin') ?>.
		</p>

		<a class="tag tag--md bg-blue-700 text-white" href="<?= site_url() ?>">
			<?= lang('glob.to-main') ?>
		</a>
	</div>
	</div>

	<?= view("static/footer") ?>
</body>
</html>
