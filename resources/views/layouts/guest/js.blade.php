@php
    use Illuminate\Support\Facades\File;

    $jsFiles = File::files(public_path('assets/guest/js'));
@endphp

@foreach ($jsFiles as $file)
    <script src="{{ asset('assets/guest/js/' . $file->getFilename()) }}"></script>
@endforeach

<!-- Bootstrap 5 (WAJIB paling bawah, jangan ditimpa yang lain) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

