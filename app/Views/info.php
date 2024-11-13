<?php
	$opts = [
		"title" => lang("Info.title"),
		"desc"	=> lang("Info.desc"),
		"url"	=> base_url("info"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Info -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content">
	<h2 class="headline-4">
		<a class="text-black">
			<?= lang('Info.welcome.title') ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang('Info.welcome.desc') ?>
	</p>
</div>
</div>
</div>

<!-- About me -->
<div class="hero u-text-center bg-blue-200 u-shadow-inset">
<div class="hero-body m-2-sm">
<div class="content">
	<div class="grid-sm u-gap-2 u-text-left">
		<div class="grid-c-4 grid-r-3">
			<img class="img-stretch mb-2 u-round-lg" src="/pics/me.jpeg" loading="lazy" alt="Matteo Salonia">
		</div>

		<div class="grid-c-8-md ml-1-md">
			<h1 class="my-0 text-black">Matteo Salonia</h1>
		</div>

		<div class="grid-c-8 ml-1-md mr-4-lg">
			<p>
				<?= lang('Info.hero.desc') ?>
			</p>

			<ul>
				<li>
				<strong><u><?= lang('Info.hero.it.title') ?></u></strong>:
				<?= lang('Info.hero.it.desc') ?>
				</li>

				<li>
				<strong><u><?= lang('Info.hero.english.title') ?></u></strong>:
				<?= lang('Info.hero.english.desc') ?>
				</li>

				<li>
				<strong><u><?= lang('Info.hero.business.title') ?></u></strong>:
				<?= lang('Info.hero.business.desc') ?>
				</li>

				<li>
				<strong><u><?= lang('Info.hero.maths.title') ?></u></strong>:
				<?= lang('Info.hero.maths.desc') ?>
				</li>
			</ul>
		</div>
	</div>

	<!-- Percorso formativo -->
	<div class="grid-c-12 mr-4-lg u-text-left" id="timeline">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3 tile level">
		<div class="tile__container">
			<p class="tile__title text-lg">
				<?= lang('Info.timeline.title') ?>
			</p>

			<ul class="menu">
				<li class="menu-item">
					<strong><?= lang('Info.timeline.2018.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2018.B2') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2018.linux') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2018.py') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2018.vbnet') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2019.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2019.ubnt') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2019.webs') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2019.prog') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2020.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2020.arch') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2020.appr') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2020.guide') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2020.artix') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2021.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2021.gento') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2021.knowl') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2021.C') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2021.andr') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2021.kconf') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2022.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2022.prog') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2022.desig') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2022.elec') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2022.works') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2022.lan') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2023.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2023.perf') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2023.pwork') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2023.lan') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2023.db') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2023.webs') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2023.dipl') ?>
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong><?= lang('Info.timeline.2024.title') ?></strong>

					<ul class="menu">
						<li class="menu-item">
							<?= lang('Info.timeline.2024.elec') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2024.eleng') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2024.pract') ?>
						</li>

						<li class="menu-item">
							<?= lang('Info.timeline.2024.ci') ?>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
</div>

<div class="u-center my-8">
	<a href="<?= site_url($locale) ?>">
		<?= lang('Glob.to-main') ?>
	</a>
</div>

<?= $this->include("static/footer") ?>
</body>
</html>
