@use('App\Helpers\Links')

<!-- Footer -->
<footer class="footer bg-white p-4 mt-8 u-center">
	<!-- Logo -->
	<a href="https://salonia.it">
		<img src="{{ Vite::asset('resources/img/salonia.png') }}"
		alt="Logo" loading="lazy"
		style="min-width: 180px; width: 14rem !important">
	</a>

	<!-- Text -->
	<p class="title mt-1 mb-1 text-black"
	   style="padding-top: 0.15em !important; font-size: 1.8rem !important; line-height: 2.25rem !important"
	>
		<strong>Infrastrutture Digitali</strong>
	</p>

	<h6 class="font-bold mb-0 w-100p">
		di <a class="text-blue-700" href="https://salonia.it/contact">Matteo Salonia</a>
	</h6>

	<p class="text-sm mt-2 mb-0 w-100p">&copy; 2020-<?= date("Y") ?></p>
</footer>
