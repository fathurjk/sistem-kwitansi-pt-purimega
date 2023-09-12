@include('templates.header')

<body>
    <div class="content-wrapper">
        <section class="wrapper bg-light">
            <div class="container pt-8 pt-md-14">
                <div class="row gx-lg-0 gx-xl-8 gy-10 gy-md-13 gy-lg-0 mb-7 mb-md-10 mb-lg-16 align-items-center">
                    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-1 position-relative order-lg-2" data-cue="zoomIn">
                        <div class="shape bg-dot orange rellax w-17 h-19" data-rellax-speed="1"
                            style="top: -1.7rem; left: -1.5rem;"></div>
                        <div class="shape rounded bg-soft-orange rellax d-md-block" data-rellax-speed="0"
                            style="bottom: -1.8rem; right: -0.8rem; width: 85%; height: 90%;"></div>
                    </div>
        <!-- welcome text -->
        <form class="mb-3">
            <div style="margin-bottom: 1%">
            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="inputName">
            </div>
            </div>
            <div style="margin-bottom: 1%">
                <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                    <input type="alamat" class="form-control" id="inputalamat">
                </div>
                </div>
                <div style="margin-bottom: 1%">
                    <label for="inputNoHP" class="col-sm-2 col-form-label">No. HP</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" id="inputNoHP">
                    </div>
                    </div>
                    <div style="margin-bottom: 1%">
                        <label for="inputJumlah" class="col-sm-2 col-form-label">Uang Sebanyak</label>
                        <div class="col-sm-10">
                            <input type="string" class="form-control" id="inputJumlah">
                        </div>
                        </div>
            <fieldset style="margin-bottom: 1%">
            <legend>Radios</legend>
            <div class="col-sm-10">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                <label class="form-check-label" for="gridRadios1">
                    Radio Pertama
                </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2" checked>
                    <label class="form-check-label" for="gridRadios1">
                        Radio Kedua
                    </label>
                    </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
                <label class="form-check-label" for="gridRadios2">
                    Radio Ketiga
                </label>
                </div>
                <div class="form-check disabled">
                <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4" disabled>
                <label class="form-check-label" for="gridRadios3">
                    Third disabled radio
                </label>
                </div>
            </div>
            </fieldset>
            <div style="margin-bottom: 1%">
                <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" id="inputjumlah">
                </div>
                </div>
            <button type="submit" class="btn btn-primary">Cetak</button>
        </form>
</body>
@extends('templates.footer')