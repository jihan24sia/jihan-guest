@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Tambah Data Warga</h3>

    <form method="POST" action="{{ route('warga.store') }}">
        @csrf
        <div class="mb-3">
            <label>No KTP</label>
            <input type="text" name="no_ktp" value="{{ old('no_ktp') }}" class="form-control @error('no_ktp') is-invalid @enderror">
            @error('no_ktp')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama') }}" class="form-control @error('nama') is-invalid @enderror">
            @error('nama')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
                <option value="">-- Pilih --</option>
                <option value="L" {{ old('jenis_kelamin')=='L'?'selected':'' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin')=='P'?'selected':'' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" value="{{ old('agama') }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan') }}" class="form-control">
        </div>
         <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" value="{{ old('telp') }}" class="form-control">
        </div>
         <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" value="{{ old('email') }}" class="form-control">
        </div>
       <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{ route('warga.index') }}" class="btn btn-outline-secondary ms-2">Batal</a>
    </form>
</div>
@endsection
