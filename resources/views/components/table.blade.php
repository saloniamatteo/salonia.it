<div class="table-container">
<table class="table bordered striped small" style="min-width: 550px">
    <thead class="bg-blue-700 text-white">
        <tr>
            {!! $head !!}
        </tr>
    </thead>

    @if (empty($nofoot))
        <tfoot class="bg-blue-700 text-white">
            <tr>
                {!! $head !!}
            </tr>
        </tfoot>
    @endif

    <tbody>
        {!! $body !!}
    </tbody>
</table>
</div>
