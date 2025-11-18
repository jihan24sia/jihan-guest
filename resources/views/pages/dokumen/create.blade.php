@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Tambah Data Dokumen</h3>

    <form method="POST" action="{{ route('dokumen.store') }}">
        @csrf

        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select" required>
                <option value="">-- Pilih Persil --</option>
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}"
                        {{ old('persil_id') == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Dokumen</label>
            <input type="text" name="jenis_dokumen" value="{{ old('jenis_dokumen') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="nomor" value="{{ old('nomor') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
        </div>

        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
