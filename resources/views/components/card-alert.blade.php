<div class="card u-border-2 border-yellow-400 bg-yellow-200 text-yellow-800">
<div class="m-2">
    <x-tile>
        <div class="tile__icon">
            <i data-lucide="triangle-alert" class="w-4 text-yellow-800 u-align-text-bottom"></i>
            <strong>{{ __("glob.warning") }}</strong>
        </div>
    </x-tile>

    <p class="mt-0">
        {{ $slot }}
    </p>
</div>
</div>
