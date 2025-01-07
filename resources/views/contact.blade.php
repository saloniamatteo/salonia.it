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

	<!-- SID -->
	<x-card>
		<x-tag id="sid">Salonia Infrastrutture Digitali</x-tag>

		<!-- Instagram -->
		<x-tile class="mt-1">
			<x-icon link="https://instagram.com/saloniainfrastrutture" icon="instagram">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					@saloniainfrastrutture
				</p>

				<p class="tile__subtitle text-black">
					{{ __("contact.sid.ig") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<!-- Threads -->
		<x-tile class="mt-1">
			<x-icon link="https://threads.net/@saloniainfrastrutture" icon="at-sign">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					@saloniainfrastrutture
				</p>

				<p class="tile__subtitle text-black">
					{{ __("contact.sid.threads") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<!-- Facebook -->
		<x-tile class="mt-1">
			<x-icon link="https://www.facebook.com/profile.php?id=61566822561811" icon="facebook">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					Salonia Infrastrutture Digitali
				</p>

				<p class="tile__subtitle text-black">
					{{ __("contact.sid.fb") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<!-- Google Maps -->
		<x-tile class="mt-1">
			<x-icon link="https://g.page/r/CWbzRIvNa8T_EBM" icon="map-pin">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					Salonia Infrastrutture Digitali
				</p>

				<p class="tile__subtitle text-black">
					{{ __("contact.sid.maps") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<!-- Email -->
		<x-tile class="mt-1">
			<x-icon link="mailto:assistenza@salonia.it" icon="mail">

			<div class="tile__container">
				<p class="tile__title text-blue-700">
					assistenza@salonia.it
				</p>

				<p class="tile__subtitle text-black">
					{{ __("contact.sid.email") }}
				</p>
			</div>
			</x-icon>
		</x-tile>
	</x-card>

	<!-- Personal -->
	<x-card>
		<x-tag id="personal">{{ __("contact.me.title") }}</x-tag>

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
