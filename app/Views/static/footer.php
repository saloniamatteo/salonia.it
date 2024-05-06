<!-- Footer -->
<footer class="footer bg-blue-700 px-4 pt-6 pb-4 mt-3 u-shadow-inset">
	<h5 class="title text-white pt-2">Matteo Salonia</h5>

	<?php
	$uri = service('uri')->getRoutePath();

	// Create buttons for each language
	// TODO: create selector in header
	$locales_list = config("App")->supportedLocales;

	// Iterate over available locales
	for ($i = 0; $i < count($locales_list); $i++) {
		$locale = $locales_list[$i];
		$href = base_url() . replace_lang($uri, $locale);

		// Add buttons to footer
		echo "<a class='font-bold text-blue-700 p-2 tag' "
			. "href='$href'> "
			. strtoupper($locale) . "</a>";

		// Add spacers
		if ($i != count($locales_list) - 1)
			echo "<span> </span>";
	}
	?>

	<p class="text-white mt-4 mb-0">&copy; 2022-<?= date("Y") ?></p>
</footer>
