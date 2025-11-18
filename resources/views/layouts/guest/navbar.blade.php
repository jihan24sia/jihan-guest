{{-- start navbar --}}
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ route('dashboard') }}">
        <img src="{{ asset('assets/guest/images/logo.png') }}" alt="Logo">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('layouts.guest.app') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ route('dashboard') }}">
                    Home
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::routeIs('pages.about.index') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ route('pages.about.index') }}">
                    About
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('warga*') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ url('warga') }}">
                    Data Warga
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('persil*') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ url('persil') }}">
                    Data Persil
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('user*') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ url('user') }}">
                    Data User
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ Request::is('dokumen*') ? 'text-pink fw-bold' : 'text-dark' }}"
                    href="{{ url('dokumen') }}">
                  Dokumen
                </a>
            </li>
        </ul>
    </div>
</nav>
{{-- end navbar --}}
<style>
    .whatsapp-float {
        position: fixed;
        width: 60px;
        height: 60px;
        bottom: 30px;
        right: 30px;
        background-color: #25D366;
        color: #fff;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 4px 12px 0 rgba(0, 0, 0, 0.15);
        z-index: 9999;
        text-decoration: none;
        transition: all 0.3s ease-in-out;
    }

    .whatsapp-float:hover {
        background-color: #20ba5f;
        transform: scale(1.1);
        box-shadow: 0 6px 16px 0 rgba(0, 0, 0, 0.2);
        text-decoration: none;
    }

    .whatsapp-float svg {
        width: 32px;
        height: 32px;
        fill: #fff;
    }
</style>

<a href="https://wa.me/6285159941023?text=Halo%20saya%20ingin%20menanyakan%20informasi" class="whatsapp-float"
    title="Hubungi kami via WhatsApp" target="_blank" rel="noopener">
    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.95 1.312L5 2l1.005 3.71a9.868 9.868 0 00-1.5 4.931c0 5.4 4.41 9.8 9.8 9.8a9.858 9.858 0 009.8-9.8c0-5.4-4.41-9.8-9.8-9.8M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0" />
    </svg>
</a>
