@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row">
            <div class="col-md-4 d-md-flex align-items-stretch mb-5 mb-md-0">
                    <div class="card bg-dark text-white ">
                            <h5 class="card-header">MiEstacionamiento</h5>
                            <div class="card-body">
                              <h5 class="card-title">Estacionarse nunca fue tan fácil.</h5>
                              <p class="card-text "><i class="fas fa-hourglass-end"></i> En cualquier hora del día</p>
                              <p class="card-text"><i class="fas fa-map-marker-alt"></i> En cualquier lugar de Santiago</p>
                              <p class="card-text"><i class="fas fa-mobile-alt"></i> Desde tu computador o celular</p>
                                <div class="mt-5">
                                    <p class="mb-3"><a href="/register" class="btn btn-light btn-block">Registrarse</a></p>
                                    <p><a href="/login" class="btn btn-outline-light btn-block">Iniciar sesión</a></p>
                                </div>
                            </div>
            </div>
            </div>
            <div class="col-md-8">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                            </ol>
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img class="d-block w-100" src="/img/estacionamiento1.jpg" alt="First slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="/img/estacionamiento2.jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="/img/estacionamiento3.jpg" alt="Second slide">
                              </div>
                              <div class="carousel-item">
                                <img class="d-block w-100" src="/img/estacionamiento4.jpg" alt="Second slide">
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
                </div>
            </div>
        </div>
</div>

@endsection