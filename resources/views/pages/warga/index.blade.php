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

        <div class="row">
            @forelse ($warga as $w)
                @php
                    $foto =
                        $w->jenis_kelamin == 'L'
                            ? 'https://cdn-icons-png.flaticon.com/512/4140/4140048.png'
                            : 'https://cdn-icons-png.flaticon.com/512/4140/4140047.png';
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
    </div>

@endsection
