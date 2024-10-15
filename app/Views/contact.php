<?php
	$opts = [
		"title" => lang("Contact.title"),
		"desc"	=> lang("Contact.desc"),
		"url"	=> base_url("contact"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Contact -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-black">
		<?= lang('Contact.welcome.title') ?>
	</h2>

	<p class="lead">
		<?= lang('Contact.welcome.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
		<!-- Salonia Infrastrutture Digitali -->
		<h5 class="bg-blue-700 mb-3 mt-0 p-1 u-inline-flex u-round-xs" id="sid">
			<a class="text-white" href="#sid"><?= lang("Contact.sid.desc") ?></a>
		</h5>

		<!-- IG -->
		<div class="tile level">
			<a href="https://instagram.com/saloniainfrastrutture" class="u-flex">
			<div class="tile__icon">
				<figure class="w-5 mt-1" style="margin-left: 0.25rem !important">
				<img src="<?= base_url('pics/instagram.png') ?>" alt="Instagram logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					@saloniainfrastrutture
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.sid.ig") ?>
				</p>
			</div>
			</a>
		</div>

		<!-- Threads -->
		<div class="tile level mt-1">
			<a href="https://threads.net/@saloniainfrastrutture" class="u-flex">
			<div class="tile__icon">
				<figure class="w-5 mt-1" style="margin-left: 0.25rem !important">
				<img src="<?= base_url('pics/threads.png') ?>" alt="Threads logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					@saloniainfrastrutture
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.sid.threads") ?>
				</p>
			</div>
			</a>
		</div>

		<!-- Facebook -->
		<div class="tile level mt-1">
			<a href="https://www.facebook.com/profile.php?id=61566822561811" class="u-flex">
			<div class="tile__icon">
				<figure class="w-5 mt-1" style="margin-left: 0.25rem !important">
				<img src="<?= base_url('pics/facebook.png') ?>" alt="Facebook logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					Salonia Infrastrutture Digitali
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.sid.fb") ?>
				</p>
			</div>
			</a>
		</div>

		<!-- Email -->
		<div class="tile level mt-1">
			<a href="mailto:assistenza@salonia.it" class="u-flex">
			<div class="tile__icon">
				<p class="u-text-center w-6 my-0" style="font-size: 2rem!important">📧</p>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					assistenza@salonia.it
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.sid.email") ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Personal -->
		<h5 class="bg-blue-700 mb-3 mt-0 p-1 u-inline-flex u-round-xs" id="personal">
			<a class="text-white" href="#personal"><?= lang("Contact.personal.desc") ?></a>
		</h5>

		<!-- Protonmail -->
		<div class="tile level">
			<div class="tile__icon">
			<a href="mailto:saloniamatteo@pm.me">
				<p class="u-text-center w-6 my-0" style="font-size: 2rem!important">📧</p>
			</a>
			</div>

			<div class="tile__container">
				<a href="mailto:saloniamatteo@pm.me">
				<p class="tile__title text-blue-700 u u-LR">
					Protonmail: saloniamatteo@pm.me
				</p>
				</a>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.personal.protonmail") ?>
					&mdash;
					<a href="<?= base_url('matteo-pm.asc') ?>" class="font-bold text-blue-700 text-md u u-LR">
						 <?= lang('Contact.personal.gpg') ?>
					</a>
				</p>
			</div>
			</a>
		</div>

		<!-- Personal server -->
		<div class="tile level">
			<div class="tile__icon">
			<a href="mailto:matteo@salonia.it">
				<p class="u-text-center w-6 my-0" style="font-size: 2rem!important">📧</p>
			</a>
			</div>

			<div class="tile__container">
				<a href="mailto:matteo@salonia.it">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Contact.personal.pserv.title') ?>: matteo@salonia.it
				</p>
				</a>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.personal.pserv.desc") ?>
					&mdash;
					<a href="<?= base_url('matteo-pm.asc') ?>" class="font-bold text-blue-700 text-md u u-LR">
						 <?= lang('Contact.personal.gpg') ?>
					</a>
				</p>
			</div>
			</a>
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
