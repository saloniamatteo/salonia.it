<div class="content u-text-left lg:w-90p">
<div class="card u-border-1 border-gray-500">
<div {{ $attributes->class(['m-2' => !$attributes->has('class')]) }}>
    {{ $slot }}
</div>
</div>
</div>
