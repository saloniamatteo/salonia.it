<div class="hero u-text-center {{ $class ?? '' }}" id="{{ $id ?? '' }}">
<div class="hero-body pb-0">
<div class="content">
	@if (!empty($img))
		<div class="u-flex u-center">
		<img alt="{{ $alt ?? '' }}" loading="lazy" class="w-8"
			 src="{{ Vite::asset('resources/img/' . $img) }}">

		<div class="mr-2"></div>
	@endif

	<h2 class="headline-4">
		<a class="text-black" href="#{{ $id ?? '' }}">
			{{ $title }}
		</a>
	</h2>

	@if (!empty($img))
		</div>
	@endif

	<p class="lead">
        {{ $desc }}
	</p>

    {{ $slot }}
</div>
</div>
</div>
