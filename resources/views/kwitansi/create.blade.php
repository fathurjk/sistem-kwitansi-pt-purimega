<head>
    <meta charset="UTF-8">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    <title>Tambah Kwitansi</title>
    
</body>
</head>

<body>
    <div class="content-wrapper">
        <section class="wrapper">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2" data-cue="zoomIn">
                        <div class="shape bg-dot orange rellax w-17 h-19" data-rellax-speed="1"
                            style="top: -1.7rem; left: -1.5rem;"></div>
                        <div class="shape rounded bg-soft-orange rellax d-md-block" data-rellax-speed="0"
                            style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
                    </div>
                    <!-- welcome text -->
                    
                    <div class="title-form mt-3 mb-1" id="title-form" style="text-align: center">
                        
                        <h1>TAMBAH KWITANSI</h1>

                    </div>

                    <form action="{{ route('kwitansi.store') }}" method="post" style="margin-bottom: 1%">
                        @csrf
                        <a class="btn btn-primary mb-3" href="/kwitansi">Kembali</a>
                        <div style="text-align: right">
                            <div class="nomor mb-5">
                                <label for="nomor_kwitansi">No :</label>
                                <input class="form-first" type="text" id="nomor_kwitansi" name="nomor_kwitansi"
                                    value="{{ $serialNumber }}" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="nama_lengkap" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col">
                                <input type="text" class="row-form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required>
                            </div>
                                <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
                            <div class="col">
                                <input class="row-form-control" id="lokasi" name="lokasi" placeholder="Masukkan Lokasi" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col">
                                <input type="text" class="row-form-control" id="alamat" name="alamat" placeholder="Masukkan Alamat" required>
                            </div>
                                <label for="no_kavling" class="col-sm-2 col-form-label">No.Kavling</label>
                            <div class="col">
                                <input class="row-form-control" id="no_kavling" name="no_kavling" placeholder="Masukkan Nomor Kavling" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_hp" class="col-sm-2 col-form-label"> No.HP </label>
                            <div class="col">
                                <input id="no_hp" class="row-form-control" type="text" id="no_hp" name="no_hp" placeholder="Masukkan Nomor HP" onkeypress="return hanyaAngka(event)" required>
                            </div>
                                <label for="type" class="col-sm-2 col-form-label">Type</label>
                            <div class="col">
                                <input class="row-form-control" id="type" name="type" placeholder="Masukkan Nama Type" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="uang_sebanyak" class="col-sm-2 col-form-label">Uang Sebanyak</label>
                            <div class="col">
                                <input class="row-form-control" id="uang_sebanyak" name="uang_sebanyak" placeholder="Masukkan Uang Sebanyak" required>
                            </div>
                                <label for="luas" class="col-sm-2 col-form-label">Luas</label>
                            <div class="col">
                                <input class="row-form-control" id="luas" name="luas" placeholder="Masukkan Luas" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="pembayaran" class="col-sm-2 col-form-label">Pembayaran</label>
                            <div class="col">
                                {{-- <div class="form-group mb-3">
                                    <select class="form-control" name="pembayaran" id="pembayaran">
                                        <option value="booking">Booking</option>
                                        <option value="dp">DP</option>
                                        <option value="cbth">CBTH</option>
                                        <option value="angsuran">Angsuran ke</option>
                                        <option value="ket">KET</option>
                                        <option value="lainlain">Lain-lain</option>
                                    </select>
                                </div> --}}
                                <input type="text" class="row-form-control" id="pembayaran" name="pembayaran"placeholder="Masukkan Pembayaran" required>
                                {{-- <div class="form-group mb-3" id="lain-lain-form" style="display: none;">
                                </div> --}}

                                {{-- <script>
                                    document.getElementById('pembayaran').addEventListener('change', function() {
                                        if (this.value === 'lainlain') {
                                            document.getElementById('lain-lain-form').style.display = 'block';
                                        } else {
                                            document.getElementById('lain-lain-form').style.display = 'none';
                                        }
                                    });

                                    // Get the input element
                                    const input = document.getElementById('pembayaran');

                                    // Add an event listener to the input element
                                    input.addEventListener('change', function() {
                                        // Get the value of the input element
                                        const value = input.value;

                                        // Set the value of the other input element
                                        document.getElementById('lainlain').value = value;
                                    });
                                </script> --}}
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                            <div class="col">
                                <input class="row-form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" required>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3">Tambah</button>

                    </form>
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

<script>
    function hanyaAngka(event) {
        var angka = (event.which) ? event.which : event.keyCode
        if (angka != 46 && angka > 31 && (angka < 48 || angka > 57))
            return false;
        else if (angka == 48)
            return true;
        return true;
    }
</script>

</body>

@extends('templates.footer')
