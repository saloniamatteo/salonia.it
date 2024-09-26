<?php
	$opts = [
		"title" => lang("donate.title"),
		"desc"	=> lang("donate.desc"),
		"url"	=> base_url("donate"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Donate -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-black">
		<?= lang('donate.welcome.title') ?>
	</h2>

	<p class="lead">
		<?= lang('donate.welcome.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- Monero -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-5" style="background: white">
				<img src="<?= base_url('pics/xmr.png') ?>">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title font-bold text-md">
					Monero
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('donate.oa.title') ?>
				</p>

				<p class="tile__subtitle">
					<span class="font-bold text-black">salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo.salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo@salonia.it</span>
				</p>

				<div class="divider"
				data-content="<?= lang('donate.or') ?>"></div>

				<p class="tile__subtitle text-black">
					<?= lang('donate.oa.addr') ?>
				</p>

				<p class="tile__subtitle text-black font-bold" style="word-break: break-all">
					43cgqumPkUAXhL4cx5bn24aZQkg7dUGQtaugoCxNEg1c2kbUY14y5jJMBwju2vqqZDeCJvSsn3SC7cDLuv5ZSeth4CV71cz
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- PayPal -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-5" style="background: white">
				<img src="<?= base_url('pics/paypal.png') ?>">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title font-bold text-md">
					PayPal
				</p>

				<p class="tile__subtitle text-black">Username:</p>

				<p class="tile__subtitle">
					<span class="font-bold text-black">saloniamatteo</span>
				</p>

				<div class="divider"
				data-content="<?= lang('donate.or') ?>"></div>

				<p class="tile__subtitle text-black">Link:</p>

				<p class="tile__subtitle text-black font-bold">
					<a href="https://paypal.me/saloniamatteo" class="font-bold text-blue-700 u u-LR">paypal.me/saloniamatteo</a>
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
