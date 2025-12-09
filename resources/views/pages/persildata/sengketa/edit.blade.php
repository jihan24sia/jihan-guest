@extends('layouts.guest.app')
@section('title', 'Edit Sengketa Persil')

@section('content')
<div class="container mt-4">
    <h3>Edit Sengketa Persil</h3>

    <form method="POST" action="{{ route('sengketa.update', $sengketa->sengketa_id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Persil</label>
            <select name="persil_id" class="form-select" required>
                @foreach ($persil as $p)
                    <option value="{{ $p->persil_id }}" {{ $sengketa->persil_id == $p->persil_id ? 'selected' : '' }}>
                        {{ $p->kode_persil }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Pihak 1</label>
            <input type="text" name="pihak_1" value="{{ old('pihak_1', $sengketa->pihak_1) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pihak 2</label>
            <input type="text" name="pihak_2" value="{{ old('pihak_2', $sengketa->pihak_2) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Kronologi</label>
            <textarea name="kronologi" class="form-control" rows="3" required>{{ old('kronologi', $sengketa->kronologi) }}</textarea>
        </div>

        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="Proses" {{ old('status', $sengketa->status) == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Selesai" {{ old('status', $sengketa->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Penyelesaian</label>
            <textarea name="penyelesaian" class="form-control" rows="3">{{ old('penyelesaian', $sengketa->penyelesaian) }}</textarea>
        </div>

        @if($sengketa->media->count())
            <div class="mb-3">
                <label>Media Saat Ini</label>
                <div class="d-flex flex-wrap gap-2 mt-2">
                    @foreach($sengketa->media as $m)
                        <div class="text-center">
                            <img src="{{ asset('storage/uploads/sengketa/' . $m->file_name) }}" width="100" class="mb-1">
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
        <a href="{{ route('sengketa.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
