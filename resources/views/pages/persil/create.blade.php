@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Tambah Data Persil</h3>

    <form method="POST" action="{{ route('persil.store') }}">
        @csrf
        <div class="mb-3">
            <label>Kode Persil</label>
            <input type="text" name="kode_persil" value="{{ old('kode_persil') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pemilik</label>
            <select name="pemilik_warga_id" class="form-select">
                <option value="">-- Pilih Warga --</option>
                @foreach($warga as $w)
                    <option value="{{ $w->warga_id }}" {{ old('pemilik_warga_id')==$w->warga_id?'selected':'' }}>{{ $w->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3"><label>Luas (m²)</label><input type="number" name="luas_m2" value="{{ old('luas_m2') }}" class="form-control"></div>
        <div class="mb-3"><label>Penggunaan</label><input type="text" name="penggunaan" value="{{ old('penggunaan') }}" class="form-control"></div>
        <div class="mb-3"><label>Alamat Lahan</label><input type="text" name="alamat_lahan" value="{{ old('alamat_lahan') }}" class="form-control"></div>
        <div class="mb-3"><label>RT</label><input type="text" name="rt" value="{{ old('rt') }}" class="form-control"></div>
        <div class="mb-3"><label>RW</label><input type="text" name="rw" value="{{ old('rw') }}" class="form-control"></div>
        <button class="btn btn-success">Simpan</button>
        <a href="{{ route('persil.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection

