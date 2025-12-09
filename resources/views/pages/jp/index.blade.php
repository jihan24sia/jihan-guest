@extends('layouts.guest.app')
@section('title', 'Jenis Penggunaan')

@section('content')
<div class="container py-4">

    {{-- FLASH MESSAGE --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-pink">
            <i class="bi bi-list-check me-2"></i>Jenis Penggunaan
        </h4>
        <a href="{{ route('penggunaan.create') }}" class="btn btn-pink btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Jenis
        </a>
    </div>

    <div class="row">
        @forelse ($jenis as $jp)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 p-3 user-card text-white"
                    style="background: #fc95c4; border-radius: 20px; transition: all .3s ease;">

                    <div class="text-center">
                        <i class="bi bi-tags-fill" style="font-size:70px;"></i>
                        <h5 class="fw-bold text-white mt-3">{{ $jp->nama_penggunaan }}</h5>
                    </div>

                    <hr class="border-light">

                    <div class="mb-2">
                        <i class="bi bi-card-text me-2 text-info"></i>
                        <strong>Nama Penggunaan:</strong> {{ $jp->nama_penggunaan }}
                    </div>

                    <div class="mb-2">
                        <i class="bi bi-file-earmark-text me-2 text-info"></i>
                        <strong>Keterangan:</strong>
                        <br>{{ $jp->keterangan ?? '-' }}
                    </div>

                    <hr class="border-light">

                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('penggunaan.edit', $jp->jenis_id) }}"
                           class="btn btn-sm btn-warning px-3">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>

                        <form action="{{ route('penggunaan.destroy', $jp->jenis_id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus jenis ini?')">
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
            <p class="text-center text-muted">Belum ada data jenis penggunaan.</p>
        @endforelse
    </div>

</div>
@endsection
