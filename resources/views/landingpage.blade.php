@extends('layoutLogin')
@section('content')
    <section id="hero" class="d-flex align-items-center" style="margin-top:0px; height:630px; color:black;">
        <div class="container" style="height:50%; margin-top:-80px;">
            <div class="row gy-4">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
                    <h1>Hello employe Welcome To COFAT Inventory </h1>
                    <h2>"Unis pour l'excellence, ensemble vers l'avenir"</h2>
                    <div>
                        <a href="{{ route('loginuser') }}" class="btn-get-started scrollto">Get Started</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img">
                    <img src="/img/why-us.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>
    </section>
    @endsection