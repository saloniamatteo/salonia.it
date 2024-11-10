<!-- Header -->
<div class="header header-fixed u-unselectable u-shadow-none" style="border-bottom: 1px solid">
	<div class="header-brand">
		<a href="<?= site_url() ?>">
			<img src="/pics/salonia.png" alt="Logo" class="w-24" style="min-width: 180px">
		</a>

		<div class="nav-item nav-btn" id="header-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

	<div class="header-nav" id="header-menu" role="button">
		<div class="nav-right">
			<!-- Language selector -->
			<div class="nav-item">
				<?php
				function text_to_flag($text) {
					$flagEmoji = [
						'en' => '🇬🇧',
						'it' => '🇮🇹',
					// Add more country codes and their corresponding emoji flags as needed
					];

					// Check if the input text exists in the mapping array
					if (array_key_exists($text, $flagEmoji))
						return $flagEmoji[$text];

					return $text; // Return the original text if no matching
				}

				// Create link for each supported language
				// Get URI
				$uri = service('uri')->getRoutePath();

				// Get list of supported locales
				$locales_list = config("App")->supportedLocales;

				// Iterate over available locales
				for ($i = 0; $i < count($locales_list); $i++) {
					$locale = $locales_list[$i];
					$href = replace_lang($uri, $locale);

					// Add element with respective emoji
					echo "<a class='u u-LR font-bold text-gray-900 p-0 m-1' href='/$href'>"
						. text_to_flag($locale) . "&nbsp;&nbsp;"
						. lang("Glob.$locale")
						. "</a>";
				}
				?>
			</div>

			<!-- Pages -->
			<div class="nav-item has-sub toggle-hover px-0">
				<!-- Dropdown -->
				<a class="font-bold nav-dropdown-link text-gray-900 py-0 m-0" href="#">
					<i data-lucide="laptop" class="text-gray-900 w-3"></i>
					&nbsp;
					<?= lang("Glob.pages") ?>
				</a>

				<ul class="dropdown-menu dropdown-animated" id="pages-menu" role="menu">
					<!-- Linux & Software -->
					<li role="menuitem">
						<span class="ml-2 font-bold">
							<?= lang("Index.linux-soft.title") ?>
						</span>
					</li>

					<!-- Kernel -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('kernel') ?>">
							<i data-lucide="server-cog" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.kernel.title") ?>
						</a>
					</li>

					<!-- DNS -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('dns') ?>">
							<i data-lucide="network" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.dns.title") ?>
						</a>
					</li>

					<!-- Packages -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('packages') ?>">
							<i data-lucide="package" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.packages.title") ?>
						</a>
					</li>

					<!-- Software -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800" href="<?= sub_url('software') ?>">
							<i data-lucide="binary" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.software.title") ?>
						</a>
					</li>

					<div class="divider mt-0 mb-1"></div>

					<!-- About me -->
					<li role="menuitem">
						<span class="ml-2 font-bold">
							<?= lang("Index.about.title") ?>
						</span>
					</li>

					<!-- Services -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('services') ?>">
							<i data-lucide="server" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.services.title") ?>
						</a>
					</li>

					<!-- Curriculum vitae -->
					<li role="menuitem">
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
						echo "<a class='u u-LR font-bold u-flex text-gray-800 pb-0' href='/$file'>";
						?>
							<i data-lucide="file-badge" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.cv.title") ?>
						</a>
					</li>

					<!-- Info -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('info') ?>">
							<i data-lucide="user-round" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.info.title") ?>
						</a>
					</li>

					<!-- Contact -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="<?= sub_url('contact') ?>">
							<i data-lucide="send" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.contact.title") ?>
						</a>
					</li>

					<!-- Donate -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('donate') ?>">
							<i data-lucide="hand-coins" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.donate.title") ?>
						</a>
					</li>
				</ul>
			</div>

			<!-- Links -->
			<div class="nav-item has-sub toggle-hover px-0">
				<!-- Dropdown -->
				<a class="font-bold nav-dropdown-link text-gray-900 py-0 m-0" href="#">
					<i data-lucide="link" class="text-gray-900 w-3"></i>
					&nbsp;
					<?= lang("Glob.links") ?>
				</a>

				<ul class="dropdown-menu dropdown-animated" id="links-menu" role="menu">
					<!-- Links -->
					<li role="menuitem">
						<span class="ml-2 font-bold">
							<?= lang("Glob.links") ?>
						</span>
					</li>

					<!-- Portfolio -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="https://portfolio.salonia.it">
							<i data-lucide="globe" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.portfolio.title") ?>
						</a>
					</li>

					<!-- SearXNG -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="https://s.salonia.it">
							<i data-lucide="search" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.searxng.title") ?>
						</a>
					</li>

					<!-- OpenAlias -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="https://oa.salonia.it">
							<i data-lucide="scroll-text" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.openalias.title") ?>
						</a>
					</li>

					<!-- GitHub profile -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 pb-0" href="https://github.com/saloniamatteo">
							<i data-lucide="github" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.github.title") ?>
						</a>
					</li>

					<!-- Website source code -->
					<li class="w-32" role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800" href="https://github.com/saloniamatteo/salonia.it">
							<i data-lucide="github" class="text-gray-900 w-3"></i>
							&nbsp;
							<?= lang("Index.source.title") ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
