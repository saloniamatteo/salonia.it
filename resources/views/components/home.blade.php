@use('App\Helpers\Url')
<div style="margin-top: 3rem; margin-bottom: 2rem">
    <a class="u u-LR text-blue-700 font-bold" href="{{ Url::subUrl() }}">
        {!! __("glob.to-main") !!}
    </a>
</div>
