@use('app\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("writeups.title"),
    "desc"  => __("writeups.desc"),
])

<body>
@include('static/header')

<!-- Writeups -->
<x-hero class="mt-4" id="writeups">
	<x-slot:title>
		{{ __("writeups.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("writeups.desc") }}
	</x-slot>

	<!-- Writeups -->
	<x-card class="m-3">
		@php
			$writeups = [
				'k8s' => [
					'icon' => 'k8s.webp',
					'page' => 'kubernetes'
				],

				'mgc' => [
					'icon' => 'mgc.webp',
					'page' => 'mariadb-galera-cluster'
				],

				'spl' => [
					'icon' => 'spl.webp',
					'page' => 'ssh-passwordless-login'
				]
			]
		@endphp

		@foreach ($writeups as $key => $val)
			<x-tile>
				<x-icon-img alt="{{ $key }}"
				href="{{ Url::subUrl('writeups/' . $val['page']) }}"
				src="{{ Vite::asset('resources/img/writeups/' . $val['icon']) }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700">
						{{ __("writeups.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{!! __("writeups.$key.desc") !!}
					</p>
				</div>
				</x-icon-img>
			</x-tile>

			@if ($key !== array_key_last($writeups))
				<div class="divider"></div>
			@endif
		@endforeach
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
