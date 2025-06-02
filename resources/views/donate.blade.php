@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("donate.title"),
    "desc"  => __("donate.desc"),
])

<body>
@include('static/header')

<!-- Packages -->
<x-hero class="mt-4" id="donate">
	<x-slot:title>
		{{ __("donate.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("donate.desc") }}
	</x-slot>

	<!-- Monero -->
	<x-card class="m-3">
		<x-tile>
			<x-icon-img alt="Monero"
			href=""
			src="{{ Vite::asset('resources/img/xmr.webp') }}">

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					Monero
				</p>

				<p class="tile__subtitle text-black">
					{{ __("donate.xmr.oa") }}
				</p>

				<p class="tile__subtitle text-black">
					<span class="font-bold text-black">salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo.salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo@salonia.it</span>
				</p>

				<div class="my-2"></div>

				<p class="tile__subtitle text-black">
					{{ __("donate.xmr.addr") }}
				</p>

				<p class="tile__subtitle text-black font-bold" style="word-break: break-all">
					43cgqumPkUAXhL4cx5bn24aZQkg7dUGQtaugoCxNEg1c2kbUY14y5jJMBwju2vqqZDeCJvSsn3SC7cDLuv5ZSeth4CV71cz
				</p>
			</div>
			</x-icon-img>
		</x-tile>

		<div class="divider"></div>

		<!-- Bitcoin -->
		<x-tile>
			<x-icon-img alt="Bitcoin"
			href=""
			src="{{ Vite::asset('resources/img/btc.webp') }}">

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					Bitcoin
				</p>

				<p class="tile__subtitle text-black">
					{{ __("donate.btc.oa") }}
				</p>

				<p class="tile__subtitle text-black">
					<span class="font-bold text-black">salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo.salonia.it</span>
					<span class="text-gray-600"> | </span>
					<span class="font-bold text-black">matteo@salonia.it</span>
				</p>

				<div class="my-2"></div>

				<p class="tile__subtitle text-black">
					{{ __("donate.btc.addr") }}
				</p>

				<p class="tile__subtitle text-black font-bold" style="word-break: break-all">
					sp1qq2wuevaqz4e0s9z3sy0lr5vqfr34e4rauf8k6kywmuhaa99xp2y6gq7fpv592ltlr59y9au4yd60qr2vt6yjjxsxvqvsjdgy3vavsum3jv5euk75
				</p>
			</div>
			</x-icon-img>
		</x-tile>

		<div class="divider"></div>

		<!-- Paypal -->
		<x-tile>
			<x-icon-img alt="Paypal"
			href=""
			src="{{ Vite::asset('resources/img/paypal.webp') }}">

			<div class="tile__container">
				<p class="tile__title font-bold text-lg">
					PayPal
				</p>

				<p class="tile__subtitle text-black">
					Username:
					&nbsp;
					<span class="font-bold text-black">saloniamatteo</span>
				</p>

				<p class="tile__subtitle text-black">
					Link:
					&nbsp;
					{!! Url::makeLink("https://paypal.me/saloniamatteo", "paypal.me/saloniamatteo") !!}
				</p>
			</div>
			</x-icon-img>
		</x-tile>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
