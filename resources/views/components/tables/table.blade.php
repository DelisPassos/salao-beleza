@props(['headers' => []])

<div class="table-responsive">
    <table class="table table-dark table-bordered table-striped table-hover align-middle mb-0">
        <thead class="bg-warning text-black">
            <tr>
                @foreach ($headers as $header)
                    <th scope="col">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            {{ $slot }}
        </tbody>
    </table>
</div>
