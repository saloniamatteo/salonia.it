@php
    $attr = !empty($lang) ? "data-lang=\"{$lang}\"" : '';
    $lang = !empty($lang) ? strtolower($lang) : '';
@endphp

<p><pre><code class="w-100p p-2 pt-4 text-md shj-lang-{{ $lang }}" {!! $attr !!}>{!! $slot !!}</code></pre></p>
