<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT SATRIYO MEGA SARANA</title>
    <div class="containerlogo">
        <div class="headerlogo row">
            <img src=" {{ asset("/img/logo.jpg")}}"
            >
        </div>
        <div class="headerkonten">
            <h1>PT. SATRIYO MEGA SARANA</h1>
            <p class="text">GENERAL CONTRACTOR - DEVELOPER - PERDAGANGAN UMUM
            </p>
            <p class="text">Jl. Setrayasa Barat 1 No. Kav 19 Kedungjaya Kedawung Cirebon 45135 Telp. (0231) 8807370</p>
        </div>
    </div>
    <div class="divider"></div>
</head>
</html>


<style>
    .containerlogo{
        padding-top: 4;
        display: flex;
        flex-direction: row;
        justify-content: center;
        text-align: center;
    }

    .headerlogo {
        display: flex;
        margin: 0;
        padding: 0
    }

    .headerlogo img {
        height: 5.5rem;
        width: 7rem;
        margin-right: 8px;
        align-items: center;
        justify-content: center
    }

    .headerkonten h1 {
        margin: 0 0 -4 0;
        padding: 0;
    }

    .headerkonten{
        justify-content: center;
        text-align: center;
        align-items: center
    }
    
    .headerkonten p {
        margin-top: -2;
        padding: 0
    }
    .divider {
        border-top: 3px solid;
        margin: 2px 0; 
    }

    .text {
        margin-bottom: 0;
        padding: 0;
    }
</style>