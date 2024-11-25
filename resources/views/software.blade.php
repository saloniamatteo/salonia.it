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

	<!-- Software -->
	<x-card class="m-3">
		<!-- TP-XFan -->
		<x-tile>
			<x-icon-img alt="TP-XFan"
			href="https://github.com/saloniamatteo/tp-xfan"
			src="{{ Vite::asset('resources/img/tp-xfan.png') }}">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					{{ __("software.tp-xfan.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{!! __("software.tp-xfan.desc") !!}
				</p>

				<p class="tile__subtitle text-gray-800">
					{{ __('software.tp-xfan.subd') }}
				</p>
			</div>
			</x-icon-img>
		</x-tile>

		<div class="divider"></div>

		<!-- Csnake -->
		<x-tile>
			<x-icon-img alt="Csnake"
			href="https://github.com/saloniamatteo/csnake"
			src="{{ Vite::asset('resources/img/csnake.png') }}">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					{{ __("software.csnake.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{!! __("software.csnake.desc") !!}
				</p>

				<p class="tile__subtitle text-gray-800">
					{{ __('software.csnake.subd') }}
				</p>
			</div>
			</x-icon-img>
		</x-tile>

		<div class="divider"></div>

		<!-- Quiz -->
		<x-tile>
			<x-icon-img alt="Quiz"
			href="https://github.com/saloniamatteo/quiz"
			src="{{ Vite::asset('resources/img/quiz.png') }}">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					{{ __("software.quiz.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{!! __("software.quiz.desc") !!}
				</p>

				<p class="tile__subtitle text-gray-800">
					{{ __('software.quiz.subd') }}
				</p>
			</div>
			</x-icon-img>
		</x-tile>

		<div class="divider"></div>

		<!-- Calc -->
		<x-tile>
			<x-icon-img alt="Calc"
			href="https://github.com/saloniamatteo/calc"
			src="{{ Vite::asset('resources/img/calc.png') }}">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					{{ __("software.calc.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{!! __("software.calc.desc") !!}
				</p>

				<p class="tile__subtitle text-gray-800">
					{{ __('software.calc.subd') }}
				</p>
			</div>
			</x-icon-img>
		</x-tile>
	</x-card>

	<x-home/>
</x-hero>

@include('static/footer')
</body>
</html>
