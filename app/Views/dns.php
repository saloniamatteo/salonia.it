<?php
	$opts = [
		"title" => lang("DNS.title"),
		"desc"	=> lang("DNS.desc"),
		"url"	=> base_url("dns"),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- DNS -->
<div class="hero u-text-center u-shadow-inset pt-4">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4 text-black">
		<?= lang("DNS.welcome.title") ?>
	</h2>

	<p class="lead">
		<?= lang("DNS.welcome.desc") ?>
	</p>

	<p>
	<?= lang('DNS.go-to.title') ?>:<br>

	<a class="tag bg-blue-700 text-white" href="#intro">
		<?= lang('DNS.go-to.intro') ?>
	</a>

	<span> </span>

	<a class="tag bg-blue-700 text-white" href="#params">
		<?= lang('DNS.go-to.params') ?>
	</a>
	</p>

	<!-- Intro -->
	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3">
		<h3 class="tag tag--lg bg-blue-700 my-0" id="intro">
			<a class="text-white" href="#intro">
				<?= lang('DNS.go-to.intro') ?>
			</a>
		</h3>

		<p class="my-1">
			<?php
				$msg = lang('DNS.intro.desc');

				$dns_link  = lang('DNS.intro.dns-link');
				$dns_flink = "<a class='text-blue-700 u u-LR' href='$dns_link'>" . lang('DNS.intro.dns') . "</a>";

				$http_link  = lang('DNS.intro.http-link');
				$http_flink = "<a class='text-blue-700 u u-LR' href='$http_link'>" . lang('DNS.intro.http') . "</a>";

				$mitm_link = lang('DNS.intro.mitm-link');
				$mitm_flink = "<a class='text-blue-700 u u-LR' href='$mitm_link'>" . lang('DNS.intro.mitm') . "</a>";

				$fmt_msg = sprintf($msg, $dns_flink, $http_flink, $mitm_flink);
				echo $fmt_msg;
			?>
		</p>

		<p class="my-1">
			<?= lang('DNS.intro.desc2'); ?>
		</p>

		<p class="my-1">
			<?php
				$msg = lang('DNS.intro.desc3');

				$rprox_link  = lang('DNS.intro.rprox-link');
				$rprox_flink = "<a class='text-blue-700 u u-LR' href='$rprox_link'>" . lang('DNS.intro.rprox') . "</a>";

				$fmt_msg = sprintf($msg, $rprox_flink);
				echo $fmt_msg;
			?>
		</p>

		<div class="divider"></div>

		<p class="my-1">
			<?= lang('DNS.intro.desc4'); ?>
		</p>
	</div>
	</div>
	</div>

	<!-- Parameters -->
	<div class="content u-text-left w-90p-md">
	<div class="card u-border-1 border-gray-500">
	<div class="m-3">
		<h3 class="tag tag--lg bg-blue-700 my-0" id="params">
			<a class="text-white" href="#params">
				<?= lang('DNS.go-to.params') ?>
			</a>
		</h3>

		<p class="my-1">
			<?= lang('DNS.params.desc'); ?>
		</p>

		<p class="my-1">
			<p>Endpoint: &nbsp;<code>https://dns.salonia.it/dns-query</code></p>
		</p>

		<div class="divider"></div>

		<p class="mt-1 mb-0">
			<?= lang('DNS.params.ff.desc'); ?>:

			<ol class="mt-0">
				<li><strong><?= lang('DNS.params.ff.s1') ?></strong></li>
				<li><strong><?= lang('DNS.params.ff.s2') ?></strong></li>
				<li><?= lang('DNS.params.ff.s3') ?></li>
				<li>
					<?= lang('DNS.params.ff.s4') ?>&nbsp;&nbsp;
					<code><?= lang('DNS.params.endpoint') ?></code>
				</li>
			</ol>
		</p>

		<div class="divider"></div>

		<p class="my-1">
			<?php
				$msg = lang('DNS.params.android.desc');

				$ret_link  = lang('DNS.params.android.retlnk');
				$ret_flink = "<a class='text-blue-700 u u-LR' href='$rprox_link'><strong>RethinkDNS</strong></a>";

				$fmt_msg = sprintf($msg, $ret_flink);
				echo "$fmt_msg:";
			?>

			<ol class="mt-0">
				<li><?= lang('DNS.params.android.s1') ?></li>
				<li><strong><?= lang('DNS.params.android.s2') ?></strong></li>
				<li>
					<?php
						$msg = lang('DNS.params.android.s3');

						$icon = '<i class="u-inline u-align-text-top" data-lucide="circle-plus" style="height: 1.25rem"></i>';

						$fmt_msg = sprintf($msg, $icon);
						echo $fmt_msg;
					?>
				</li>
				<li>
					<?= lang('DNS.params.android.s4') ?>:&nbsp;&nbsp;
					<code><?= lang('DNS.params.endpoint') ?></code>
				</li>
				<li><?= lang('DNS.params.android.s5') ?></li>
			</ol>
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
