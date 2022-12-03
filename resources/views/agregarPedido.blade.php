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

          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Agregar Pedido</h1>
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
                    <div class="col-sm-4">
                  <form action="{{url('/guardarpedido')}}" method="post">
                    {{ csrf_field()}}
                    <div class="mb-3">
                        <label for="idpedido" class="form-label">ID</label>
                        <input name="idpedido" type="text" class="form-control" id="" aria-describedby="" required>
                    </div><div class="mb-3">
                        <label for="fecha" class="form-label">Fecha</label>
                        <input name="fecha" type="date" class="form-control" id="" aria-describedby="" required>
                    </div>
                     <div>
                        <label for="product" class="form-label">Producto</label>
                        <input name="product" type="text" class="form" id="" aria-describedby="" required>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#prodModal">
                            +
                          </button>
                    </div>
                    <div>
                      <label for="product" class="form-label">Cliente</label>
                      <input name="product" type="text" class="form" id="" aria-describedby="" required>
                      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#clienModal">
                          +
                        </button>
                  </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input name="cantidad" type="text" class="form-control" id="" aria-describedby="" required>
                    </div>
                    <div class="mb-3">
                        <label for="montototal" class="form-label">Monto total</label>
                        <input name="montototal" type="text" class="form-control" id="" aria-describedby="" required>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar</button>
                  </form>
                </div>

            </div>

            <h2></h2>

          </main>

        </div>
      </div>
</div>
<!-- Modal producto -->
<div class="modal fade" id="prodModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Producto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div><label>ID</label><input></div>
          <br>
          <div><label>Descripcion</label><input></div>
          <div></div>





        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
          <button type="button" class="btn btn-primary">Guardar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal cliente -->
<div class="modal fade" id="clienModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Cliente</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div><label>ID</label><input></div>
        <br>
        <div><label>Descripcion</label><input></div>
        <div></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>



@endsection
