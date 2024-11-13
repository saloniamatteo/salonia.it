<?php
	$opts = [
		"title" => lang("Software.title"),
		"desc"	=> lang("Software.desc"),
		"url"	=> base_url("software"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Software -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content">
	<h2 class="headline-4 text-black">
		<?= lang("Software.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("Software.welcome.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3">
		<!-- TP-XFan -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/tp-xfan" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/tp-xfan.png') ?>" alt="TP-XFan logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Software.tp-xfan.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Software.tp-xfan.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('Software.tp-xfan.subd') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Csnake -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/csnake" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1">
				<img src="/pics/csnake.png" alt="Csnake logo" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Software.csnake.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Software.csnake.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('Software.csnake.subd') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Quiz -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/quiz" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1">
				<img src="/pics/quiz.png" alt="Quiz logo" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Software.quiz.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Software.quiz.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('Software.quiz.subd') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Calc -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/calc" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1">
				<img src="/pics/calc.png" alt="Calc logo" loading="lazy">
				</figure>
			</div>
			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Software.calc.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Software.calc.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('Software.calc.subd') ?>
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
