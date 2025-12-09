@extends('layouts.guest.app')
@section('title', 'Edit Dokumen')

@section('content')
<div class="container mt-4">
    <h3>Edit Dokumen</h3>

    {{-- FLASH MESSAGE --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="POST" action="{{ route('dokumen.update', $dokumen->dokumen_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Persil --}}
        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select" required>
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}"
                        {{ old('persil_id', $dokumen->persil_id) == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Jenis Dokumen --}}
        <div class="mb-3">
            <label>Jenis Dokumen</label>
            <input type="text" name="jenis_dokumen" value="{{ old('jenis_dokumen', $dokumen->jenis_dokumen) }}" class="form-control" required>
        </div>

        {{-- Nomor Dokumen --}}
        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="nomor" value="{{ old('nomor', $dokumen->nomor) }}" class="form-control" required>
        </div>

        {{-- Keterangan --}}
        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $dokumen->keterangan) }}</textarea>
        </div>

        {{-- Media yang sudah ada --}}
        @if($dokumen->media->count() > 0)
        <div class="mb-3">
            <label>Media Saat Ini</label>
            <div class="d-flex flex-wrap gap-2 mt-2">
                @foreach($dokumen->media as $m)
                    <div class="text-center">
                        <img src="{{ asset('storage/uploads/dokumen/' . $m->file_name) }}" alt="Media" width="100" class="mb-1">
                        <form action="{{ route('media.destroy', $m->media_id) }}" method="POST" onsubmit="return confirm('Hapus media ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger w-100">Hapus</button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
        @endif

        {{-- Upload Media Baru --}}
        <div class="mb-3">
            <label>Tambah Media Baru (optional)</label>
            <input type="file" name="media_files[]" multiple class="form-control">
            <small class="text-muted">Anda bisa memilih lebih dari 1 file.</small>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
