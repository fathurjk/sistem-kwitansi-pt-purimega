    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Cetak Kwitansi</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style type="text/css">
        @media print {
            @page {
                size: 21cm 33cm;
                margin: 11pt 0px 0px 0px;
            }

            .button.wrapper * {
                display: none;
                visibility: none;
            }

            .sheet.wrapper {
                width: 100%;
                height: 100%;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

        }
    </style>

    <script>
        function printKwitansi() {
            window.print({
                mode: 'portrait'
            });
        }
    </script>

    <body>
        <div class="sheet wrapper"
            style="position: relative; display: flex; padding: 0; flex-direction: column; justify-content: center; align-items: center;">
            <div class="content wrapper"
                style="background-image: url('/img/konsumen.png'); width: 21.59cm; height: 10.8cm; padding: 0 24px 0px 24px; border-bottom: 1px solid; border-bottom-style: dashed">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0px 8px 0 0" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper output radio" style="display: flex; margin: 0 0 -2px 12px">
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12px">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin: 0 0 -1px 12px">
                        <label style="width: 8.3rem; margin: 0 0 -1px 0">Jumlah</label>
                        <label style="margin: 0 0 -1px 0">:</label>
                        <label style="margin: 0 4px -1px 6px">Rp.</label>
                        <label style="width: 10rem; margin: 0 0 -1px 0">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right; margin: 0 0 -1px 0 ">
                            <label style="width: 15rem; margin-right: 8px;">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="float: right; margin-right:8px">
                        <div class="row" style="margin-top: 4px; padding: 0 8px 0 0">
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; width: 6rem; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 8px 0px 0px;">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 4.6rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content wrapper"
                style="background-image: url('/img/kasir.png'); width: 21.59cm; height: 10.9cm; padding: 3pt 24px 0px 24px; border-bottom: 1px solid; border-bottom-style: dashed">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0px 8px 0 0" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper output radio" style="display: flex; margin: 0 0 -2px 12px">
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12px">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin: 0 0 -1px 12px">
                        <label style="width: 8.3rem; margin: 0 0 -1px 0">Jumlah</label>
                        <label style="margin: 0 0 -1px 0">:</label>
                        <label style="margin: 0 4px -1px 6px">Rp.</label>
                        <label style="width: 10rem; margin: 0 0 -1px 0">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right; margin: 0 0 -1px 0 ">
                            <label style="width: 15rem; margin-right: 8px;">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="float: right; margin-right:8px">
                        <div class="row" style="margin-top: 4px; padding: 0 8px 0 0">
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; width: 6rem; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 8px 0px 0px;">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 4.6rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content wrapper"
                style="background-image: url('/img/keuangan.png'); width: 21.59cm; height: 10.9cm; padding: 3pt 24px 0px 24px;">
                @include('templates.headerCetak')
                <div class="content">
                    <div class="output kwitansi" style="text-align: right">
                        <div class="no-kwitansi" style="margin: 0px 8px 0 0" id="no-kwitansi">
                            <label class="no" style="margin-right: 2px">No:</label>
                            <label style="width: 4.5rem">{{ $kwitansi->nomor_kwitansi }}</label>
                        </div>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem">Nama Lengkap</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->nama_lengkap }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Alamat</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->alamat }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">No.HP</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->no_hp }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Uang Sejumlah</label></label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->uang_sebanyak }}</label>
                    </div>
                    <div class="output" style="margin: 0 0 -1px 12px">
                        <label style="width: 8rem;">Pembayaran</label>
                        <label style="margin-left:">:</label>
                        <label style="margin-left: 0.2rem;">{{ $kwitansi->pembayaran }}</label>
                    </div>
                    <div class="wrapper output radio" style="display: flex; margin: 0 0 -2px 12px">
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 8rem">Lokasi</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->lokasi }}</label>
                        </div>
                        <div class="output" style="margin: 0 0 -1px 0px">
                            <label style="width: 2.5rem">Type</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 5rem">{{ $kwitansi->type }}</label>
                        </div>
                    </div>
                    <div class="wrapper ouput radio" style="display: flex; margin-left: 12px">
                        <div class="output">
                            <label style="width: 8rem">No. Kavling</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->no_kavling }}</label>
                        </div>
                        <div class="output">
                            <label style="width: 2.5rem">Luas</label>
                            <label>:</label>
                            <label style="margin-left: 0.2rem; width: 7rem">{{ $kwitansi->luas }}</label>
                        </div>
                    </div>
                    <div class="output" style="display: flex; margin: 0 0 -1px 12px">
                        <label style="width: 8.3rem; margin: 0 0 -1px 0">Jumlah</label>
                        <label style="margin: 0 0 -1px 0">:</label>
                        <label style="margin: 0 4px -1px 6px">Rp.</label>
                        <label style="width: 10rem; margin: 0 0 -1px 0">{{ $kwitansi->jumlah }}</label>
                        <div style="flex-grow: 1; text-align: right; margin: 0 0 -1px 0 ">
                            <label style="width: 15rem; margin-right: 8px;">Cirebon,
                                {{ date('j F Y', strtotime($kwitansi->created_at)) }}</label>
                        </div>
                    </div>
                    <div class="ttd-wrapper" style="float: right; margin-right:8px">
                        <div class="row" style="margin-top: 4px; padding: 0 8px 0 0">
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Pembeli
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; width: 6rem; border-left: 1px solid">
                                Kasir
                            </div>
                            <div class="col text-center"
                                style="border-top: 1px solid; border-left: 1px solid; width: 6rem; border-right: 1px solid">
                                Keuangan
                            </div>
                        </div>
                        <div class="row" style="padding: 0px 8px 0px 0px;">
                            <div class="col"
                                style="border-top: 1px solid; border-left: 1px solid; border-bottom: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col" style="border: 1px solid; height: 4.6rem;">
                            </div>
                            <div class="col"
                                style="border-bottom: 1px solid; border-right: 1px solid; border-top:1px solid; height: 4.6rem;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="button wrapper"
            style="padding: 32px; position: relative; flex-direction: row; display: flex; justify-content: center; align-items: center">
            <div
                style="width: 21.59cm; text-align: center; display: flex; justify-content: space-between; align-items: center">
                <div style="flex: 1">
                    <a style="width: 6rem" class="btn btn-primary" href="{{ route('kwitansi.detail', $kwitansi->id) }}">Kembali</a>
                </div>
                <div style="flex: 1">
                    <button type="button" style="width: 6rem; background-color: green" class="btn btn-primary"
                        onclick="printKwitansi()" media="print">Cetak</button>
                </div>
            </div>
        </div>
    </body>

    </html>
