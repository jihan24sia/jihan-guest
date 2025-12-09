@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Edit Peta Persil</h3>

    <form method="POST" action="{{ route('persildata.peta.update', $peta->peta_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select" required>
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}" {{ $peta->persil_id == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>GeoJSON</label>
            <textarea name="geojson" class="form-control" rows="3" required>{{ old('geojson', $peta->geojson) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Panjang (m)</label>
            <input type="number" step="0.01" name="panjang_m" value="{{ old('panjang_m', $peta->panjang_m) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Lebar (m)</label>
            <input type="number" step="0.01" name="lebar_m" value="{{ old('lebar_m', $peta->lebar_m) }}" class="form-control" required>
        </div>

        @if($peta->media->count())
            <div class="mb-3">
                <label>Media Saat Ini</label>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($peta->media as $m)
                        <div class="text-center">
                            <img src="{{ asset('storage/uploads/peta_persil/' . $m->file_name) }}" alt="Media" width="100" class="mb-1">
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

        <div class="mb-3">
            <label>Upload Media Baru</label>
            <input type="file" name="media_files[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('persildata.peta.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
