<?php
	$opts = [
		"title" => lang("Donate.title"),
		"desc"	=> lang("Donate.desc"),
		"url"	=> base_url("donate"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Donate -->
<div class="hero u-text-center pt-4">
<div class="hero-body">
<div class="content">
	<h2 class="headline-4 text-black">
		<?= lang('Donate.welcome.title') ?>
	</h2>

	<p class="lead">
		<?= lang('Donate.welcome.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3">
		<!-- Monero -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-5">
				<img src="/pics/xmr.png" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					Monero
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Donate.xmr.title') ?>
				</p>

				<p class="tile__subtitle">
					<span class="font-bold text-black">salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo.salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo@salonia.it</span>
				</p>

				<div class="my-2"></div>

				<p class="tile__subtitle text-black">
					<?= lang('Donate.xmr.addr') ?>
				</p>

				<p class="tile__subtitle text-black font-bold" style="word-break: break-all">
					43cgqumPkUAXhL4cx5bn24aZQkg7dUGQtaugoCxNEg1c2kbUY14y5jJMBwju2vqqZDeCJvSsn3SC7cDLuv5ZSeth4CV71cz
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Bitcoin -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-5">
				<img src="/pics/btc.png" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					Bitcoin
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Donate.btc.title') ?>
				</p>

				<p class="tile__subtitle">
					<span class="font-bold text-black">salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo.salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo@salonia.it</span>
				</p>

				<div class="my-2"></div>

				<p class="tile__subtitle text-black">
					<?= lang('Donate.btc.addr') ?>
				</p>

				<p class="tile__subtitle text-black font-bold" style="word-break: break-all">
					sp1qq2wuevaqz4e0s9z3sy0lr5vqfr34e4rauf8k6kywmuhaa99xp2y6gq7fpv592ltlr59y9au4yd60qr2vt6yjjxsxvqvsjdgy3vavsum3jv5euk75
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- PayPal -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-5">
				<img src="/pics/paypal.png" loading="lazy">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					PayPal
				</p>

				<p class="tile__subtitle text-black">Username:</p>

				<p class="tile__subtitle">
					<span class="font-bold text-black">saloniamatteo</span>
				</p>

				<div class="my-2"></div>

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
			<?= lang('Glob.to-main') ?>
		</a>
	</div>
</div>
</div>
</div>

<?= $this->include("static/footer") ?>
</body>
</html>
