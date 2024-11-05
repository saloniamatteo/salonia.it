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
<div class="hero-body bg-black u-opacity-90 py-1 px-0">
<div class="content u-text-left">
<div class="grid-sm u-gap-2">
	<!-- Text -->
	<div class="grid-c-9 grid-r-3 ml-2">
		<!-- Hello -->
		<h2 class="text-gray-300 mb-0 mt-4" style="font-size: 2rem!important; line-height: 2rem!important"><?= lang('Index.welcome.hello') ?>,</h2>
		<h1 class="text-white my-0" style="font-size: 2.8rem!important; line-height: 3rem!important">
		<span class="text-gray-300" style="font-size: 2rem!important; line-height: 1.75rem!important">
		<?= lang('Index.welcome.im') ?> </span>
		Matteo Salonia.
		</h1>

		<!-- Subtitle -->
		<p class="text-white text-md mt-0" style="line-height: 1.5rem!important">
		Sysadmin &amp; full-stack web developer
		</p>

		<div class="divider text-white my-0 mr-2"></div>

		<!-- Desc -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			<?= lang("Index.welcome.desc") ?>
		</p>

		<!-- SID -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			<?= lang("Index.welcome.sid") ?>&nbsp;
			<a class="font-bold text-white" href="/services"><u>Salonia Infrastrutture Digitali</u></a>
			?
		</p>
	</div>

	<!-- Picture -->
	<div class="grid-c-3 grid-r-3 mr-2 u-center">
		<!-- Load a low-quality image; after loading, using JS, load a higher-quality pic -->
		<img class="w-32 mt-2 u-round-lg" src="/pics/me2-lq.jpeg" alt="Matteo Salonia" onload="this.onload=null;this.src='/pics/me2.jpeg'">
	</div>
</div>
</div>
</div>
</div>

<!-- Linux & Software -->
<div class="hero u-text-center mt-4" id="linux-soft">
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
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<!-- Arch Linux -->
		<div class="tile level">
			<a href="https://arch.salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="book-open-text" class="text-gray-900 mt-1 w-4"></i>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
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

		<div class="divider my-2"></div>

		<!-- Dotfiles -->
		<div class="tile level">
			<a href="https://dotfiles.salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="folder-cog" class="text-gray-900 mt-1 w-4"></i>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					<?= lang("Index.dotfiles.title") ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang("Index.dotfiles.desc") ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider my-2"></div>

		<!-- Kernel -->
		<div class="tile level">
			<a href="<?= sub_url('kernel') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="server-cog" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- Packages -->
		<div class="tile level">
			<a href="<?= sub_url('packages') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="package" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- Software -->
		<div class="tile level">
			<a href="<?= sub_url('software') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="binary" class="text-gray-900 mt-1 w-4"></i>
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
<div class="hero u-text-center" id="about">
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
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<!-- Services -->
		<div class="tile level">
			<a href="<?= sub_url('services') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="server" class="text-gray-900 mt-1 w-4"></i>
			</div>

			<div class="tile__container">
				<p class="tile__title text-blue-700 u u-LR">
					<?= lang('Index.services.title') ?>
				</p>

				<p class="tile__subtitle text-black">
					<?= lang('Index.services.desc') ?>
				</p>
			</div>
			</a>
		</div>

		<div class="divider my-2"></div>

		<!-- Curriculum Vitae -->
		<div class="tile level">
			<?php
			// Serve out a different file, depending on the language
			// Get the current locale
			$locale = esc(\Config\Services::request()->getLocale());

			// Check locale and assign correct file
			if ($locale == "it")
				$file = 'cv.pdf';
			else
				$file = 'cv_en.pdf';

			// Print link
			echo "<a href='/$file' class='u-flex'>";
			?>
			<div class="tile__icon mx-2">
				<i data-lucide="file-badge" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- About me -->
		<div class="tile level">
			<a href="<?= sub_url('info') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="user-round" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- Contact me -->
		<div class="tile level">
			<a href="<?= sub_url('contact') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="send" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- Donate -->
		<div class="tile level">
			<a href="<?= sub_url('donate') ?>" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="hand-coins" class="text-gray-900 mt-1 w-4"></i>
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
<div class="hero u-text-center" id="tools-links">
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
	<div class="card u-border-1 border-gray-500">
	<div class="m-2">
		<!-- Portfolio -->
		<div class="tile level">
			<a href="https://portfolio.salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="globe" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- SearXNG -->
		<div class="tile level">
			<a href="https://s.salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="search" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- OpenAlias -->
		<div class="tile level">
			<a href="https://oa.salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="scroll-text" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- GitHub profile -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="github" class="text-gray-900 mt-1 w-4"></i>
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

		<div class="divider my-2"></div>

		<!-- Source code -->
		<div class="tile level">
			<a href="https://github.com/saloniamatteo/salonia.it" class="u-flex">
			<div class="tile__icon mx-2">
				<i data-lucide="github" class="text-gray-900 mt-1 w-4"></i>
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
