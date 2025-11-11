<!DOCTYPE html>
<html>

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Bina Desa - Guest</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- start css --}}
    @include('layouts.guest.css')
    {{-- end css --}}

    {{-- start header --}}
<body>
    <div class="header_section">
        <div class="container">
            {{-- start navbar --}}
            @include('layouts.guest.navbar')
            {{-- end navbar --}}
        </div>
        {{-- end header --}}
        {{-- Di sini halaman lain nempel --}}
        @yield('content')
        <!-- banner section start -->
        @include('layouts.guest.section')
        <!-- banner section end -->
    </div>
    <!-- header section end -->

    <!-- end footer -->
    @include('layouts.guest.footer')
    <!-- end footer -->

    <!-- start js-->
    @include('layouts.guest.js')
    {{-- end js --}}
</body>

</html>
