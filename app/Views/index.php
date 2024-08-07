<?php
	$opts = [
		"title" => lang("index.title"),
		"desc"	=> lang("index.desc"),
		"url"	=> base_url(),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Welcome -->
<div class="hero mt-2 bg-blue-200">
<div class="hero-body m-2-sm">
<div class="content">
	<h2 class="title">
		<?= lang("index.welcome.title") ?>
	</h2>

	<h5 class="subtitle text-gray-700">
		<?= lang("index.welcome.desc") ?>
	</h5>
</div>
</div>
</div>

<!-- Linux & Software -->
<div class="hero u-text-center u-shadow-inset" id="linux-soft">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4">
		<a class="text-gray-900" href="#linux-soft">
			<?= lang("index.linux-soft.title") ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang("index.linux-soft.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- Arch Linux -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/arch.png') ?>" alt="Arch Linux logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="https://arch.salonia.it" class="font-bold text-link-dark text-md u u-LR">
					<?= lang("index.arch.title") ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("index.arch.desc") ?>
				</p>

				<p class="tile__subtitle">
					<?= lang("index.arch.subd") ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Dotfiles -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/gnu.png') ?>" alt="GNU logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="https://dotfiles.salonia.it" class="font-bold text-link-dark text-md u u-LR">
					<?= lang("index.dotfiles.title") ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("index.dotfiles.desc") ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Kernel -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/linux.png') ?>" alt="Tux">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('kernel') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang("index.kernel.title") ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("index.kernel.desc") ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Packages -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/box.png') ?>" alt="Box">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('packages') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('index.packages.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('index.packages.desc') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Software -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/c.png') ?>" alt="C">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('software') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang("index.software.title") ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("index.software.desc") ?>
				</p>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
</div>

<!-- About me -->
<div class="hero u-text-center bg-blue-200 u-shadow-inset" id="about">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4">
		<a class="text-gray-900" href="#about">
			<?= lang('index.about.title') ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang('index.about.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- Curriculum Vitae -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/cv.png') ?>" alt="CV">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= base_url('cv.pdf') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('index.cv.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('index.cv.desc') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- About me -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/about.png') ?>" alt="About">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('info') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('index.info.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('index.info.desc') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Contact me -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/contact.png') ?>" alt="Contact">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('contact') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('index.contact.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('index.contact.desc') ?>
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Donate -->
		<div class="tile level">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/cash.png') ?>" alt="Cash">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title">
				<a href="<?= sub_url('donate') ?>" class="font-bold text-link-dark text-md u u-LR">
					<?= lang('index.donate.title') ?>
				</a>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('index.donate.desc') ?>
				</p>
			</div>
		</div>
	</div>
	</div>
	</div>
</div>
</div>
</div>

<!-- Tools & Links -->
<div class="hero u-text-center u-shadow-inset" id="tools-links">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4">
		<a class="text-gray-900" href="#tools-links">
			<?= lang("index.tools-links.title") ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang("index.tools-links.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
		<div class="m-3">
			<!-- SearXNG -->
			<div class="tile level">
				<div class="tile__icon">
					<figure class="w-6" style="background: white">
					<img src="<?= base_url('pics/searxng.png') ?>" alt="SearXNG logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title">
					<a href="https://s.salonia.it" class="font-bold text-link-dark text-md u u-LR">
						<?= lang("index.searxng.title") ?>
					</a>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("index.searxng.desc") ?>
					</p>
				</div>
			</div>

			<div class="divider"></div>

			<!-- OpenAlias -->
			<div class="tile level">
				<div class="tile__icon">
					<figure class="w-6 avatar" style="background: black">
					<img src="<?= base_url('pics/oa.png') ?>" alt="OpenAlias logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title">
					<a href="https://oa.salonia.it" class="font-bold text-link-dark text-md u u-LR">
						<?= lang("index.openalias.title") ?>
					</a>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("index.openalias.desc") ?>
					</p>
				</div>
			</div>

			<div class="divider"></div>

			<!-- GitHub profile -->
			<div class="tile level">
				<div class="tile__icon">
					<figure class="w-6" style="background: white">
					<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title">
					<a href="https://github.com/saloniamatteo" class="font-bold text-link-dark text-md u u-LR">
						<?= lang("index.github.title") ?>
					</a>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("index.github.desc") ?>
					</p>
				</div>
			</div>

			<div class="divider"></div>

			<!-- Source code -->
			<div class="tile level">
				<div class="tile__icon">
					<figure class="w-6" style="background: white">
					<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title">
					<a href="https://github.com/saloniamatteo/salonia.it" class="font-bold text-link-dark text-md u u-LR">
						<?= lang("index.source.title") ?>
					</a>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("index.source.desc") ?>
					</p>
				</div>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
</div>

<?= $this->include("static/footer") ?>
</body>
</html>
