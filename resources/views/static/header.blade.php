@use('App\Helpers\Links')
@use('App\Helpers\Locale')
@use('App\Helpers\Url')

<!-- Header -->
<div class="header header-animated header-fixed u-unselectable u-shadow-none blurbg" style="border-bottom: 1px solid">
<div class="header-brand">
	<a href="{{ URL::subUrl() }}">
		<img src="{{ Vite::asset('resources/img/salonia.webp') }}" alt="Logo"
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

			<ul class="dropdown-menu dropdown-animated blurbg" style="min-width: 200px"
				id="pages-menu" role="menu">
				<!-- Linux & Software -->
				<x-header-span>{{ __("header.pages.linux-soft.title") }}</x-header-span>

				@foreach (__("header.pages.linux-soft.c") as $key => $value)
					@php
						$link = Links::getPagesLink("{$key}");
						$icon = Links::getPagesIcon("{$key}");
					@endphp

					<x-icon-header link="{{ $link }}" icon="{{ $icon }}">
						{{ $value }}
					</x-icon-header>
				@endforeach

				<div class="divider my-1"></div>

				<!-- About me -->
				<x-header-span>{{ __("header.pages.about.title") }}</x-header-span>

				@foreach (__("header.pages.about.c") as $key => $value)
					@php
						$link = Links::getPagesLink("{$key}");
						$icon = Links::getPagesIcon("{$key}");
					@endphp

					<x-icon-header link="{{ $link }}" icon="{{ $icon }}">
						{{ $value }}
					</x-icon-header>
				@endforeach
			</ul>
		</div>

		<!-- Links -->
		<div class="nav-item has-sub toggle-hover px-0">
			<!-- Dropdown -->
			<x-dropdown icon="link">{{ __("header.links.title") }}</x-dropdown>

			<ul class="dropdown-menu dropdown-animated blurbg" id="links-menu" role="menu">
				<!-- Links -->
				<x-header-span>{{ __("header.links.title") }}</x-header-span>

				@foreach (__("header.links.c") as $key => $value)
					@php
						$link = Links::getLink("{$key}");
						$icon = Links::getIcon("{$key}");
					@endphp

					<x-icon-header link="{{ $link }}" icon="{{ $icon }}">
						{{ $value }}
					</x-icon-header>
				@endforeach
			</ul>
		</div>
	</div>
</div>
</div>
