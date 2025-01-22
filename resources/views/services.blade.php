@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("services.title"),
    "desc"  => __("services.desc"),
])

<body>
@include('static/header')

<!-- Services -->
<x-hero class="mt-4" id="services">
	<x-slot:title>
		{{ __("services.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("services.desc") }}
	</x-slot>

	<!-- Promo -->
	<div class="content u-text-left w-90p-md">
		<div class="card p-1" style="background: linear-gradient(to top, #141e30, #243b55)" id="promo">
			<p class="font-bold text-white text-lg mx-2 mt-2 mb-0">
				{!! __("services.promo.title") !!}
			</p>

			<p class="font-bold text-gray-100 mt-0 mx-2">
				{{ __("services.promo.desc") }}
				&nbsp;
				{!!
					Url::makeLink(
					Url::subUrl("contact#sid"),
					"Salonia Infrastrutture Digitali",
					300)
				!!}
			</p>
		</div>
	</div>

	<!-- Webdev -->
	<x-card>
		<x-tag id="webdev">{{ __("services.webdev.title") }}</x-tag>

		<p class="mt-1">
			{!! __("services.webdev.desc") !!}
		</p>

		<!-- Multi-lang -->
		<x-tag-md id="lang">
			{{ __("services.webdev.lang.title") }}
		</x-tag-md>

		<p class="mt-0">
			{!! __('services.webdev.lang.desc') !!}
		</p>

		<!-- Mobile -->
		<x-tag-md id="mobile">
			{{ __("services.webdev.mobile.title") }}
		</x-tag-md>

		<p class="mt-0">
			{!! __('services.webdev.mobile.desc') !!}
		</p>

		<!-- Speed -->
		<x-tag-md id="speed">
			{{ __("services.webdev.speed.title") }}
		</x-tag-md>

		<p class="mt-0">
			{!! __('services.webdev.speed.desc') !!}
		</p>

		<!-- Design -->
		<x-tag-md id="design">
			{{ __("services.webdev.design.title") }}
		</x-tag-md>

		<p class="mt-0">
			{!! __('services.webdev.design.desc') !!}
		</p>

		<!-- SEO -->
		<x-tag-md id="seo">
			{{ __("services.webdev.seo.title") }}
		</x-tag-md>

		<p class="mt-0">
			{!! __('services.webdev.seo.desc') !!}
		</p>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
