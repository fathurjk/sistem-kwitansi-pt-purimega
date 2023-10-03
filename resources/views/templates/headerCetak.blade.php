<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT PURIMEGA SARANALAND</title>
    <div class="containerlogo">
        <div class="headerlogo row">
            <img src=" {{ asset("/img/logo.png") }}">
        </div>
        <div class="headerkonten">
            <p class="tittle-kop">PT. PURIMEGA SARANALAND </p>
            {{-- <p class="text">GENERAL CONTRACTOR - DEVELOPER - PERDAGANGAN UMUM
            </p> --}}
            <p class="text">Jl. Setrayasa Barat 1 No. Kav 19 Kedungjaya Kedawung Cirebon 45135 Telp. (0231) 8807370</p>
        </div>
    </div>
    <div class="divider"></div>
</head>
</html>


<style>
    .tittle-kop{
        font-size: 36px;
        font-weight: 600;
        padding: 0;
        margin: 0;
        letter-spacing: 0.5px
    }

    .containerlogo{
        padding-top: 0;
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: flex-end
    }

    .headerlogo {
        display: flex;
        margin: 0;
        padding: 0
    }

    .headerlogo img {
        height: 70px;
        width: 90px;
        margin-right: 0px;
        align-items: center;
        justify-content: center;
        margin-top: 12px
    }

    .headerkonten h1 {
        margin: 0 0 -4px 0;
        padding: 0;
        font-size: 24pt
    }

    .headerkonten{
        justify-content: center;
        text-align: center;
        align-items: center
    }
    
    .headerkonten p {
        margin-top: -4px;
        padding: 0
    }
    .divider {
        border-top: 2px solid;
        margin: 2px 0 0 0; 
    }

    .text {
        margin-bottom: 0;
        padding: 0;
    }
</style>