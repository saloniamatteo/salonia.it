@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("packages.title"),
    "desc"  => __("packages.desc"),
])

<body>
@include('static/header')

<!-- Packages -->
<x-hero class="mt-4" id="packages">
	<x-slot:title>
		{{ __("packages.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("packages.desc") }}
	</x-slot>

	<!-- Packages -->
	<x-card class="m-3">
		<x-tile>
			<x-icon-img alt="Librsvg"
			href="https://github.com/saloniamatteo/librsvg-overlay"
			src="{{ Vite::asset('resources/img/librsvg.png') }}">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					{{ __("packages.librsvg.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{!! __("packages.librsvg.desc") !!}
				</p>
			</div>
			</x-icon-img>
		</x-tile>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
