@use('App\Helpers\Links')
@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("index.title"),
    "desc"  => __("index.desc"),
])

<body>
@include('static/header')

<!-- Welcome -->
<div class="hero" style="margin-top: 3.5em !important">
<div class="hero-body bg-black u-opacity-90 py-1 px-0">
<div class="content u-text-left">
<div class="sm:grid u-gap-2">
	<!-- Text -->
	<div class="grid-c-9 grid-r-3 ml-2">
		<!-- Hello -->
		<h2 class="text-gray-300 mb-0 mt-4" style="font-size: 2rem!important; line-height: 2rem!important">
			{{ __("index.welcome.hello") }}
		</h2>

		<h1 class="text-white my-0" style="font-size: 2.65rem!important; line-height: 3rem!important">
			Matteo Salonia.
		</h1>

		<!-- Subtitle -->
		<p class="text-white text-md mt-0" style="line-height: 1.5rem!important">
			Sysadmin &amp; full-stack web developer
		</p>

		<div class="divider text-white my-0 mr-2"></div>

		<!-- Desc -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			{{ __("index.welcome.desc") }}
		</p>

		<!-- SID -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			{{ __("index.welcome.look") }}&nbsp;
			<a class="font-bold text-white" href="{{ Url::subUrl('services') }}">
				<u>{{ __("index.welcome.sid") }}</u>
			</a>
			?
		</p>
	</div>

	<!-- Picture -->
	<div class="grid-c-3 grid-r-3 mr-2 u-center">
		<img class="w-32 mt-2 u-round-lg" src="{{ Vite::asset('resources/img/me2.webp') }}" alt="Matteo Salonia">
	</div>
</div>
</div>
</div>
</div>

<!-- Linux & Software -->
<x-hero id="linux-soft">
	<x-slot:title>
		{{ __("index.linux-soft.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.linux-soft.desc") }}
	</x-slot>

	<x-card>
		@foreach (__("header.pages.linux-soft.c") as $key => $value)
			@php
				$link = Links::getPagesLink("{$key}");
				$icon = Links::getPagesIcon("{$key}");
			@endphp

			<x-tile>
				<x-icon link="{{ $link }}" icon="{{ $icon }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700 text-md u u-LR">
						{{ __("index.linux-soft.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{{ __("index.linux-soft.$key.desc") }}
					</p>

					@if (Lang::has("index.linux-soft.$key.subd"))
						<p class="tile__subtitle text-gray-800">
							{{ __("index.linux-soft.$key.subd") }}
						</p>
					@endif
				</div>
				</x-icon>
			</x-tile>

			@if ($key !== array_key_last(__("header.pages.linux-soft.c")))
				<div class="divider my-2"></div>
			@endif
		@endforeach
	</x-card>
</x-hero>

<!-- About me -->
<x-hero id="about">
	<x-slot:title>
		{{ __("index.about.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.about.desc") }}
	</x-slot>

	<x-card>
		@foreach (__("header.pages.about.c") as $key => $value)
			@php
				$link = Links::getPagesLink("{$key}");
				$icon = Links::getPagesIcon("{$key}");
			@endphp

			<x-tile>
				<x-icon link="{{ $link }}" icon="{{ $icon }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700 text-md u u-LR">
						{{ __("index.about.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{{ __("index.about.$key.desc") }}
					</p>

					@if (Lang::has("index.about.$key.subd"))
						<p class="tile__subtitle text-gray-800">
							{{ __("index.about.$key.subd") }}
						</p>
					@endif
				</div>
				</x-icon>
			</x-tile>

			@if ($key !== array_key_last(__("header.pages.about.c")))
				<div class="divider my-2"></div>
			@endif
		@endforeach
	</x-card>
</x-hero>

<!-- Tools & Links -->
<x-hero id="tools-links">
	<x-slot:title>
		{{ __("index.tools-links.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.tools-links.desc") }}
	</x-slot>

	<x-card>
		@foreach (__("header.links.c") as $key => $value)
			@php
				$link = Links::getLink("{$key}");
				$icon = Links::getIcon("{$key}");
			@endphp

			<x-tile>
				<x-icon link="{{ $link }}" icon="{{ $icon }}">

				<div class="tile__container">
					<p class="tile__title text-blue-700 text-md u u-LR">
						{{ __("index.tools-links.$key.title") }}
					</p>

					<p class="tile__subtitle text-black">
						{{ __("index.tools-links.$key.desc") }}
					</p>

					@if (Lang::has("index.links.$key.subd"))
						<p class="tile__subtitle text-gray-800">
							{{ __("index.tools-links.$key.subd") }}
						</p>
					@endif
				</div>
				</x-icon>
			</x-tile>

			@if ($key !== array_key_last(__("header.links.c")))
				<div class="divider my-2"></div>
			@endif
		@endforeach
	</x-card>
</x-hero>

@include('static/footer')
</body>
</html>
