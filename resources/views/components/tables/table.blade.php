@props(['headers' => [], 'rows' => []])

<div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover">
        <thead class="bg-warning text-black">
            <tr>
                @foreach ($headers as $header)
                    <th>{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
