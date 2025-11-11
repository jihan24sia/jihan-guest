@extends('layouts.guest.app')
@section('content')
<div class="container mt-4">
    <h3>Edit Data Warga</h3>

    <form method="POST" action="{{ route('warga.update', $warga->warga_id) }}">
        @csrf @method('PUT')
        <div class="mb-3">
            <label>No KTP</label>
            <input type="text" name="no_ktp" value="{{ old('no_ktp', $warga->no_ktp) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ old('nama', $warga->nama) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-select">
                <option value="L" {{ old('jenis_kelamin',$warga->jenis_kelamin)=='L'?'selected':'' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin',$warga->jenis_kelamin)=='P'?'selected':'' }}>Perempuan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" value="{{ old('agama', $warga->agama) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" value="{{ old('pekerjaan', $warga->pekerjaan) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" value="{{ old('telp', $warga->telp) }}" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="text" name="email" value="{{ old('email', $warga->email) }}" class="form-control">
        </div>
        <button class="btn btn-primary">Update</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
