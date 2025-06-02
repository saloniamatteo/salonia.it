@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("software.title"),
    "desc"  => __("software.desc"),
])

<body>
@include('static/header')

<!-- Software -->
<x-hero class="mt-4" id="software">
	<x-slot:title>
		{{ __("software.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("software.desc") }}
	</x-slot>

	<x-card class="m-3">
		@php
			$software = [
				'tp-xfan' => [
					'img' => 'tp-xfan.webp',
					'url' => 'https://github.com/saloniamatteo/tp-xfan'
				],

				'csnake' => [
					'img' => 'csnake.webp',
					'url' => 'https://github.com/saloniamatteo/csnake',
				],

				'quiz' => [
					'img' => 'quiz.webp',
					'url' => 'https://github.com/saloniamatteo/quiz',
				],

				'calc' => [
					'img' => 'calc.webp',
					'url' => 'https://github.com/saloniamatteo/calc',
				],
			];
		@endphp

		@foreach ($software as $key => $val)
			<x-tile>
				<x-icon-img alt="{{ $key }}"
				href="{{ $val['url'] }}"
				src="{{ Vite::asset('resources/img/' . $val['img']) }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700">
						{{ __("software.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{!! __("software.$key.desc") !!}
					</p>

					<p class="tile__subtitle text-gray-800">
						{{ __("software.$key.subd") }}
					</p>
				</div>
				</x-icon-img>
			</x-tile>

			@if ($key !== array_key_last($software))
				<div class="divider"></div>
			@endif
		@endforeach
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
