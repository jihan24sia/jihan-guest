@extends('layouts.guest.app')
@section('title', 'Data Sengketa Persil')

@section('content')
<div class="container mt-4">

    {{-- FLASH MESSAGE --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-pink">
            <i class="bi bi-gavel me-2"></i>Data Sengketa Persil
        </h4>
        <a href="{{ route('sengketa.create') }}" class="btn btn-pink btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Sengketa
        </a>
    </div>

    <div class="row">
        @forelse($data as $s)
        <div class="col-md-4 mb-4">
            <div class="card shadow-lg border-0 text-white"
                 style="background-color: #fc95c4; border-radius: 16px; overflow: hidden; transition: transform .3s ease;">

                {{-- Thumbnail media pertama --}}
                @if($s->media->count())
                    <img src="{{ asset('storage/uploads/sengketa/' . $s->media->first()->file_name) }}"
                         class="card-img-top" alt="Media" style="height: 180px; object-fit: cover; filter: brightness(0.85);">
                @else
                    <img src="{{ asset('images/no-image.jpg') }}"
                         class="card-img-top" alt="Tidak ada media" style="height: 180px; object-fit: cover; filter: brightness(0.85);">
                @endif

                <div class="card-body">
                    <h5 class="card-title fw-bold">
                        <i class="bi bi-house-door-fill me-2"></i>Persil: {{ $s->persil->kode_persil }}
                    </h5>

                    <p class="card-text mb-2">
                        <i class="bi bi-people-fill me-2"></i>Pihak 1: {{ $s->pihak_1 }}
                    </p>
                    <p class="card-text mb-2">
                        <i class="bi bi-people me-2"></i>Pihak 2: {{ $s->pihak_2 }}
                    </p>

                    <p class="card-text mb-2">
                        <i class="bi bi-journal-text me-2"></i>Kronologi:
                        {{ Str::limit($s->kronologi, 50) }}
                    </p>

                    <p class="card-text mb-2">
                        <i class="bi bi-info-circle me-2"></i>Status: {{ $s->status }}
                    </p>

                    @if($s->penyelesaian)
                    <p class="card-text mb-2">
                        <i class="bi bi-check2-circle me-2"></i>Penyelesaian:
                        {{ Str::limit($s->penyelesaian, 50) }}
                    </p>
                    @endif
                </div>

                <div class="d-flex justify-content-center gap-2 mb-3">
                    <a href="{{ route('sengketa.edit', $s->sengketa_id) }}" class="btn btn-sm btn-warning px-3">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>

                    <form action="{{ route('sengketa.destroy', $s->sengketa_id) }}" method="POST"
                          onsubmit="return confirm('Yakin hapus sengketa ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger px-3">
                            <i class="bi bi-trash3"></i> Hapus
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @empty
            <div class="text-center text-muted mt-5">
                <i class="bi bi-exclamation-circle me-2"></i>Belum ada data sengketa.
            </div>
        @endforelse
    </div>

    <div class="mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
