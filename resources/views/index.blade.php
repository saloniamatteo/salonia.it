@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("index.title"),
    "desc"  => __("index.desc"),
])

<body>
@include('static/header')

<!-- Welcome -->
<div class="hero" style="margin-top: 3.5em !important">
<div class="hero-body bg-black u-opacity-90 py-1 px-0">
<div class="content u-text-left">
<div class="sm:grid u-gap-2">
	<!-- Text -->
	<div class="grid-c-9 grid-r-3 ml-2">
		<!-- Hello -->
		<h2 class="text-gray-300 mb-0 mt-4" style="font-size: 2rem!important; line-height: 2rem!important">
			{{ __("index.welcome.hello") }}
		</h2>

		<h1 class="text-white my-0" style="font-size: 2.65rem!important; line-height: 3rem!important">
			Matteo Salonia.
		</h1>

		<!-- Subtitle -->
		<p class="text-white text-md mt-0" style="line-height: 1.5rem!important">
			Sysadmin &amp; full-stack web developer
		</p>

		<div class="divider text-white my-0 mr-2"></div>

		<!-- Desc -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			{{ __("index.welcome.desc") }}
		</p>

		<!-- SID -->
		<p class="font-bold lead mt-3 text-white" style="line-height: 1.7rem!important">
			{{ __("index.welcome.look") }}&nbsp;
			<a class="font-bold text-white" href="{{ Url::subUrl('services') }}">
				<u>{{ __("index.welcome.sid") }}</u>
			</a>
			?
		</p>
	</div>

	<!-- Picture -->
	<div class="grid-c-3 grid-r-3 mr-2 u-center">
		<img class="w-32 mt-2 u-round-lg" src="{{ Vite::asset('resources/img/me2.jpg') }}" alt="Matteo Salonia">
	</div>
</div>
</div>
</div>
</div>

<!-- Linux & Software -->
<x-hero id="linux-soft">
	<x-slot:title>
		{{ __("index.linux-soft.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.linux-soft.desc") }}
	</x-slot>

	<x-card>
		<!-- Arch Linux -->
		<x-tile>
			<x-icon link="https://arch.salonia.it" icon="book-open-text">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.linux-soft.arch.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.linux-soft.arch.desc") }}
				</p>

				<p class="tile__subtitle text-gray-800">
					{{ __("index.linux-soft.arch.subd") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Dotfiles -->
		<x-tile>
			<x-icon link="https://dotfiles.salonia.it" icon="folder-cog">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.linux-soft.dotfiles.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.linux-soft.dotfiles.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Kernel -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('kernel') }}" icon="server-cog">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.linux-soft.kernel.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.linux-soft.kernel.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Packages -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('packages') }}" icon="package">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.linux-soft.packages.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.linux-soft.packages.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Software -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('software') }}" icon="binary">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.linux-soft.software.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.linux-soft.software.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>
	</x-card>
</x-hero>

<x-hero id="about">
	<x-slot:title>
		{{ __("index.about.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.about.desc") }}
	</x-slot>

	<x-card>
		<!-- Services -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('services') }}" icon="server">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.about.services.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.about.services.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Curriculum vitae -->
		<x-tile>
			<x-icon link="/{{ Url::getCVLink() }}" icon="file-badge">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.about.cv.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.about.cv.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- About me -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('info') }}" icon="user-round">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.about.info.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.about.info.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Contact me -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('contact') }}" icon="send">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.about.contact.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.about.contact.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Donate -->
		<x-tile>
			<x-icon link="{{ URL::subUrl('donate') }}" icon="hand-coins">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.about.donate.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.about.donate.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>
	</x-card>
</x-hero>

<x-hero id="tools-links">
	<x-slot:title>
		{{ __("index.tools-links.title") }}
	</x-slot>

	<x-slot:desc>
		{{ __("index.tools-links.desc") }}
	</x-slot>

	<x-card>
		<!-- Portfolio -->
		<x-tile>
			<x-icon link="https://portfolio.salonia.it" icon="globe">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.tools-links.portfolio.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.tools-links.portfolio.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- SearXNG -->
		<x-tile>
			<x-icon link="https://s.salonia.it" icon="search">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.tools-links.searxng.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.tools-links.searxng.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- OpenAlias -->
		<x-tile>
			<x-icon link="https://oa.salonia.it" icon="scroll-text">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.tools-links.openalias.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.tools-links.openalias.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- GitHub -->
		<x-tile>
			<x-icon link="https://github.com/saloniamatteo" icon="github">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.tools-links.github.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.tools-links.github.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>

		<div class="divider my-2"></div>

		<!-- Source code -->
		<x-tile>
			<x-icon link="https://github.com/saloniamatteo/salonia.it" icon="github">

			<div class="tile__container">
				<p class="tile__title text-blue-700 text-md u u-LR">
					{{ __("index.tools-links.source.title") }}
				</p>

				<p class="tile__subtitle text-black">
					{{ __("index.tools-links.source.desc") }}
				</p>
			</div>
			</x-icon>
		</x-tile>
	</x-card>
</x-hero>

@include('static/footer')
</body>
</html>
