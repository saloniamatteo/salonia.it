@php
    $attr = !empty($lang) ? "data-lang=\"{$lang}\"" : '';
    $lang = !empty($lang) ? strtolower($lang) : '';
@endphp

<div class="w-100p ml-0 u-relative">
    <!-- Copy to clipboard -->
    <div class="u-absolute u-z-10 copyButton hover-grow"
         style="left: 1.3em; margin-top: 0.9rem"
         data-clipboard-target="pre code">
        <div class="u-z-20 text-white u-flex u-cursor-pointer">
            <!-- Icon -->
            <i data-lucide="clipboard-copy" class="w-3"></i>&nbsp;&nbsp;

            <!-- Text -->
            <span class="text-sm rhd-mono">{{ __('glob.copy') }}</span>
        </div>
    </div>

    <!-- Code -->
    <pre><code style="border-left: 0" class="w-100p p-2 pt-6 text-md shj-lang-{{ $lang }}" {!! $attr !!}>{!! $slot !!}</code></pre>
</div>
