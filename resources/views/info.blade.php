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
				<img class="img-stretch mb-2 u-round-lg u-center"
				alt="Matteo Salonia"
				src="{{ Vite::asset('resources/img/me.jpg') }}">
			</div>

			<div class="grid-c-8-md ml-1-md">
				<h1 class="my-0 text-black">Matteo Salonia</h1>
			</div>

			<div class="grid-c-8 ml-1-md mr-4-lg">
				<p class="mt-0-md">
					{!! __("info.hero.desc") !!}
				</p>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Certs -->
		<div>
			<p class="tile__title font-bold text-lg mb-0">
				{{ __("info.certs.title") }}
			</p>

			<p class="mt-0-md">
				{!! __("info.certs.desc") !!}
			</p>

			<!-- AWS CCP -->
			<div class="grid u-gap-2 u-text-left">
				<div class="grid-c-3 grid-c-2-sm grid-r-2">
					<img class="img-stretch"
					alt="Certified Cloud Practitioner Badge"
					src="{{ Vite::asset('resources/img/ccp_badge.jpg') }}">
				</div>

				<div class="grid-c-9 grid-c-10-sm">
					<p class="my-0 text-black">
						<u><strong>
							AWS Certified Cloud Practitioner
						</strong></u>
						&thinsp;
						<span class="text-gray-600">(Feb 2025)</span>
					</p>

					<p class="mt-0-md">
						{!! __("info.certs.ccp") !!}
					</p>
				</div>
			</div>
		</div>

		<div class="divider"></div>

		<!-- Skills -->
		<div>
			<p class="tile__title font-bold text-lg mb-0">
				{{ __("info.skills.title") }}
			</p>

			<p class="mt-0">
				{!! __("info.skills.desc") !!}
			</p>

			<!-- Programmatically print skills -->
			<ul>
			@foreach (__("info.skills.c") as $skills)
				<x-list-item-u name="{{ $skills['title'] }}">

					<ul class="mt-0">
						@foreach ($skills['c'] as $skill)
							<li>{!! $skill !!}</li>
						@endforeach
					</ul>
				</x-list-item-u>
			@endforeach
			</ul>
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
