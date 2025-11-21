@extends('layouts.guest.app')
@section('title', 'Data Persil')

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
                <i class="bi bi-people-fill me-2"></i>Data Persil
            </h4>
            <a href="{{ route('persil.create') }}" class="btn btn-pink btn-sm">
                <i class="bi bi-plus-circle me-1"></i>Tambah Data
            </a>
        </div>
        <div class="mb-4">
            <form method="GET" action="{{ route('persil.index') }}">
                <div class="row">
                    <div class="col-md-3">
                        <select name="rt" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua RT</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ sprintf('%02d', $i) }}"
                                    {{ request('rt') == sprintf('%02d', $i) ? 'selected' : '' }}>
                                    RT {{ sprintf('%02d', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>

                    <div class="col-md-3">
                        <select name="rw" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua RW</option>
                            @for ($i = 1; $i <= 20; $i++)
                                <option value="{{ sprintf('%02d', $i) }}"
                                    {{ request('rw') == sprintf('%02d', $i) ? 'selected' : '' }}>
                                    RW {{ sprintf('%02d', $i) }}
                                </option>
                            @endfor
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                                placeholder="Search">

                            <button type="submit" class="input-group-text">
                                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                        @if (request('search'))
                            <a href="{{ request()->fullUrlWithQuery(['search' => null]) }}"
                                class="btn btn-outline-secondary ml-3" id="clear-search"> Clear</a>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="row">
            @forelse ($persil as $p)
                <div class="col-md-4 mb-4">

                    <div class="card shadow-lg border-0 persil-card text-white"
                        style="background-color: #fc95c4; border-radius: 16px; overflow: hidden; transition: transform .3s ease;">

                        <div class="card-body">

                            {{-- KODE PERSIL --}}
                            <h5 class="card-title fw-bold">
                                <i class="bi bi-house-door-fill me-2"></i>{{ $p->kode_persil }}
                            </h5>

                            {{-- PEMILIK WARGA --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-person-fill me-2"></i>Pemilik:
                                {{ $p->pemilik_warga_id }}
                            </p>

                            {{-- LUAS --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-aspect-ratio me-2"></i>Luas: {{ $p->luas_m2 }} m²
                            </p>

                            {{-- ALAMAT --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-geo-alt-fill me-2"></i>Alamat: {{ $p->alamat_lahan }}
                            </p>

                            {{-- PENGGUNAAN --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-house-fill me-2"></i>Penggunaan: {{ $p->penggunaan }}
                            </p>

                            {{-- RT --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-geo me-2"></i>RT: {{ $p->rt }}
                            </p>

                            {{-- RW --}}
                            <p class="card-text mb-2">
                                <i class="bi bi-geo me-2"></i>RW: {{ $p->rw }}
                            </p>
                        </div>

                        <div class="d-flex justify-content-center gap-2 mb-3">
                            <a href="{{ route('persil.edit', $p->persil_id) }}" class="btn btn-sm btn-warning px-3">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('persil.destroy', $p->persil_id) }}" method="POST"
                                onsubmit="return confirm('Yakin hapus data ini?')">
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
                    <i class="bi bi-exclamation-circle me-2"></i>Belum ada data persil.
                </div>
            @endforelse
        </div>
        <div class="mt-4 d-flex justify-content-center">
            {{ $persil->links('pagination::bootstrap-5') }}
        </div>

    </div>
@endsection
