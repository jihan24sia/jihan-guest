@extends('layouts.guest.app')
@section('content')
    <div class="container mt-4">
        <h3>Edit Data Persil</h3>

        <form method="POST" action="{{ route('persil.update', $persil->persil_id) }}">
            @csrf @method('PUT')
            <div class="mb-3">
                <label>Kode Persil</label>
                <input type="text" name="kode_persil" value="{{ old('kode_persil', $persil->kode_persil) }}"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label>Pemilik</label>
                <select name="pemilik_warga_id" class="form-select">
                    @foreach ($warga as $w)
                        <option value="{{ $w->warga_id }}"
                            {{ old('pemilik_warga_id', $persil->pemilik_warga_id) == $w->warga_id ? 'selected' : '' }}>
                            {{ $w->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3"><label>Luas (m²)</label><input type="number" name="luas_m2"
                    value="{{ old('luas_m2', $persil->luas_m2) }}" class="form-control"></div>
            <div class="mb-3"><label>Penggunaan</label><input type="text" name="penggunaan"
                    value="{{ old('penggunaan', $persil->penggunaan) }}" class="form-control"></div>
            <div class="mb-3"><label>Alamat Lahan</label><input type="text" name="alamat_lahan"
                    value="{{ old('alamat_lahan', $persil->alamat_lahan) }}" class="form-control"></div>
            <div class="mb-3"><label>RT</label><input type="text" name="rt" value="{{ old('rt', $persil->rt) }}"
                    class="form-control"></div>
            <div class="mb-3"><label>RW</label><input type="text" name="rw" value="{{ old('rw', $persil->rw) }}"
                    class="form-control"></div>

            <button class="btn btn-primary">Update</button>
            <a href="{{ route('persil.index') }}" class="btn btn-secondary">Kembali</a>
@endsection
