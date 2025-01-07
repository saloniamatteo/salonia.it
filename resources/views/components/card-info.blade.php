<div class="card u-border-2 border-blue-400 bg-blue-200 text-blue-700">
<div class="m-2">
    <x-tile>
        <div class="tile__icon">
            <i data-lucide="info" class="w-4 text-blue-700 u-align-text-bottom"></i>
            <strong>{{ __("glob.info") }}</strong>
        </div>
    </x-tile>

    <p class="mt-0">
        {{ $slot }}
    </p>
</div>
</div>
