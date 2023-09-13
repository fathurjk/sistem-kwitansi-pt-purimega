@extends('layouts.main')
@section('container')
    
<footer class="bg-light text-center text-lg-start">
    <!-- Grid container -->
    <div class="container ">
    <!--Grid row-->
    <div class="row">
        <!--Grid column-->
        <div class="container-fluid" style="background-color: rgba(0, 0, 0, 0.2);">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <div class="containerfooterlogo">
                    <div class="footerlogo">
                        <img src="logo mitra.jpg" alt="image">
                    </div>
                </div>
                <div class="container-md mb-3">
                    <h4>PT SATRIYO MEGA SARANA</h4>
                    <p class="text">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iste atque ea quis
                        molestias. Fugiat pariatur maxime quis culpa corporis vitae repudiandae
                        aliquam voluptatem veniam, est atque cumque eum delectus sint!
                    </p>
                </div>
                </div>
        </div>
        <!--Grid column-->
    </div>
    <!--Grid row-->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2); text-align:center">
    © 2020 Copyright:
    <a class="text-dark text-decoration-none" href="https://mdbootstrap.com/">MDBootstrap.com</a>
    </div>
    <!-- Copyright -->
</footer>
@endsection

<style>

.containerfooterlogo{
        padding-left: 5mm;
        padding-top: 5mm;
        display:flex;
        flex-direction: row;
        justify-content: start;
    }

    .footerlogo {
        display: flex;
        margin: 0;
        padding: 0;
    }

    .footerlogo img {
        height: 6rem;
        width: 6rem;
        margin-bottom: 2mm;
    }

    .footerkonten h4{
        margin: 0;
        margin-left: 0;
        padding: 0;
    }

    .footerkonten p{
        margin-bottom: 0;
        padding: 0;
    }

    .text {
        margin-top: 2mm;
        padding: 0;
    }
</style>
