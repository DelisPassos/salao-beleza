<div class="min-vh-100 d-flex align-items-center justify-content-center bg-black text-white">
    <div class="w-100" style="max-width: 400px;">
        <div class="m-3"><x-application-logo public/></div>
        <div class="card bg-dark bg-opacity-75 text-white shadow-lg border border-warning rounded-3 p-4">
            @if (isset($title))
                <h2 class="h4 fw-semibold text-center text-warning mb-4">{{ $title }}</h2>
            @endif

            {{ $slot }}
        </div>
    </div>
</div>
