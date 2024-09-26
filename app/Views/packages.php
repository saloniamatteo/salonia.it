<?php
	$opts = [
		"title" => lang("packages.title"),
		"desc"	=> lang("packages.desc"),
		"url"	=> base_url("packages"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Packages -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-gray-900">
		<?= lang("packages.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("packages.welcome.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- librsvg -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/librsvg.png') ?>">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="https://github.com/saloniamatteo/librsvg-overlay" class="font-bold text-blue-700 text-md u u-LR">
					<?= lang('packages.librsvg.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('packages.librsvg.desc') ?>
				</p>
			</div>
		</div>
	</div>
	</div>
	</div>

	<div class="mt-8">
		<a href="<?= site_url($locale) ?>">
			<?= lang('glob.to-main') ?>
		</a>
	</div>
</div>
</div>
</div>

<?= $this->include("static/footer") ?>
</body>
</html>
