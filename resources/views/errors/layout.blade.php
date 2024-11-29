@use('App\Helpers\Url')
@include('static/head', [
    "lang"  => app()->getLocale(),
    "title" => __("errors.title"),
    "noseo" => 1,
])

<body>
@include('static/header')

<!-- Error card -->
<x-card-error>
    <x-tag-error>
        {{ $title ?? __("errors.title") }}
    </x-tag-error>

    @php
        $admin = __("errors.admin");
        $adminlink = Url::subUrl("contact");
    @endphp

    <p class="lead">
        {{ $msg ?? __("errors.desc") }}
        <br>
        {!! __("errors.persist", [
            "admin" => Url::makeLink($adminlink, $admin),
        ]) !!}
    </p>

    <div class="divider mx-10"></div>

    @include('static/home')
</x-card-error>

@include('static/footer')
</body>
</html>
