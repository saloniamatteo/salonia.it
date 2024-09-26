<?php
	$opts = [
		"title" => lang("designp.title"),
		"desc"	=> lang("designp.desc"),
		"url"	=> base_url("designp"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Design principles -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-gray-900">
		<?= lang("designp.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("designp.welcome.desc") ?>
	</p>

	<p>
	<?= lang('designp.go-to.title') ?><br>

	<a class="tag bg-blue-700 text-white" href="#intro">
		<?= lang('designp.go-to.intro') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#mobile-first">
		<?= lang('designp.go-to.mobile') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#simplicity">
		<?= lang('designp.go-to.simple') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#lightweight">
		<?= lang('designp.go-to.light') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#order">
		<?= lang('designp.go-to.order') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#colors">
		<?= lang('designp.go-to.colors') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#languages">
		<?= lang('designp.go-to.languages') ?>
	</a>
	</p>

	<div class="divider"></div>

	<div class="content u-text-left">
		<!-- Intro -->
		<h3 class="tag tag--xl bg-blue-700 my-0" id="intro">
			<a class="text-white" href="#intro">
				<?= lang('designp.go-to.intro') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.intro.desc') ?>
		</p>

		<!-- Mobile-first -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="mobile-first">
			<a class="text-white" href="#mobile-first">
				<?= lang('designp.go-to.mobile') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.mobile.desc') ?>
		</p>

		<!-- Simplicity -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="simplicity">
			<a class="text-white" href="#simplicity">
				<?= lang('designp.go-to.simple') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.simple.desc') ?>
		</p>

		<!-- Lightweight -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="lightweight">
			<a class="text-white" href="#lightweight">
				<?= lang('designp.go-to.light') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.light.desc') ?>
		</p>

		<!-- Order -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="order">
			<a class="text-white" href="#order">
				<?= lang('designp.go-to.order') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.order.desc') ?>
		</p>

		<!-- Colors -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="colors">
			<a class="text-white" href="#colors">
				<?= lang('designp.go-to.colors') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.colors.desc') ?>
		</p>

		<!-- Languages -->
		<h3 class="tag tag--xl bg-blue-700 mt-3 mb-0" id="languages">
			<a class="text-white" href="#languages">
				<?= lang('designp.go-to.languages') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('designp.languages.desc') ?>
		</p>
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
