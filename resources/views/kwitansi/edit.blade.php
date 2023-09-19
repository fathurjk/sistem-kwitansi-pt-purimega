<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Edit Kwitansi</title>
</head>
<section class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kwitansi</h1>
    </div>
    <div class="col-lg-8">
        <form method="POST" action="{{ route('kwitansi.update', $kwitansi->id) }}" class="mb-5">
            @method('put')
            @csrf
            <div class="mb-3">
                <label for="nomor_kwitansi" class="form-label">Nomor Kwitansi</label>
                <input type="text" class="form-control @error('nomor_kwitansi') is-invalid @enderror"
                    id="nomor_kwitansi" name="nomor_kwitansi" readonly
                    value="{{ old('nomor_kwitansi', $kwitansi->nomor_kwitansi) }}">
                @error('nomor_kwitansi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror"
                    id="nama_lengkap" name="nama_lengkap"
                    value="{{ old('nama_lengkap', $kwitansi->nama_lengkap) }}">
                @error('nama_lengkap')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                    id="alamat" name="alamat"
                    value="{{ old('alamat', $kwitansi->alamat) }}">
                @error('alamat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No. HP</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" value="{{ old('no_hp', $kwitansi->no_hp) }}">
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="uang_sebanyak" class="form-label">Uang Sebanyak</label>
                <input type="text" class="form-control @error('uang_sebanyak') is-invalid @enderror" id="uang_sebanyak"
                    name="uang_sebanyak" value="{{ old('uang_sebanyak', $kwitansi->uang_sebanyak) }}">
                @error('uang_sebanyak')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="pembayaran" class="form-label">Pembayaran</label>
                <input type="text" class="form-control @error('pembayaran') is-invalid @enderror" id="pembayaran"
                    name="pembayaran" value="{{ old('pembayaran', $kwitansi->pembayaran) }}">
                @error('pembayaran')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi"
                    name="lokasi" value="{{ old('lokasi', $kwitansi->lokasi) }}">
                @error('lokasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_kavling" class="form-label">No. Kavling</label>
                <input type="text" class="form-control @error('no_kavling') is-invalid @enderror" id="no_kavling"
                    name="no_kavling" value="{{ old('no_kavling', $kwitansi->no_kavling) }}">
                @error('no_kavling')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type"
                    name="type" value="{{ old('type', $kwitansi->type) }}">
                @error('type')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="luas" class="form-label">Luas</label>
                <input type="text" class="form-control @error('luas') is-invalid @enderror" id="luas"
                    name="luas" value="{{ old('luas', $kwitansi->luas) }}">
                @error('luas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" class="form-control @error('discount') is-invalid @enderror" id="discount"
                    name="discount" value="{{ old('discount', $kwitansi->discount) }}">
                @error('discount')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control @error('jumlah') is-invalid @enderror" id="jumlah"
                    name="jumlah" value="{{ old('jumlah', $kwitansi->jumlah) }}">
                @error('jumlah')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Edit</button>
        </form>
    </div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script>
    // Fungsi untuk memformat input jumlah dengan titik dan "RP"
    function formatCurrency(input) {
    // Hapus semua karakter selain angka
    var value = input.value.replace(/[^0-9]/g, '');

    // Jika value adalah string kosong, set nilai input menjadi kosong juga
    if (value === '') {
        input.value = '';
    } else {
        // Ubah nilai menjadi format uang dengan titik sebagai pemisah ribuan
        value = parseInt(value, 10).toLocaleString('id-ID');

        // Tambahkan "RP" di depan nilai yang sudah diformat
        input.value = 'Rp ' + value;
    }
}
    // Dapatkan elemen input jumlah berdasarkan ID
    var jumlahInput = document.getElementById('jumlah');

    // Tambahkan event listener untuk memanggil fungsi formatCurrency saat nilai berubah
    jumlahInput.addEventListener('input', function() {
        formatCurrency(this);
    });
</script>
</body>

</html>
