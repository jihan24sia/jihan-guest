@extends('layouts.guest.app')
@section('title', 'Peta Persil')

@section('content')
    <div class="container mt-4">

        {{-- FLASH MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-pink">
                <i class="bi bi-map-fill me-2"></i>Data Peta Persil
            </h4>

            <a href="{{ route('persildata.peta.create') }}" class="btn btn-pink btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Peta
            </a>
        </div>

        <div class="row">
            @forelse ($peta as $item)
                <div class="col-md-4 mb-4">

                    <div class="card shadow-lg border-0 text-white"
                        style="background-color: #fc95c4; border-radius: 16px; overflow: hidden; transition: transform .3s ease;">
                        @php
                            $thumbnail = $item->media->first()
                                ? asset('storage/uploads/peta/' . $item->media->first()->file_name)
                                : asset('images/peta-sample.jpg');
                        @endphp



                        {{-- ID PETA --}}

                        <h5 class="card-title fw-bold">
                            <i class="bi bi-pin-map-fill me-2"></i>{{ $item->peta_id }}
                        </h5>

                        {{-- Persil --}}
                        <p class="card-text mb-2">
                            <i class="bi bi-house-fill me-2"></i>Persil:
                            {{ $item->persil->kode_persil ?? '-' }}
                        </p>

                        {{-- Panjang --}}
                        <p class="card-text mb-2">
                            <i class="bi bi-arrows-angle-expand me-2"></i>Panjang:
                            {{ $item->panjang_m }} m
                        </p>

                        {{-- Lebar --}}
                        <p class="card-text mb-2">
                            <i class="bi bi-arrows-angle-contract me-2"></i>Lebar:
                            {{ $item->lebar_m }} m
                        </p>


                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <a href="{{ route('persildata.peta.edit', $item->peta_id) }}"
                                class="btn btn-sm btn-warning px-3">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>

                            <form action="{{ route('persildata.peta.destroy', $item->peta_id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data ini?')">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger px-3">
                                    <i class="bi bi-trash3"></i> Hapus
                                </button>
                            </form>
                        </div>

                    </div>

                </div>
            @empty
                <div class="text-center text-muted mt-5">
                    <i class="bi bi-exclamation-circle me-2"></i>Belum ada data peta persil.
                </div>
            @endforelse
        </div>
        <div class="mt-3">
            {{ $peta->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
