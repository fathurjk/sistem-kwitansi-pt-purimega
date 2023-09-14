    <head>
        <title>Kwitansi</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <body>
        <div class="sheet wrapper"
            style="position: relative; display: flex; padding-top: 48; flex-direction: column; justify-content: center; align-items: center;">
            <div class="content wrapper"
                style="width: 21.59cm; height: 13.97cm; padding: 0 12px 12px 18px; border: 1px solid grey;">
                @include('templates.header')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin-top: 0.5rem" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem" for="noKwitansi">00000328</label>
                        </div>
                    </div>
                    <div class="output" style="margin-bottom: 4px">
                        <label style="width: 8rem;">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;" for="inputName">Fathurrochman JK</label>
                    </div>
                    <div class="output" style="margin-bottom: 4px">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;" for="inputName">Jalan Dua Durian Runtugh Kesambi
                            Cirebon</label>
                    </div>
                    <div class="output" style="margin-bottom: 4px">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;" for="inputName">084872976257</label>
                    </div>
                    <div class="output" style="margin-bottom: 4px">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;" for="inputName">Empat juta rupiah</label>
                    </div>
                    <div class="output" style="margin-bottom: 4px">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;" for="inputName">Booking</label>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin: 8px 0 4px;">
                        <div class="output">
                            <label style="width: 6rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem" for="outputPembayaran">Mundu</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem" for="outputPembayaran">66</label>
                        </div>
                        <div class="output">
                            <label style="width: 4.5rem">Discount</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem" for="outputPembayaran">100%</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin: 0 0 12px;">
                        <div class="output">
                            <label style="width: 6rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem" for="outputPembayaran">A-06</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem" for="outputPembayaran">72</label>
                        </div>
                    </div>
                    <div class="output">
                        <label style="width: 6rem">Jumlah</label>
                        <label>:</label>
                        <label style="margin-left: 0.2rem">Rp.</label>
                        <label style="width: 7rem" for="outputPembayaran">2.000.000</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="button wrapper"
            style="padding: 32; position: relative; flex-direction: row; display: flex; justify-content: center; align-items: center">
            <div class="button" style="width: 21.59cm; text-align: center">
                <button style="width: 6rem; margin: 0 10rem 0 0" type="submit" class="btn btn-primary">Kembali</button>
                <button style="width: 6rem" type="submit" class="btn btn-primary">Cetak</button>
            </div>
        </div>
    </body>
