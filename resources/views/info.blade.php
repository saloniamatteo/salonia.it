@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("info.title"),
    "desc"  => __("info.desc"),
])

<body>
@include('static/header')

<!-- Info -->
<x-hero class="mt-4" id="info">
	<x-slot:title>
		{{ __("info.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("info.desc") }}
	</x-slot>

	<x-card class="m-3">
		<div class="grid-sm u-gap-2 u-text-left">
			<div class="grid-c-4 grid-r-3">
				<img class="img-stretch mb-2 u-round-lg"
				loading="lazy" alt="Matteo Salonia"
				src="{{ Vite::asset('resources/img/me.jpg') }}">
			</div>

			<div class="grid-c-8-md ml-1-md">
				<h1 class="my-0 text-black">Matteo Salonia</h1>
			</div>

			<div class="grid-c-8 ml-1-md mr-4-lg">
				<p class="mt-0-md">
					{!! __("info.hero.desc") !!}
				</p>

				<p class="mt-0-md">
					{!! __("info.hero.desc2") !!}
				</p>

				<ul>
					<!-- GNU/Linux -->
					<x-list-item-u
					name="{{ __('info.hero.spec.linux.title') }}">

						<ul>
							<li>{!! __("info.hero.spec.linux.desc") !!}</li>
							<li>{!! __("info.hero.spec.linux.desc2") !!}</li>
							<li>{!! __("info.hero.spec.linux.desc3") !!}</li>
						</ul>
					</x-list-item-u>

					<!-- Cloud computing -->
					<x-list-item-u
					name="{{ __('info.hero.spec.cloud.title') }}">

						{!! __("info.hero.spec.cloud.desc") !!}
					</x-list-item-u>

					<!-- Firewall -->
					<x-list-item-u
					name="{{ __('info.hero.spec.firewall.title') }}">

						<ul>
							<li>{!! __("info.hero.spec.firewall.desc") !!}</li>
							<li>{!! __("info.hero.spec.firewall.desc2") !!}</li>
							<li>{!! __("info.hero.spec.firewall.desc3") !!}</li>
						</ul>
					</x-list-item-u>

					<!-- Web server -->
					<x-list-item-u
					name="{{ __('info.hero.spec.webserver.title') }}">

						{!! __("info.hero.spec.webserver.desc") !!}
					</x-list-item-u>

					<!-- Web dev -->
					<x-list-item-u
					name="{{ __('info.hero.spec.web.title') }}">

						<ul>
							<!-- Frontend -->
							<x-list-item-u
							name="{{ __('info.hero.spec.web.frontend.title') }}">
								{!! __("info.hero.spec.web.frontend.desc") !!}
							</x-list-item-u>

							<!-- Backend -->
							<x-list-item-u
							name="{{ __('info.hero.spec.web.backend.title') }}">
								{!! __("info.hero.spec.web.backend.desc") !!}
							</x-list-item-u>
						</ul>
					</x-list-item-u>

					<!-- DNS -->
					<x-list-item-u
					name="{!! __('info.hero.spec.dns.title') !!}">

						{!! __("info.hero.spec.dns.desc") !!}
					</x-list-item-u>
				</ul>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Timeline -->
		<div class="grid-c-12 mr-4-lg u-text-left" id="timeline">
			<p class="tile__title font-bold text-lg">
				{{ __("info.timeline.title") }}
			</p>

			<ul class="menu">
				<!-- Make items from 2025 to 2018 -->
				@for ($i = 2025; $i >= 2018; $i--)
					<x-time-line-item year="{{ $i }}" />
				@endfor
			</ul>
		</div>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
