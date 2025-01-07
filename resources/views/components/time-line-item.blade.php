<li class="menu-item">
    <x-tag-md id="t-{{ $year }}">
        {!! __("info.timeline.$year.title") !!}
    </x-tag-md>

    <ul class="menu">
        @foreach (__("info.timeline.$year.c") as $str)
            <li class="menu-item">
                {!! $str !!}
            </li>
        @endforeach
    </ul>
</li>
