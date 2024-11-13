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
<div class="content">
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

	<a class="tag bg-blue-700 text-white" href="#webserv">
		<?= lang('Services.go-to.webserv') ?>
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
	</div>

	<div class="content u-text-left">
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<!-- Webdev -->
		<h3 class="tag tag--lg bg-blue-700 my-0" id="webdev">
			<a class="text-white" href="#webdev">
				<?= lang('Services.go-to.webdev') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.webdev.desc') ?>
		</p>

		<!-- Multi-lang -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="lang">
			<a class="text-white" href="#lang">
				<?= lang('Services.webdev.lang.title') ?>
			</a>
		</h3>

		<p class="mt-0">
			<?= lang('Services.webdev.lang.desc') ?>
		</p>

		<!-- Mobile device support -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="mobile">
			<a class="text-white" href="#mobile">
				<?= lang('Services.webdev.mobile.title') ?>
			</a>
		</h3>

		<p class="mt-0">
			<?= lang('Services.webdev.mobile.desc') ?>
		</p>

		<!-- Speed -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="speed">
			<a class="text-white" href="#speed">
				<?= lang('Services.webdev.speed.title') ?>
			</a>
		</h3>

		<p class="mt-0">
			<?= lang('Services.webdev.speed.desc') ?>
		</p>

		<!-- Design -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="design">
			<a class="text-white" href="#design">
				<?= lang('Services.webdev.design.title') ?>
			</a>
		</h3>

		<p class="mt-0 mb-0">
			<?= lang('Services.webdev.design.desc') ?>
		</p>

		<!-- SEO -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="seo">
			<a class="text-white" href="#seo">
				<?= lang('Services.webdev.seo.title') ?>
			</a>
		</h3>

		<p class="mt-0 mb-0">
			<?= lang('Services.webdev.seo.desc') ?>
		</p>
	</div>
	</div>
	</div>

	<div class="content u-text-left">
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<!-- Web services -->
		<h3 class="tag tag--lg bg-blue-700 my-0" id="webserv">
			<a class="text-white" href="#webserv">
				<?= lang('Services.go-to.webserv') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('Services.webserv.desc') ?>
		</p>

		<!-- DNS -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="dns">
			<a class="text-white" href="#dns">
				<?= lang('Services.webserv.dns.title') ?>
			</a>
		</h3>

		<p class="mt-0">
			<?= lang('Services.webserv.dns.desc') ?>
		</p>

		<!-- Server -->
		<h3 class="tag tag--md bg-blue-700 my-1" id="server">
			<a class="text-white" href="#server">
				<?= lang('Services.webserv.server.title') ?>
			</a>
		</h3>

		<p class="mt-0 mb-0">
			<?= lang('Services.webserv.server.desc') ?>
		</p>
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
