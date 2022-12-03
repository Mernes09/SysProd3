@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">

                    </div>
                </div>
            </div>
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    <div class="card-header">{{ __('Inicio') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                           <!-- {{ __('You are logged in!') }}!-->
                        </div>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/Pedido')}}">
                    <span data-feather="file"></span>
                    Pedido
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/OrdenProduccion')}}">
                    <span data-feather="shopping-cart"></span>
                   Producción
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('/Inventario')}}">
                    <span data-feather="users"></span>
                     Inventario
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span data-feather="bar-chart-2"></span>
                    Reportes
                </a>
            </li>
          </ul>
        </div>
      </nav>

              <!--  -->

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

                <h1 class="h2">Inicio</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>

                </button>
              </div>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

            <h2></h2>

          </main>
        </div>
      </div>
</div>
@endsection
