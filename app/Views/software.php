<?php
	$opts = [
		"title" => lang("software.title"),
		"desc"	=> lang("software.desc"),
		"url"	=> base_url("software"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Software -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-black">
		<?= lang("software.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("software.welcome.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
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
					<?= lang('software.tp-xfan.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('software.tp-xfan.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('software.tp-xfan.subd') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="space space--lg"></div>

		<!-- Csnake -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/csnake" class="u-flex">
			<div class="tile__icon">
				<figure class="avatar w-6 mt-1" style="background: black">
				<img src="<?= base_url('pics/csnake.png') ?>" alt="Csnake logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('software.csnake.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('software.csnake.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('software.csnake.subd') ?>
				</p>
			</div>
		</div>

		<div class="space space--lg"></div>

		<!-- Quiz -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/quiz" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/quiz.png') ?>" alt="Quiz logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('software.quiz.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('software.quiz.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('software.quiz.subd') ?>
				</p>
			</div>
		</div>

		<div class="space space--lg"></div>

		<!-- Calc -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/calc" class="u-flex">
			<div class="tile__icon">
				<figure class="avatar w-6 mt-1" style="background: #607d8b">
				<img src="<?= base_url('pics/calc.png') ?>" alt="Calc logo">
				</figure>
			</div>
			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('software.calc.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('software.calc.desc') ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang('software.calc.subd') ?>
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
