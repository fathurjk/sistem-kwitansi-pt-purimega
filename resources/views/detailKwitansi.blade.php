    <head>
        <title>Kwitansi</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <body>
        @include('templates.header')
        <div class="container">
            <div style="text-align: right">
                <div class="no-kwitansi" style="margin-top: 18px" id="no-kwitansi">
                    <label class="no" style="margin-right: 4px">No:</label>
                    <label for="noKwitansi">00000328</label>
                </div>
            </div>
            <div class="output-nama" style="margin-bottom: 4px">
                <label>Nama Lengkap</label>
                <label style="margin-left: 1rem">:</label>
                <label style="margin-left: 0.5rem;" for="inputName">Fathurrochman JK</label>
            </div>
            <div class="output-alamat" style="margin-bottom: 4px">
                <label>Alamat</label>
                <label style="margin-left: 4.2rem">:</label>
                <label style="margin-left: 0.5rem;" for="outputAlamat">Jalan Dua Durian Runtugh Kesambi Cirebon</label>
            </div>
            <div class="output-hp" style="margin-bottom: 4px">
                <label>No. HP</label>
                <label style="margin-left: 4.2rem">:</label>
                <label style="margin-left: 0.5rem;" for="outputHP">084872976257</label>
            </div>
            <div class="output-sejumlah" style="margin-bottom: 4px">
                <label>Uang Sejumlah</label>
                <label style="margin-left: 0.95rem">:</label>
                <label style="margin-left: 0.5rem;" for="outputSejumlah">Empat juta rupiah</label>
            </div>
            <div class="output-pembayaran" style="margin-bottom: 12px">
                <label>Pembayaran</label>
                <label style="margin-left: 2.2rem">:</label>
                <label style="margin-left: 0.5rem;" for="outputPembayaran">Booking</label>
            </div>
            <div class="wrapper-output-radio" style="display: flex; text-align: ; margin-bottom: 8px;">
                <div style="width: 13rem; display: flex">
                    <label>Lokasi</label>
                    <label style="margin-left: 2.48rem">:</label>
                    <div style="width: 7.4rem">
                    <label style="margin-left: 0.5rem" for="outputPembayaran">Kota Cirebon</label>
                    </div>
                </div>
                <div style="width: 6rem; display: flex">
                    <label>Type</label>
                    <label style="margin-left: 0.2rem">:</label>
                    <div style="width: 3rem">
                    <label style="margin-left: 0.5rem;" for="outputPembayaran">66</label>
                    </div>
                </div>
                <div style="width: 10rem; display: flex">
                    <label>Discount</label>
                    <label style="margin-left: 0.2rem">:</label>
                    <div style="width: 4rem">
                    <label style="margin-left: 0.5rem;" for="outputPembayaran">100%</label>
                    </div>
                </div>
            </div>
            <div class="wrapper-output-radio" style="display: flex; text-align: left; margin-bottom: 12px;">
                <div style="width: 13rem; display: flex">
                    <label>No.Kavling</label>
                    <label style="margin-left: 0.5rem">:</label>
                    <div style="width: 4rem">
                    <label style="margin-left: 0.5rem" for="outputPembayaran">A-06</label>
                    </div>
                </div>
                <div style="width: 6rem; display: flex">
                    <label>Luas</label>
                    <label style="margin-left: 0.2rem">:</label>
                    <div style="width: 3rem">
                    <label style="margin-left: 0.5rem;" for="outputPembayaran">72</label>
                    </div>
                </div>
            </div>
            <div class="">
                <label style="margin-right: 2.07rem">Jumlah</label>
                <label>:</label>
                <label style="margin-left: 0.2rem">Rp.</label>
                <label for="outputJumlah">2.000.000</label>
            </div>
        </div>
    </body>
    
    <style>

    </style>
