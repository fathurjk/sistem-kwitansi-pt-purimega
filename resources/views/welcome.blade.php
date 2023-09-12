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
    <div class="row mb-3">
    <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>
    <div class="row mb-3">
        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputalamat">
        </div>
        </div>
        <div class="row mb-3">
            <label for="inputNoHP" class="col-sm-2 col-form-label">No. HP</label>
            <div class="col-sm-10">
                <input type="" class="form-control" id="inputNoHP">
            </div>
            </div>
            <div class="row mb-3">
                <label for="inputJumlah" class="col-sm-2 col-form-label">Uang Sebanyak</label>
                <div class="col-sm-10">
                    <input type="string" class="form-control" id="inputJumlah">
                </div>
                </div>
    <fieldset class="row mb-3">
    <legend class="col-form-label col-sm-2 pt-0">Pembayaran</legend>
    <div class="col-sm-10">
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
        <label class="form-check-label" for="gridRadios1">
            Booking
        </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
            <label class="form-check-label" for="gridRadios1">
                DP
            </label>
            </div>
        <div class="form-check">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
        <label class="form-check-label" for="gridRadios2">
            CBTH
        </label>
        </div>
        <div class="form-check disabled">
        <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
        <label class="form-check-label" for="gridRadios3">
            Third disabled radio
        </label>
        </div>
    </div>
    </fieldset>
    <div class="row mb-3">
        <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="number" class="form-control" id="inputjumlah">
        </div>
        </div>
    <div class="row mb-3">
    <div class="col-sm-10 offset-sm-2">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck1">
        <label class="form-check-label" for="gridCheck1">
            Example checkbox
        </label>
        </div>
    </div>
    </div>
    <a href="{{ route('detail_kwitansi') }}" class="btn btn-primary">Cetak</a>

    <button type="submit" class="btn btn-primary">Cetak</button>
</form>
</body>

@extends('templates.footer')