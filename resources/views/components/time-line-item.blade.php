<li class="menu-item">
    <!-- Year -->
    <x-tag-md id="t-{{ $year }}">
        {{ $year }}
    </x-tag-md>

    <!-- Year "title" -->
    &thinsp;
    <em>{!! __("info.timeline.$year.title") !!}</em>

    <!-- Items -->
    <ul class="menu">
        @foreach (__("info.timeline.$year.c") as $str)
            <li class="menu-item">
                {!! $str !!}
            </li>
        @endforeach
    </ul>
</li>
