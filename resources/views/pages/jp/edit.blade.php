@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Edit Jenis Penggunaan</h3>

    <form method="POST" action="{{ route('penggunaan.update', $jenis->jenis_id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama Penggunaan</label>
            <input type="text" name="nama_penggunaan" value="{{ $jenis->nama_penggunaan }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Keterangan</label>
            <textarea name="keterangan" class="form-control" rows="3">{{ $jenis->keterangan }}</textarea>
        </div>

        <button class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('penggunaan.index') }}" class="btn btn-outline-secondary">Batal</a>
    </form>
</div>
@endsection
