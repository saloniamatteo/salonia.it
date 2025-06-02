@use('App\Helpers\Links')
@use('App\Helpers\Url')

<!-- Footer -->
<footer class="footer bg-white p-4 mt-8 u-center">
	<!-- Logo -->
	<a href="https://salonia.it">
		<img src="{{ Vite::asset('resources/img/salonia.webp') }}"
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
		di&thinsp;
		<a class="u u-LR text-blue-700" href="https://salonia.it/contact">
			Matteo Salonia
		</a>
	</h6>

	<!-- Pages & Links -->
	<div class="mt-2">
		@php
			// Combine pages arrays
			static $tmp = __("header.pages.linux-soft.c")
						+ __("header.pages.about.c");
		@endphp

		<!-- Pages -->
		@foreach ($tmp as $key => $value)
			@php
				$link = Links::getPagesLink($key);
			@endphp

			<x-footer-link href="{{ $link }}">
				{{ $value }}
			</x-footer-link>

			&nbsp;&nbsp;
			<span class="text-gray-500">|</span>
			&nbsp;&nbsp;
		@endforeach

		<!-- Links -->
		@php
			$links = __("header.links.c");
		@endphp

		@foreach ($links as $key => $value)
			@php
				$link = Links::getLink($key);
			@endphp

			<x-footer-link href="{{ $link }}">
				{{ $value }}
			</x-footer-link>

			<!-- Check if we're the last array item -->
			@if (array_key_last($links) !== $key)
				&nbsp;&nbsp;
				<span class="text-gray-500">|</span>
				&nbsp;&nbsp;
			@endif
		@endforeach
	</div>

	<p class="text-sm mt-2 mb-0 w-100p">&copy; 2020-<?= date("Y") ?></p>
</footer>
