<!-- Header -->
<div class="header header-animated header-fixed u-unselectable" style="backdrop-filter: blur(8px); background-color: #fffc">
	<div class="header-brand">
		<a href="https://salonia.it">
		<?php
			$opts = [
				"src"	=> "pics/salonia.png",
				"alt"	=> "Logo",
				"class"	=> "w-24",
			];

			echo img($opts);
		?>
		</a>

		<div class="nav-item nav-btn" id="header-btn">
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>

	<div class="header-nav" id="header-menu" role="button">
		<div class="nav-right">
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
					echo "<a class='u u-LR font-bold' href='$href'>"
						. text_to_flag($locale) . "&nbsp;&nbsp;"
						. lang("glob.$locale")
						. "</a>";
				}
				?>
			</div>
		</div>
	</div>
</div>
