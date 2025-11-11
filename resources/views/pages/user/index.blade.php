@extends('layouts.guest.app')
@section('title', 'Data User')

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
            <i class="bi bi-people-fill me-2"></i>Data User
        </h4>
        <a href="{{ route('user.create') }}" class="btn btn-pink btn-sm">
            <i class="bi bi-plus-circle me-1"></i>Tambah User
        </a>
    </div>

    <div class="row">
        @forelse ($dataUser as $user)
            <div class="col-md-4 mb-4">
                <div class="card shadow-lg border-0 p-3 user-card text-white"
                    style="background: #fc95c4; border-radius: 20px; transition: all .3s ease;">
                    <div class="text-center">
                        <i class="bi bi-person-circle" style="font-size:80px;"></i>
                        <h5 class="fw-bold text-white mt-2">{{ $user->name }}</h5>
                        <p class="text-light mb-3">{{ $user->email }}</p>
                    </div>
                    <hr class="border-light">
                    <div class="mb-2"><i class="bi bi-person me-2 text-info"></i><strong>Nama:</strong> {{ $user->name }}</div>
                    <div class="mb-2"><i class="bi bi-envelope me-2 text-info"></i><strong>Email:</strong> {{ $user->email }}</div>
                    <div class="mb-2"><i class="bi bi-key me-2 text-info"></i><strong>Password (hash):</strong> {{ $user->password }}</div>
                    <hr class="border-light">
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-warning px-3">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Yakin hapus user ini?')">
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
            <p class="text-center text-muted">Belum ada data user.</p>
        @endforelse
    </div>
</div>
@endsection
