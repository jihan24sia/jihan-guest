@extends('layouts.guest.app')

@section('content')
    <div class="about_section layout_padding" style="background:#fff; padding-top:80px; padding-bottom:80px;">
        <div class="container">
            <div class="row align-items-center">

                <div class="col-md-6">
                    <div class="doku" style="text-align:center;">
                        <img src="{{ asset('assets/guest/images/doku.png') }}"
                            style="max-width:100%; border-radius:12px; box-shadow:0 7px 20px rgba(0,0,0,0.12);">
                    </div>
                </div>

                <div class="col-md-6">
                    <h1 class="about_taital" style="font-size:36px; font-weight:700; color:#ff5e8e; margin-bottom:20px;">
                        Tentang Sistem Pendataan Warga & Persil
                    </h1>

                    <p class="about_text" style="color:#555; line-height:1.7; font-size:16px; margin-bottom:25px;">
                        Sistem ini dirancang untuk mengelola data warga dan data persil secara terstruktur.
                        Tujuannya membantu perangkat desa dalam proses administrasi agar lebih efektif, cepat,
                        dan mudah diakses. Dengan tampilan yang sederhana dan informatif, pengguna dapat melihat,
                        menambah, mengubah, dan menghapus data secara real-time.
                    </p>

                    <p class="about_text" style="color:#555; line-height:1.7; font-size:16px; margin-bottom:30px;">
                        Sistem ini diharapkan menjadi solusi digital modern dalam proses pengelolaan data penduduk
                        sehingga pelayanan masyarakat bisa berjalan lebih baik.
                    </p>


                </div>

            </div>
        </div>
    </div>
    
@endsection
<!-- about section end -->
