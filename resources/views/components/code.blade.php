<p>
<pre>
<code
@if (!empty($lang))
    data-lang="{{ $lang }}"
@endif
>
{!! $slot !!}
</code>
</pre>
</p>
