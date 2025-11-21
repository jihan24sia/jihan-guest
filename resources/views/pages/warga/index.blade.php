@extends('layouts.guest.app')
@section('title', 'Data Warga')

@section('content')
    <div class="container py-4">

        {{-- FLASH MESSAGE --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-pink">
                <i class="bi bi-people-fill me-5"></i>Data Warga
            </h4>
            <a href="{{ route('warga.create') }}" class="btn btn-pink btn-sm">
                <i class="bi bi-plus-circle me-5"></i>Tambah Warga
            </a>
        </div>

        <div class="mb-4">
            <form method="GET" action="{{ route('warga.index') }}">
                <div class="row">
                    <div class="col-md-5">
                        <select name="jenis_kelamin" class="form-select" onchange="this.form.submit()">
                            <option value="">Semua Jenis Kelamin</option>
                            <option value="Laki-laki" {{ request('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>
                                Laki-laki
                            </option>
                            <option value="Perempuan" {{ request('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" id="exampleInputIconRight"
                                value="{{ request('search') }}" placeholder="Search" aria-label="Search">
                            <button type="submit" class="input-group-text" id="basic-addon2">
                                <svg class="icon icon-xxs" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd"></path>
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
            @forelse ($warga as $w)
                @php
                    if ($w->jenis_kelamin === 'Laki-laki') {
                        $foto = 'https://cdn-icons-png.flaticon.com/512/4140/4140048.png'; // laki
                    } elseif ($w->jenis_kelamin === 'Perempuan') {
                        $foto = 'https://cdn-icons-png.flaticon.com/512/4140/4140037.png'; // perempuan
                    } else {
                        $foto = 'https://cdn-icons-png.flaticon.com/512/149/149071.png'; // default icon
                    }
                @endphp


                <div class="col-md-4 mb-4">
                    <div class="card shadow-lg border-0 p-3 warga-card text-white"
                        style="background: #fc95c4; border-radius: 20px; transition: all .3s ease;">
                        <div class="text-center">
                            <img src="{{ $foto }}" alt="Foto {{ $w->nama }}"
                                class="rounded-circle shadow-sm mb-3 border border-light"
                                style="width:120px;height:120px;object-fit:cover;">
                            <h5 class="fw-bold text-white">{{ $w->nama }}</h5>
                            <p class="text-light mb-3">{{ $w->pekerjaan }}</p>
                        </div>
                        <hr class="border-light">
                        <div class="mb-2"><i class="bi bi-person-badge me-2 text-info"></i><strong>No KTP:</strong>
                            {{ $w->no_ktp }}</div>
                        <div class="mb-2"><i class="bi bi-person me-2 text-info"></i><strong>Nama:</strong>
                            {{ $w->nama }}</div>
                        <div class="mb-2"><i class="bi bi-gender-ambiguous me-2 text-info"></i><strong>Jenis
                                Kelamin:</strong> {{ $w->jenis_kelamin }}</div>
                        <div class="mb-2"><i class="bi bi-heart me-2 text-info"></i><strong>Agama:</strong>
                            {{ $w->agama }}</div>
                        <div class="mb-2"><i class="bi bi-briefcase me-2 text-info"></i><strong>Pekerjaan:</strong>
                            {{ $w->pekerjaan }}</div>
                        <div class="mb-2"><i class="bi bi-telephone me-2 text-info"></i><strong>Telepon:</strong>
                            {{ $w->telp }}</div>
                        <div class="mb-2"><i class="bi bi-envelope me-2 text-info"></i><strong>Email:</strong>
                            {{ $w->email }}</div>
                        <hr class="border-light">
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-sm btn-warning px-3">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                            <form action="{{ route('warga.destroy', $w->warga_id) }}" method="POST"
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
                <p class="text-center text-muted">Belum ada data warga.</p>
            @endforelse
        </div>
        <div class="mt-3">
            {{ $warga->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
