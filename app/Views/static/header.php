<!-- Header -->
<div class="header header-animated header-fixed u-unselectable" style="backdrop-filter: blur(8px); background-color: #fffc">
	<div class="header-brand">
		<a href="https://salonia.it">
			<img src="<?= base_url('pics/salonia.png') ?>" alt="Logo" class="w-24" style="min-width: 180px">
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
					$href = base_url() . replace_lang($uri, $locale);

					// Add element with respective emoji
					echo "<a class='u u-LR font-bold text-gray-900 p-0 m-1' href='$href'>"
						. text_to_flag($locale) . "&nbsp;&nbsp;"
						. lang("Glob.$locale")
						. "</a>";
				}
				?>
			</div>

			<!-- Pages -->
			<div class="nav-item has-sub toggle-hover px-0">
				<!-- Dropdown -->
				<a class="font-bold nav-dropdown-link text-gray-900 py-0 m-0">
					<span class="u u-LR">💻&nbsp;&nbsp;<?= lang("Glob.pages") ?></span>
				</a>

				<ul class="dropdown-menu dropdown-animated" id="pages-menu" role="menu" onclick="menu_toggle(this)">
					<!-- Linux & Software -->
					<li role="menuitem">
						<span class="ml-2 font-bold">
							<?= lang("Index.linux-soft.title") ?>
						</span>
					</li>

					<!-- Kernel -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('kernel') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/linux.png') ?>" alt="Tux">
							</figure>

							&nbsp;

							<?= lang("Index.kernel.title") ?>
						</a>
					</li>

					<!-- Packages -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('packages') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/box.png') ?>" alt="Box">
							</figure>

							&nbsp;

							<?= lang("Index.packages.title") ?>
						</a>
					</li>

					<!-- Software -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('software') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/c.png') ?>" alt="C">
							</figure>

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
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('services') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/services.png') ?>" alt="Services">
							</figure>

							&nbsp;

							<?= lang("Index.services.title") ?>
						</a>
					</li>

					<!-- Curriculum vitae -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= base_url('cv.pdf') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/cv.png') ?>" alt="CV">
							</figure>

							&nbsp;

							<?= lang("Index.cv.title") ?>
						</a>
					</li>

					<!-- Design principles -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('design') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/pencil.png') ?>" alt="About">
							</figure>

							&nbsp;

							<?= lang("Index.design.title") ?>
						</a>
					</li>

					<!-- Info -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('info') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/about.png') ?>" alt="About">
							</figure>

							&nbsp;

							<?= lang("Index.info.title") ?>
						</a>
					</li>

					<!-- Contact -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('contact') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/contact.png') ?>" alt="Contact">
							</figure>

							&nbsp;

							<?= lang("Index.contact.title") ?>
						</a>
					</li>

					<!-- Donate -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="<?= sub_url('donate') ?>">
							<figure class="w-3">
								<img src="<?= base_url('pics/cash.png') ?>" alt="Cash">
							</figure>

							&nbsp;

							<?= lang("Index.donate.title") ?>
						</a>
					</li>
				</ul>
			</div>

			<!-- Links -->
			<div class="nav-item has-sub toggle-hover px-0">
				<!-- Dropdown -->
				<a class="font-bold nav-dropdown-link text-gray-900 py-0 m-0">
					<span class="u u-LR">🔗&nbsp;&nbsp;<?= lang("Glob.links") ?></span>
				</a>

				<ul class="dropdown-menu dropdown-animated" id="links-menu" role="menu" onclick="menu_toggle(this)">
					<!-- Portfolio -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="https://portfolio.salonia.it">
							<figure class="w-3">
								<img src="<?= base_url('pics/web.png') ?>" alt="Web">
							</figure>

							&nbsp;

							<?= lang("Index.portfolio.title") ?>
						</a>
					</li>

					<!-- SearXNG -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="https://s.salonia.it">
							<figure class="w-3">
								<img src="<?= base_url('pics/searxng.png') ?>" alt="SearXNG logo">
							</figure>

							&nbsp;

							<?= lang("Index.searxng.title") ?>
						</a>
					</li>

					<!-- OpenAlias -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="https://oa.salonia.it">
							<figure class="w-3">
								<img src="<?= base_url('pics/oa.png') ?>" style="border-radius: 50%" alt="OpenAlias logo">
							</figure>

							&nbsp;

							<?= lang("Index.openalias.title") ?>
						</a>
					</li>

					<!-- GitHub profile -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="https://github.com/saloniamatteo">
							<figure class="w-3">
								<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
							</figure>

							&nbsp;

							<?= lang("Index.github.title") ?>
						</a>
					</li>

					<!-- Website source code -->
					<li role="menuitem">
						<a class="u u-LR font-bold u-flex text-gray-800 py-1" href="https://github.com/saloniamatteo/salonia.it">
							<figure class="w-3">
								<img src="<?= base_url('pics/github.png') ?>" alt="GitHub logo">
							</figure>

							&nbsp;

							<?= lang("Index.source.title") ?>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
