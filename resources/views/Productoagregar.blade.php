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
                  <a class="nav-link active" aria-current="page" href="{{url('/home')}}">
                    <span data-feather="home"></span>
                    <div class="card-header">{{ __('Inicio') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <!--{{ __('You are logged in!') }}!-->
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
              <h1 class="h2">Pedido</h1>
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

            <div class="my-4 w-100" id="myChart" width="900" height="380">
               <div class="row">
                  <a class="btn btn-outline-seccess col-2" href="{{url('/agregarPedido')}}">
                    <span data-feather="file-text"></span>
                    Agregar Pedido
                  </a>
                 <!-- <div class="row">

                    <div class="col-xl-2 col-sm-3 col-6">
                      <div data-bs-toggle="modal" data-bs-target="#modalsede" class="card text-white" style="background:#eda8ec;">
                        <div class="card-content">
                          <div class="card-body">
                            <div class="media d-flex">
                              <div class="align-self-center">
                                <i class="icon-pencil primary font-large-2 float-left"></i>
                              </div>
                              <div class="media-body text-right">
                                <h3>+</h3>
                                <a>
                                <span>
                                  Agregar Pedido
                                </span>-->
                  <hr>
                  <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>fecha</th>
                            <th>Cantidad</th>
                            <th>total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($Pedido as $p)
                    <tr>
                        <td>{{$p->id}}</td>
                        <td>{{$p->fecha}}</td>
                        <td>{{$p->cantidad}}</td>
                        <td>{{$p->montototal}}</td>
                        <td>
                            <div class="btn-group">
                                <a href="{{url('/editarpedido/'.$p->id.'/edit')}}" class="btn btn-outline-primary">
                                Editar
                                </a>
                                <form method="post" action="{{url('/borrarpedido/'.$p->id)}}">
                                 {{csrf_field()}}
                                 {{method_field('DELETE')}}
                                 <button class="btn btn-outline-primary" type="submit" onclick="return confirm('Borrar datos de?\n{{$p->id}}');">
                                  Borrar
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                  {{$Pedido->links()}}
            </div>

            </main>
        </div>
      </div>
      <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#vertically-centered">
        Vertically centered
      </button>

      <x-modal id="vertically-centered" title="Vertically centered" :centered="true">
        <x-slot name="body">
          Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
        </x-slot>
        <x-slot name="footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </x-slot>
      </x-modal>
  @endsection


