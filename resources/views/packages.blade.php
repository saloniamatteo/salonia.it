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
		@php
			$packages = [
				'librsvg' => [
					'img' => 'librsvg.png',
					'url' => 'https://github.com/saloniamatteo/librsvg-overlay'
				]
			];
		@endphp

		@foreach ($packages as $key => $val)
			<x-tile>
				<x-icon-img alt="{{ $key }}"
				href="{{ $val['url'] }}"
				src="{{ Vite::asset('resources/img/' . $val['img']) }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700">
						{{ __("packages.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{!! __("packages.$key.desc") !!}
					</p>
				</div>
				</x-icon-img>
			</x-tile>

			@if ($key !== array_key_last($packages))
				<div class="divider"></div>
			@endif
		@endforeach
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
