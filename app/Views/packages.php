<?php
	$opts = [
		"title" => lang("Packages.title"),
		"desc"	=> lang("Packages.desc"),
		"url"	=> base_url("packages"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Packages -->
<div class="hero u-text-center pt-4">
<div class="hero-body">
<div class="content">
	<h2 class="headline-4 text-black">
		<?= lang("Packages.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("Packages.welcome.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3">
		<!-- librsvg -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6">
				<img src="/pics/librsvg.png" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="https://github.com/saloniamatteo/librsvg-overlay" class="font-bold text-blue-700 text-md u u-LR">
					<?= lang('Packages.librsvg.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Packages.librsvg.desc') ?>
				</p>
			</div>
		</div>
	</div>
	</div>
	</div>

	<div class="mt-8">
		<a href="<?= site_url($locale) ?>">
			<?= lang('Glob.to-main') ?>
		</a>
	</div>
</div>
</div>
</div>

<?= $this->include("static/footer") ?>
</body>
</html>
