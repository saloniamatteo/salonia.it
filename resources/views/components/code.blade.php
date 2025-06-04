@php
    $attr = !empty($lang) ? "data-lang=\"{$lang}\"" : '';
@endphp

<p><pre><code {!! $attr !!}>{!! $slot !!}</code></pre></p>
