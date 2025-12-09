@extends('layouts.guest.app')
@section('title', 'Tambah Sengketa Persil')

@section('content')
<div class="container mt-4">
    <h3>Tambah Sengketa Persil</h3>

    <form method="POST" action="{{ route('sengketa.store') }}" enctype="multipart/form-data">
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
            <label>Pihak 1</label>
            <input type="text" name="pihak_1" value="{{ old('pihak_1') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pihak 2</label>
            <input type="text" name="pihak_2" value="{{ old('pihak_2') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kronologi</label>
            <textarea name="kronologi" class="form-control" rows="3" required>{{ old('kronologi') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="Proses" {{ old('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ old('status') == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Penyelesaian</label>
            <textarea name="penyelesaian" class="form-control" rows="3">{{ old('penyelesaian') }}</textarea>
        </div>

        <div class="mb-3">
            <label>Upload Media</label>
            <input type="file" name="media_files[]" class="form-control" multiple>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('sengketa.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
