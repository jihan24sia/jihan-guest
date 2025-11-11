@extends('layouts.guest.app')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        <svg style="width: 24px; height: 24px; fill: white; vertical-align: middle; margin-right: 8px;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.95 1.312L5 2l1.005 3.71a9.868 9.868 0 00-1.5 4.931c0 5.4 4.41 9.8 9.8 9.8a9.858 9.858 0 009.8-9.8c0-5.4-4.41-9.8-9.8-9.8M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0"/>
                        </svg>
                        Chat via WhatsApp
                    </h5>
                </div>
                <div class="card-body">
                    <form id="waForm" onsubmit="sendWhatsApp(event)">
                        <div class="mb-3">
                            <label for="waNumber" class="form-label">Nomor WhatsApp</label>
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="waNumber"
                                    placeholder="85159941023(tanpa 0 di awal)"
                                    pattern="[0-9]{9,}"
                                    required
                                >
                            </div>
                            <small class="text-muted">Contoh: 812345678 (9-15 digit)</small>
                        </div>

                        <div class="mb-3">
                            <label for="waMessage" class="form-label">Pesan</label>
                            <textarea
                                class="form-control"
                                id="waMessage"
                                rows="5"
                                placeholder="Ketik pesan Anda di sini..."
                                required
                            ></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success btn-lg">
                                <svg style="width: 20px; height: 20px; fill: white; vertical-align: middle; margin-right: 8px;" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.67-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.076 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421-7.403h-.004a9.87 9.87 0 00-4.95 1.312L5 2l1.005 3.71a9.868 9.868 0 00-1.5 4.931c0 5.4 4.41 9.8 9.8 9.8a9.858 9.858 0 009.8-9.8c0-5.4-4.41-9.8-9.8-9.8M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0"/>
                                </svg>
                                Kirim via WhatsApp
                            </button>
                        </div>
                    </form>

                    <hr>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary w-100">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function sendWhatsApp(event) {
    event.preventDefault();

    const phoneNumber = document.getElementById('waNumber').value.trim();
    const message = document.getElementById('waMessage').value.trim();

    // Validate phone number (9-15 digits)
    if (!/^[0-9]{9,15}$/.test(phoneNumber)) {
        alert('Nomor WhatsApp tidak valid. Gunakan 9-15 digit.');
        return false;
    }

    if (message === '') {
        alert('Pesan tidak boleh kosong.');
        return false;
    }

    // Format: 62 + nomor (tanpa 0 di awal)
    const formattedNumber = '62' + phoneNumber;
    const encodedMessage = encodeURIComponent(message);

    // WhatsApp Web URL
    const whatsappUrl = `https://wa.me/${formattedNumber}?text=${encodedMessage}`;

    // Open in new tab
    window.open(whatsappUrl, '_blank');

    return false;
}
</script>
@endsection
