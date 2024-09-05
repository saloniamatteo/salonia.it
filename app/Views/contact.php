<?php
	$opts = [
		"title" => lang("contact.title"),
		"desc"	=> lang("contact.desc"),
		"url"	=> base_url("contact"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Contact -->
<div class="hero u-text-center u-shadow-inset pt-6">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-gray-900">
		<?= lang('contact.welcome.title') ?>
	</h2>

	<p class="lead">
		<?= lang('contact.welcome.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
		<!-- Disclaimer -->
		<div class="card bg-info text-white">
			<p class="m-3">
				<?= lang('contact.disclaimer') ?>
			</p>
		</div>

	<div class="card">
	<div class="m-3">

		<!-- Protonmail -->
		<div class="tile level">
			<div class="tile__icon">
				<p class="u-text-center w-6" style="font-size: 2rem!important">📧</p>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="mailto:saloniamatteo@pm.me" class="font-bold text-link-dark text-md u u-LR">
					Protonmail: saloniamatteo@pm.me
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('contact.protonmail') ?>
					&mdash;
					<a href="<?= base_url('matteo-pm.asc') ?>"
					class="font-bold text-link-dark text-md u u-LR">
						 <?= lang('contact.gpg') ?>
					</a>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Personal server -->
		<div class="tile level">
			<div class="tile__icon">
				<p class="u-text-center w-6" style="font-size: 2rem!important">📧</p>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="mailto:matteo@salonia.it" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('contact.pserv.title') ?>: matteo@salonia.it
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('contact.pserv.desc') ?>
					&mdash;
					<a href="<?= base_url('matteo.asc') ?>"
					class="font-bold text-link-dark text-md u u-LR">
						 <?= lang('contact.gpg') ?>
					</a>
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
