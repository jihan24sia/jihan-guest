@extends('layouts.guest.app')
@section('content')
    <div class="container mt-4">
        <h3>Tambah Jenis Penggunaan</h3>

        <form method="POST" action="{{ route('penggunaan.store') }}">
            @csrf

            <div class="mb-3">
                <label>Nama Penggunaan</label>
                <input type="text" name="nama_penggunaan" value="{{ old('nama_penggunaan') }}" class="form-control">
            </div>

            <div class="mb-3">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3">{{ old('keterangan') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('penggunaan.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
        </form>
    </div>
@endsection
