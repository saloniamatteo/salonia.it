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
<div class="hero u-text-center pt-4">
<div class="hero-body">
<div class="content">
	<h2 class="headline-4 text-black">
		<?= lang('Contact.welcome.title') ?>
	</h2>

	<p class="lead">
		<?= lang('Contact.welcome.desc') ?>
	</p>

	<!-- Salonia Infrastrutture Digitali -->
	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<h5 class="bg-blue-700 mb-3 mt-0 p-1 u-inline-flex u-round-xs" id="sid">
			<a class="text-white" href="#sid"><?= lang("Contact.sid.desc") ?></a>
		</h5>

		<!-- IG -->
		<div class="tile level">
			<a href="https://instagram.com/saloniainfrastrutture" class="u-flex">
			<div class="tile__icon">
				<i data-lucide="instagram" class="text-gray-900 mt-1 w-5"></i>
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
				<i data-lucide="at-sign" class="text-gray-900 mt-1 w-5"></i>
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
				<i data-lucide="facebook" class="text-gray-900 mt-1 w-5"></i>
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

		<!-- Google Maps -->
		<div class="tile level mt-1">
			<a href="https://g.page/r/CWbzRIvNa8T_EBM" class="u-flex">
			<div class="tile__icon">
				<i data-lucide="map-pin" class="text-gray-900 mt-1 w-5"></i>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					Salonia Infrastrutture Digitali
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Contact.sid.maps") ?>
				</p>
			</div>
			</a>
		</div>

		<!-- Email -->
		<div class="tile level mt-1">
			<a href="mailto:assistenza@salonia.it" class="u-flex">
			<div class="tile__icon">
				<i data-lucide="mail" class="text-gray-900 mt-1 w-5"></i>
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
	</div>
	</div>
	</div>

	<!-- Personal -->
	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<h5 class="bg-blue-700 mb-3 mt-0 p-1 u-inline-flex u-round-xs" id="personal">
			<a class="text-white" href="#personal"><?= lang("Contact.personal.desc") ?></a>
		</h5>

		<!-- Protonmail -->
		<div class="tile level">
			<div class="tile__icon">
			<a href="mailto:saloniamatteo@pm.me">
				<i data-lucide="mail" class="text-gray-900 mt-1 w-5"></i>
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
					<a href="/matteo-pm.asc" class="font-bold text-blue-700 text-md u u-LR">
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
				<i data-lucide="mail" class="text-gray-900 mt-1 w-5"></i>
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
					<a href="/matteo-pm.asc" class="font-bold text-blue-700 text-md u u-LR">
						 <?= lang('Contact.personal.gpg') ?>
					</a>
				</p>
			</div>
			</a>
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
