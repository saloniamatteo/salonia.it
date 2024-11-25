@use('App\Helpers\Locale')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("dns.title"),
    "desc"  => __("dns.desc"),
])

<body>
@include('static/header')

<!-- DNS -->
<x-hero class="mt-4" id="dns">
	<x-slot:title>
		{{ __("dns.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("dns.desc") }}
	</x-slot>

	<!-- Navigation -->
	<p>
		{{ __("glob.go-to") }}:<br>

		<x-tag-xs href="intro">
			{{ __("dns.intro.title") }}
		</x-tag-xs>

		&nbsp;

		<x-tag-xs href="params">
			{{ __("dns.params.title") }}
		</x-tag-xs>
	</p>

	<!-- Intro -->
	<x-card class="m-3">
		<x-tag id="intro">
			{{ __("dns.intro.title") }}
		</x-tag>

		<p>
			@php
				$query = __("dns.intro.query");
				$querylink = __("dns.links.query");

				$http = __("dns.intro.http");
				$httplink = __("dns.links.http");

				$mitm = __("dns.intro.mitm");
				$mitmlink = __("dns.links.mitm");
			@endphp

			{!! __("dns.intro.desc", [
				"doh" => Locale::makeBold(__("dns.intro.doh")),
				"query" => Locale::makeLink($querylink, $query),
				"http" => Locale::makeLink($httplink, $http),
				"mitm" => Locale::makeLink($mitmlink, $mitm),
			]) !!}
		</p>

		<p>
			{!! __("dns.intro.desc2") !!}
		</p>

		<p>
			@php
				$rproxy = __("dns.intro.rproxy");
				$rproxylink = __("dns.links.rproxy");
			@endphp

			{!! __("dns.intro.desc3", [
				"rproxy" => Locale::makeLink($rproxylink, $rproxy),
			]) !!}
		</p>
	</x-card>

	<!-- Parameters -->
	<x-card class="m-3">
		<x-tag id="params">
			{{ __("dns.params.title") }}
		</x-tag>

		<p>
			{!! __("dns.params.desc") !!}
		</p>

		<p>
			Endpoint: &nbsp;<code>https://dns.salonia.it/dns-query</code>
		</p>

		<div class="divider"></div>

		<!-- Firefox -->
		<p>
			{!! __("dns.params.ff.desc") !!}:

			<ol>
				<li><strong>{{ __("dns.params.ff.s1") }}</strong></li>
				<li><strong>{{ __("dns.params.ff.s2") }}</strong></li>
				<li>{!! __("dns.params.ff.s3") !!}</li>
				<li>
					{!! __("dns.params.ff.s4") !!}&nbsp;&nbsp;
					<code>https://dns.salonia.it/dns-query</code>
				</li>
			</ol>
		</p>

		<div class="divider"></div>

		<!-- Android -->
		<p>
			@php
				$rethink = __("dns.links.rethink");
			@endphp

			{!! __("dns.params.android.desc", [
				"rethink" => Locale::makeLink($rethink, "RethinkDNS"),
			]) !!}:

			<ol>
				<li><strong>{{ __("dns.params.android.s1") }}</strong></li>
				<li><strong>{{ __("dns.params.android.s2") }}</strong></li>
				<li>{!! __("dns.params.android.s3", [
					"icon" => "<i class='u-inline u-align-text-top' data-lucide='circle-plus' style='height: 1.25rem'></i>",
				]) !!}</li>
				<li>
					{!! __("dns.params.android.s4") !!}&nbsp;&nbsp;
					<code>https://dns.salonia.it/dns-query</code>
				</li>
				<li>{!! __("dns.params.android.s5") !!}</li>
			</ol>
		</p>
	</x-card>

	@include('static/home')
</x-hero>

@include('static/footer')
</body>
</html>
