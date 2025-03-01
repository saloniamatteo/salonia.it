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
		<div class="sm:grid u-gap-2 u-text-left">
			<div class="grid-c-4 grid-r-3">
				<img class="img-stretch mb-2 u-round-lg u-center"
				alt="Matteo Salonia"
				src="{{ Vite::asset('resources/img/me.jpg') }}">
			</div>

			<div class="grid-c-7 md:ml-1">
				<h1 class="my-0 text-black">Matteo Salonia</h1>
			</div>

			<div class="grid-c-8 md:ml-1 lg:mr-4">
				<p class="md:mt-0">
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

			<p class="md:mt-0">
				{!! __("info.certs.desc") !!}
			</p>

			<!-- AWS SAA -->
			<x-badge alt="Solutions Architect Associate Badge"
					 image="aws_saa_badge.png"
					 name="AWS Certified Solutions Architect Associate"
					 date="{{ __('info.certs.ongoing') }}"
			>
				{!! __("info.certs.saa") !!}
			</x-badge>

			<!-- AWS CCP -->
			<x-badge alt="Certified Cloud Practitioner Badge"
					 image="aws_ccp_badge.png"
					 name="AWS Certified Cloud Practitioner"
					 date="Feb 2025"
			>
				{!! __("info.certs.ccp") !!}
			</x-badge>
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
				<x-list-item-u name="{!! $skills['title'] !!}">

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
		<div class="grid-c-12 lg:mr-4 u-text-left" id="timeline">
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
