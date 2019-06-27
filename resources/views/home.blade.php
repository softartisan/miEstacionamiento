@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <!--Carousel-->
                
    <section class="home-slider section pt-0 pb-0">
    <div class="container-fluid">
        <div class="row" style="margin-right: 0px;margin-left: 0px;">
            <div class="col pl-0 pr-0">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="0">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="carousel-img d-block w-100" src="/img/estacionamiento3.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-img d-block w-100" src="/img/estacionamiento1.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-img d-block w-100" src="/img/estacionamiento2.jpg" alt="Third slide">
                        </div>
                        <div class="carousel-item">
                            <img class="carousel-img d-block w-100" src="/img/estacionamiento4.jpg" alt="Fourth slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                <!-- /slider -->
            </div>
        </div>
    </div>
</section>
<!-- /HOME-SLIDER -->
                <!--End Carousel-->
                <!--Bienvenido-->
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bienvenido {{ Auth::user()->usuario->nombre_usuario}} {{Auth::user()->usuario->apellido_usuario}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
