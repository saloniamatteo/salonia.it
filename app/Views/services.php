<?php
	$opts = [
		"title" => lang("Services.title"),
		"desc"	=> lang("Services.desc"),
		"url"	=> base_url("services"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Services -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-black">
		<?= lang("Services.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("Services.welcome.desc") ?>
	</p>

	<p>
	<?= lang('Services.go-to.title') ?>:<br>

	<a class="tag bg-blue-700 text-white" href="#webdev">
		<?= lang('Services.go-to.webdev') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#uiux">
		<?= lang('Services.go-to.uiux') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#backend">
		<?= lang('Services.go-to.backend') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#fullstack">
		<?= lang('Services.go-to.fullstack') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#dns">
		<?= lang('Services.go-to.dns') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#server">
		<?= lang('Services.go-to.server') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#db">
		<?= lang('Services.go-to.db') ?>
	</a>
	</p>

	<div class="divider"></div>

	<div class="content u-text-left">
		<!-- Promo -->
		<div class="card p-1" style="background: linear-gradient(to top, #141e30, #243b55)" id="promo">
			<p class="font-bold text-white text-lg ml-2 mt-2 mb-0">
				<?= lang('Services.promo.title') ?>
			</p>

			<p class="font-bold text-gray-100 mt-0 ml-2">
				<?= lang('Services.promo.desc') ?>&nbsp;
				<a class="text-blue-500 u u-LR" href="https://salonia.it/contact#sid">
				<?= lang('Contact.sid.desc') ?>
				</a>.
			</p>
		</div>

		<!-- Webdev -->
		<h3 class="tag tag--xl bg-blue-700 my-0" id="webdev">
			<a class="text-white" href="#webdev">
				<?= lang('Services.go-to.webdev') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.webdev.desc') ?>
		</p>

		<!-- UI/UX -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="uiux">
			<a class="text-white" href="#uiux">
				<?= lang('Services.go-to.uiux') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.uiux.desc') ?>
		</p>

		<!-- Backend -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="backend">
			<a class="text-white" href="#backend">
				<?= lang('Services.go-to.backend') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.backend.desc') ?>
		</p>

		<!-- Full-stack -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="fullstack">
			<a class="text-white" href="#fullstack">
				<?= lang('Services.go-to.fullstack') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.fullstack.desc') ?>
		</p>

		<!-- Domains + DNS -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="dns">
			<a class="text-white" href="#dns">
				<?= lang('Services.go-to.dns') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.dns.desc') ?>
		</p>

		<!-- GNU/Linux servers -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="server">
			<a class="text-white" href="#server">
				<?= lang('Services.go-to.server') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.server.desc') ?>
		</p>

		<!-- DB -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 my-0" id="db">
			<a class="text-white" href="#db">
				<?= lang('Services.go-to.db') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.db.desc') ?>
		</p>
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
