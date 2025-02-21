<div class="grid u-gap-2 u-text-left mb-2">
    <div class="grid-c-3 grid-c-2-sm grid-c-1-xl grid-r-2">
        <img class="img-stretch"
        alt="{{ $alt }}"
        src="{{ Vite::asset("resources/img/{$image}") }}">
    </div>

    <div class="grid-c-9 grid-c-10-sm">
        <p class="my-0 text-black">
            <u><strong>
                {{ $name }}
            </strong></u>
            &thinsp;
            <span class="text-gray-600">({{ $date }})</span>
        </p>

        <p class="mt-0-md">
            {!! $slot !!}
        </p>
    </div>
</div>
