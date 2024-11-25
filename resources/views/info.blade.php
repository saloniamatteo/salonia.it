@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("info.title"),
    "desc"  => __("info.desc"),
])

<body>
@include('static/header')

<!-- info -->
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
				src="{{ Vite::asset('resources/img/me.jpeg') }}">
			</div>

			<div class="grid-c-8-md ml-1-md">
				<h1 class="my-0 text-black">Matteo Salonia</h1>
			</div>

			<div class="grid-c-8 ml-1-md mr-4-lg">
				<p>
					{!! __("info.hero.desc") !!}
				</p>

				<ul>
					<li>
					<strong><u>{{ __("info.hero.it.title") }}</u></strong>:
					{!! __("info.hero.it.desc") !!}
					</li>

					<li>
					<strong><u>{{ __("info.hero.english.title") }}</u></strong>:
					{!! __("info.hero.english.desc") !!}
					</li>

					<li>
					<strong><u>{{ __("info.hero.business.title") }}</u></strong>:
					{!! __("info.hero.business.desc") !!}
					</li>

					<li>
					<strong><u>{{ __("info.hero.maths.title") }}</u></strong>:
					{!! __("info.hero.maths.desc") !!}
					</li>
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
				<li class="menu-item">
					<strong>{!! __("info.timeline.2018.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2018.B2") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2018.linux") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2018.py") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2018.vbnet") }}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{!! __("info.timeline.2019.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2019.ubnt") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2019.webs") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2019.prog") }}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{!! __("info.timeline.2020.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2020.arch") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2020.appr") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2020.guide") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2020.artix") }}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{!! __("info.timeline.2021.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2021.gento") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2021.knowl") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2021.C") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2021.andr") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2021.kconf") }}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{!! __("info.timeline.2022.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2022.prog") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2022.desig") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2022.elec") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2022.works") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2022.lan") }}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{!! __("info.timeline.2023.title") !!}</strong>

					<ul class="menu">
						<li class="menu-item">
							{{ __("info.timeline.2023.perf") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2023.pwork") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2023.lan") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2023.db") }}
						</li>

						<li class="menu-item">
							{{ __("info.timeline.2023.webs") }}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2023.dipl") !!}
						</li>
					</ul>
				</li>

				<li class="menu-item">
					<strong>{{ __("info.timeline.2024.title") }}</strong>

					<ul class="menu">
						<li class="menu-item">
							{!! __("info.timeline.2024.elec") !!}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2024.eleng") !!}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2024.pract") !!}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2024.ci") !!}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2024.kconf") !!}
						</li>

						<li class="menu-item">
							{!! __("info.timeline.2024.laravel") !!}
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
