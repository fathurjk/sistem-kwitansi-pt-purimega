@include('templates.header')

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
        <div class="title-form mt-3" id="title-form" style="text-align: center">
            <h1>KWITANSI</h1>
        </div>

        <div  style="text-align: right" >
            <div class="no-kwitansi" id="no-kwitansi">
                <label for="noKwitansi">No :</label>
                <input  class="form-first" type="text" name="no_kwi" placeholder="Nomor Kwitansi..." >
            </div>
        </div>

<form style="margin-bottom: 1%">

    <div class="row mb-5 mt-5">
        <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>

    <div class="row mb-5">
        <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
    <div class="col-sm-10">
            <input type="text" class="form-control" id="inputalamat">
    </div>
    </div>

    <div class="row mb-5">
        <label for="insert-hp" class="col-sm-2 col-form-label"> No HP </label>
    <div class="col-sm-10">
        <input id="insert-hp" class="form-control" type="text">
    </div>
    </div>

    <div class="row mb-5">
        <label for="inputJumlah" class="col-sm-2 col-form-label">Uang Sebanyak</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputJumlah">
    </div>
    </div>
    
<fieldset class="mb-2">
    <legend class="col-form-label col-sm-2 pt-0">Pembayaran</legend>
    <div style="margin-bottom: 1%">
        <div class="form-check form-check-inline m-3 p-3">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
            <label class="form-check-label" for="gridRadios1">Booking</label>
        </div>
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
            <label class="form-check-label" for="gridRadios2">DP</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="option3">
            <label class="form-check-label" for="gridRadios3">CBTH</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios4" value="option4">
            <label class="form-check-label" for="gridRadios4">Angsuran Ke</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios5" value="option5">
            <label class="form-check-label" for="gridRadios5">KET</label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios6" value="option6">
            <label class="form-check-label" for="gridRadios2">Lain-lain</label>
        </div>
    </div>
</fieldset>

<fieldset style="margin-bottom: 1%">
    <div>
    <div style="margin-bottom: 1%">
        <label for="inputName" class="col-sm-2 col-form-label">Lokasi</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>

    <div style="margin-bottom: 1%">
        <label for="inputName" class="col-sm-2 col-form-label">No. Kavling</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>

    <div style="margin-bottom: 1%">
        <label for="inputName" class="col-sm-2 col-form-label">Type</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>

    <div style="margin-bottom: 1%">
        <label for="inputName" class="col-sm-2 col-form-label">Luas</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>

    <div style="margin-bottom: 1%">
        <label for="inputName" class="col-sm-2 col-form-label">Discount</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName">
    </div>
    </div>
    </div>
</fieldset>

    <div class="mb-5">
        <label for="inputJumlah" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="inputjumlah">
        </div>
        </div>
    <button type="submit" class="btn btn-primary">Cetak</button>

    <a href="{{ route('detailKwitansi') }}" class="btn btn-primary">Cetak Sementara ya Ges</a> 
    {{-- sementara cuman untuk direct ke halaman detail kwitansi --}}

</form>
</body>

@extends('templates.footer')