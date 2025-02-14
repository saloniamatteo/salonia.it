@use('App\Helpers\Locale')
@use('App\Helpers\Url')

<!-- Header -->
<div class="header header-animated header-fixed u-unselectable u-shadow-none blurbg" style="border-bottom: 1px solid">
<div class="header-brand">
	<a href="{{ URL::subUrl() }}">
		<img src="{{ Vite::asset('resources/img/salonia.png') }}" alt="Logo"
		style="min-width: 180px; width: 13rem; padding: .3rem">
	</a>

	<div class="nav-item nav-btn" id="header-btn">
		<span></span>
		<span></span>
		<span></span>
	</div>
</div>

<div class="header-nav" id="header-menu" role="button">
	<div class="nav-right">
		<!-- Language selector -->
		<div class="nav-item">
			{{ Locale::makeLangLinks() }}
		</div>

		<!-- Pages -->
		<div class="nav-item has-sub toggle-hover px-0">
			<!-- Dropdown -->
			<x-dropdown icon="laptop">{{ __("header.pages.title") }}</x-dropdown>

			<ul class="dropdown-menu dropdown-animated blurbg" id="pages-menu" role="menu">
				<!-- Linux & Software -->
				<x-header-span>{{ __("header.pages.linux-soft") }}</x-header-span>

				<!-- Kernel -->
				<x-icon-header link="{{ URL::subUrl('kernel') }}" icon="server-cog">
					{{ __("header.pages.kernel") }}
				</x-icon-header>

				<!-- Packages -->
				<x-icon-header link="{{ URL::subUrl('packages') }}" icon="package">
					{{ __("header.pages.packages") }}
				</x-icon-header>

				<!-- Software -->
				<x-icon-header link="{{ URL::subUrl('software') }}" icon="binary">
					{{ __("header.pages.software") }}
				</x-icon-header>

				<div class="divider my-1"></div>

				<!-- About me -->
				<x-header-span>{{ __("header.pages.about") }}</x-header-span>

				<!-- Services -->
				<x-icon-header link="{{ URL::subUrl('services') }}" icon="server">
					{{ __("header.pages.services") }}
				</x-icon-header>

				<!-- Curriculum vitae -->
				<x-icon-header link="/{{ URL::getCVLink() }}" icon="file-badge">
					{{ __("header.pages.cv") }}
				</x-icon-header>

				<!-- Info -->
				<x-icon-header link="{{ URL::subUrl('info') }}" icon="user-round">
					{{ __("header.pages.info") }}
				</x-icon-header>

				<!-- Contact -->
				<x-icon-header link="{{ URL::subUrl('contact') }}" icon="send">
					{{ __("header.pages.contact") }}
				</x-icon-header>

				<!-- Donate -->
				<x-icon-header link="{{ URL::subUrl('donate') }}" icon="hand-coins">
					{{ __("header.pages.donate") }}
				</x-icon-header>
			</ul>
		</div>

		<!-- Links -->
		<div class="nav-item has-sub toggle-hover px-0">
			<!-- Dropdown -->
			<x-dropdown icon="link">{{ __("header.links.title") }}</x-dropdown>

			<ul class="dropdown-menu dropdown-animated blurbg" id="links-menu" role="menu">
				<!-- Links -->
				<x-header-span>{{ __("header.links.title") }}</x-header-span>

				<!-- Portfolio -->
				<x-icon-header link="https://portfolio.salonia.it" icon="globe">
					{{ __("header.links.portfolio") }}
				</x-icon-header>

				<!-- SearXNG -->
				<x-icon-header link="https://s.salonia.it" icon="search">
					{{ __("header.links.searxng") }}
				</x-icon-header>

				<!-- OpenAlias -->
				<x-icon-header link="https://oa.salonia.it" icon="scroll-text">
					{{ __("header.links.oa") }}
				</x-icon-header>

				<!-- GitHub profile -->
				<x-icon-header link="https://github.com/saloniamatteo" icon="github">
					{{ __("header.links.github") }}
				</x-icon-header>

				<!-- Website source code -->
				<x-icon-header link="https://github.com/saloniamatteo/salonia.it" icon="github">
					{{ __("header.links.source") }}
				</x-icon-header>
			</ul>
		</div>
	</div>
</div>
</div>
