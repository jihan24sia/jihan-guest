@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Tambah Peta Persil</h3>

    <form method="POST" action="{{ route('persildata.peta.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select" required>
                <option value="">-- Pilih Persil --</option>
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}" {{ old('persil_id') == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>GeoJSON</label>
            <textarea name="geojson" class="form-control" rows="3" required>{{ old('geojson') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Panjang (m)</label>
            <input type="number" step="0.01" name="panjang_m" value="{{ old('panjang_m') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lebar (m)</label>
            <input type="number" step="0.01" name="lebar_m" value="{{ old('lebar_m') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Upload Media</label>
            <input type="file" name="media_files[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('persildata.peta.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
