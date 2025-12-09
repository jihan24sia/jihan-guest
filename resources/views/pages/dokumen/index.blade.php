@extends('layouts.guest.app')
@section('title', 'Data Dokumen')

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
            <i class="bi bi-file-earmark-text-fill me-2"></i>Data Dokumen
        </h4>
        <a href="{{ route('dokumen.create') }}" class="btn btn-pink btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah Dokumen
        </a>
    </div>

    {{-- FILTER & SEARCH --}}
    <div class="mb-4">
        <form method="GET" action="{{ route('dokumen.index') }}">
            <div class="row">
                <div class="col-md-5">
                    <select name="jenis_dokumen" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Dokumen</option>
                        @foreach (['SHM', 'IMB', 'Surat Kepemilikan', 'HGB', 'PBB', 'SPPT'] as $jenis)
                            <option value="{{ $jenis }}" {{ request('jenis_dokumen') == $jenis ? 'selected' : '' }}>
                                {{ $jenis }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                               value="{{ request('search') }}" placeholder="Search">
                        <button type="submit" class="input-group-text">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                    @if (request('search'))
                        <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                           class="btn btn-outline-secondary mt-2">Clear</a>
                    @endif
                </div>
            </div>
        </form>
    </div>

    {{-- LIST DOKUMEN --}}
    <div class="row">
        @forelse ($data as $d)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 persil-card text-white"
                     style="background-color: #fc95c4; border-radius: 16px; overflow: hidden; transition: transform .3s ease;">

                    {{-- Thumbnail Dokumen --}}
                    @php
                        $thumbnail = $d->media->first()
                                     ? asset('storage/uploads/dokumen/' . $d->media->first()->file_name)
                                     : asset('images/dokumen-sample.jpg');
                    @endphp
                    <img src="{{ $thumbnail }}" class="card-img-top" alt="Dokumen"
                         style="height: 180px; object-fit: cover; filter: brightness(0.85);">

                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            <i class="bi bi-file-earmark-text-fill me-2"></i>{{ $d->jenis_dokumen }}
                        </h5>

                        <p class="card-text mb-2">
                            <i class="bi bi-upc-scan me-2"></i>Nomor: {{ $d->nomor }}
                        </p>

                        <p class="card-text mb-2">
                            <i class="bi bi-house-door-fill me-2"></i>Persil: {{ $d->persil->kode_persil ?? '-' }}
                        </p>

                        <p class="card-text mb-2">
                            <i class="bi bi-card-text me-2"></i>Keterangan: {{ $d->keterangan ?? '-' }}
                        </p>
                    </div>

                    <div class="d-flex justify-content-center gap-2 mb-3">
                        <a href="{{ route('dokumen.edit', $d->dokumen_id) }}" class="btn btn-sm btn-warning px-3">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>

                        <form action="{{ route('dokumen.destroy', $d->dokumen_id) }}" method="POST"
                              onsubmit="return confirm('Yakin hapus dokumen ini?')">
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
                <i class="bi bi-exclamation-circle me-2"></i>Belum ada data dokumen.
            </div>
        @endforelse
    </div>

    {{-- PAGINATION --}}
    <div class="mt-3">
        {{ $data->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
