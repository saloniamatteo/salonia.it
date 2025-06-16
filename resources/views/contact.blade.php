@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("contact.title"),
    "desc"  => __("contact.desc"),
])

<body>
@include('static/header')

<!-- Contact -->
<x-hero class="mt-4" id="contact">
	<x-slot:title>
		{{ __("contact.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("contact.desc") }}
	</x-slot>

	<x-card>
		<!-- Email -->
		<x-tile class="mt-1">
			<x-icon link="https://linkedin.com/in/saloniamatteo/" icon="linkedin">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					@saloniamatteo
				</p>

				<p class="tile__subtitle text-black">
					LinkedIn
				</p>
			</div>
			</x-icon>
		</x-tile>

		<!-- Protonmail -->
		<x-tile class="mt-1">
			<x-icon link="mailto:saloniamatteo@pm.me" icon="mail"/>

			<div class="tile__container">
				<a href="mailto:saloniamatteo@pm.me">
				<p class="tile__title text-blue-700">
					<strong>saloniamatteo@pm.me</strong>
				</p>
				</a>

				<p class="tile__subtitle text-black">
					{{ __("contact.me.pm") }}
					&mdash;&nbsp;
					{!! Url::makeLink("/matteo-pm.asc", __("contact.me.gpg")) !!}
				</p>
			</div>
		</x-tile>

		<!-- Personal server -->
		<x-tile class="mt-1">
			<x-icon link="mailto:matteo@salonia.it" icon="mail"/>

			<div class="tile__container">
				<a href="mailto:matteo@salonia.it">
				<p class="tile__title text-blue-700">
					<strong>matteo@salonia.it</strong>
				</p>
				</a>

				<p class="tile__subtitle text-black">
					{{ __("contact.me.pserv") }}
					&mdash;&nbsp;
					{!! Url::makeLink("/matteo.asc", __("contact.me.gpg")) !!}
				</p>
			</div>
		</x-tile>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
