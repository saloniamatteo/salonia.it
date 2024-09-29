<?php
	$opts = [
		"title" => lang("Index.title"),
		"desc"	=> lang("Index.desc"),
		"url"	=> base_url(),
	];

	echo view("static/head", $opts);
?>

<body>
<?= $this->include("static/header") ?>

<!-- Welcome -->
<div class="hero" style="margin-top: 3.5em !important">
<div class="hero-body bg-black u-opacity-90 pt-1 px-0">
<div class="content u-center">
	<figure class="fig w-100p u-center">
		<img class="img-cover h-6 h-8-md mt-3 mb-1" src="<?= base_url('pics/saloniaw.png') ?>" alt="Salonia logo" style="min-width: 325px">
	</figure>

	<p class="font-bold mt-1 text-lg text-white u-text-center" style="margin-left: 0.9rem !important; margin-right: 0.75rem !important">
		<?= lang("Index.welcome.desc") ?>
	</p>
</div>
</div>
</div>

<!-- Linux & Software -->
<div class="hero u-text-center u-shadow-inset" id="linux-soft">
<div class="hero-body">
<div class="content w-90p">
	<h2 class="headline-4">
		<a class="text-black" href="#linux-soft">
			<?= lang("Index.linux-soft.title") ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang("Index.linux-soft.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- Arch Linux -->
		<div class="tile level">
			<a href="https://arch.salonia.it" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/arch.png') ?>" alt="Arch Linux logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang("Index.arch.title") ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Index.arch.desc") ?>
				</p>

				<p class="tile__subtitle text-gray-800">
					<?= lang("Index.arch.subd") ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Dotfiles -->
		<div class="tile level">
			<a href="https://dotfiles.salonia.it" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/gnu.png') ?>" alt="GNU logo">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang("Index.dotfiles.title") ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Index.dotfiles.desc") ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Kernel -->
		<div class="tile level">
			<a href="<?= sub_url('kernel') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/linux.png') ?>" alt="Tux">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang("Index.kernel.title") ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Index.kernel.desc") ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Packages -->
		<div class="tile level">
			<a href="<?= sub_url('packages') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/box.png') ?>" alt="Box">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.packages.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.packages.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Software -->
		<div class="tile level">
			<a href="<?= sub_url('software') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6" style="background: white">
				<img src="<?= base_url('pics/c.png') ?>" alt="C">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang("Index.software.title") ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Index.software.desc") ?>
				</p>
			</div>
			</a>
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
		<a class="text-black" href="#about">
			<?= lang('Index.about.title') ?>
		</a>
	</h2>

	<p class="lead text-black">
		<?= lang('Index.about.desc') ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
	<div class="m-3">
		<!-- Curriculum Vitae -->
		<div class="tile level">
			<a href="<?= base_url('cv.pdf') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/cv.png') ?>" alt="CV">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.cv.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.cv.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Design principles -->
		<div class="tile level">
			<a href="<?= base_url('design') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/pencil.png') ?>" alt="Pencil">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.design.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.design.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- About me -->
		<div class="tile level">
			<a href="<?= sub_url('info') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/about.png') ?>" alt="About">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.info.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.info.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Contact me -->
		<div class="tile level">
			<a href="<?= sub_url('contact') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/contact.png') ?>" alt="Contact">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.contact.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.contact.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider"></div>

		<!-- Donate -->
		<div class="tile level">
			<a href="<?= sub_url('donate') ?>" class="u-flex">
			<div class="tile__icon">
				<figure class="w-6 mt-1" style="background: white">
				<img src="<?= base_url('pics/cash.png') ?>" alt="Cash">
				</figure>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.donate.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.donate.desc') ?>
				</p>
			</div>
			</a>
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
		<a class="text-black" href="#tools-links">
			<?= lang("Index.tools-links.title") ?>
		</a>
	</h2>

	<p class="lead">
		<?= lang("Index.tools-links.desc") ?>
	</p>

	<div class="content u-text-left w-90p-md">
	<div class="card">
		<div class="m-3">
			<!-- Portfolio -->
			<div class="tile level">
				<a href="https://portfolio.salonia.it" class="u-flex">
				<div class="tile__icon">
					<figure class="w-6 mt-1" style="background: white">
					<img src="<?= base_url('pics/web.png') ?>" alt="Web">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title text-blue-700 u u-LR">
						<?= lang('Index.portfolio.title') ?>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang('Index.portfolio.desc') ?>
					</p>
				</div>
				</a>
			</div>

			<div class="divider"></div>

			<!-- SearXNG -->
			<div class="tile level">
				<a href="https://s.salonia.it" class="u-flex">
				<div class="tile__icon">
					<figure class="w-6 mt-1" style="background: white">
					<img src="<?= base_url('pics/searxng.png') ?>" alt="SearXNG logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title text-blue-700 u u-LR">
						<?= lang("Index.searxng.title") ?>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("Index.searxng.desc") ?>
					</p>
				</div>
				</a>
			</div>

			<div class="divider"></div>

			<!-- OpenAlias -->
			<div class="tile level">
				<a href="https://oa.salonia.it" class="u-flex">
				<div class="tile__icon">
					<figure class="avatar w-6 mt-1" style="background: black">
					<img src="<?= base_url('pics/oa.png') ?>" alt="OpenAlias logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title text-blue-700 u u-LR">
						<?= lang("Index.openalias.title") ?>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("Index.openalias.desc") ?>
					</p>
				</div>
				</a>
			</div>

			<div class="divider"></div>

			<!-- GitHub profile -->
			<div class="tile level">
				<a href="https://github.com/saloniamatteo" class="u-flex">
				<div class="tile__icon">
					<figure class="w-6 mt-1" style="background: white">
					<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title text-blue-700 u u-LR">
						<?= lang("Index.github.title") ?>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("Index.github.desc") ?>
					</p>
				</div>
				</a>
			</div>

			<div class="divider"></div>

			<!-- Source code -->
			<div class="tile level">
				<a href="https://github.com/saloniamatteo/salonia.it" class="u-flex">
				<div class="tile__icon">
					<figure class="w-6 mt-1" style="background: white">
					<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
					</figure>
				</div>

				<div class="tile__container">
					<p class="tile__title text-blue-700 u u-LR">
						<?= lang("Index.source.title") ?>
					</p>

					<p class="tile__subtitle text-black">
						<?= lang("Index.source.desc") ?>
					</p>
				</div>
				</a>
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
