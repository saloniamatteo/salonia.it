<div class="grid u-gap-2 u-text-left mb-2">
    <div class="grid-c-3 sm:grid-c-2 xl:grid-c-1 grid-r-2">
        <img class="img-stretch"
        alt="{{ $alt }}"
        src="{{ Vite::asset("resources/img/{$image}") }}">
    </div>

    <div class="grid-c-9 sm:grid-c-10 xl:grid-c-11">
        <p class="my-0 text-black">
            <u><strong>
                {{ $name }}
            </strong></u>
            &thinsp;
            <span class="text-gray-600">({{ $date }})</span>
        </p>

        <p class="md:mt-0">
            {!! $slot !!}
        </p>
    </div>
</div>
