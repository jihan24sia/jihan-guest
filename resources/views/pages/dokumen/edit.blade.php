@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Edit Dokumen</h3>

    <form method="POST" action="{{ route('dokumen.update', $dokumen->dokumen_id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select">
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}"
                        {{ old('persil_id', $dokumen->persil_id) == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Jenis Dokumen</label>
            <input type="text" name="jenis_dokumen"
                value="{{ old('jenis_dokumen', $dokumen->jenis_dokumen) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Nomor Dokumen</label>
            <input type="text" name="nomor"
                value="{{ old('nomor', $dokumen->nomor) }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan', $dokumen->keterangan) }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('dokumen.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
