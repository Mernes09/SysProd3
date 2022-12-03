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
                  <a class="nav-link"  href="{{url('/Inventario')}}">
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
              <h1 class="h2">Produccion</h1>
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

            <!-- boton Modal Orden de produccion--->
            <div class="col-xl-2 col-sm-2 col-1">
                <div data-bs-toggle="modal" data-bs-target="#modalorden" class="card text-white" style="background:#e79de0;">
                  <div class="card-content">
                    <div class="card-body">
                      <div class="media d-flex">
                        <div class="align-self-center">
                          <i class="icon-pencil primary font-large-2 float-left"></i>

                        </div>
                        <div class="media-body text-right">
                            <h3>+</h3>
                            <a>
                            <span class="col-xl-3 col-sm-2 col-1">
                              Gestion Orden Produccion
                            </span>
                            </a>
                          </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>

                       <!-- boton Modal etapas de produccion--->
                       <div class="col-xl-2 col-sm-2 col-1">
                        <div data-bs-toggle="modal" data-bs-target="#etapmodal" class="card text-white" style="background:#cd45c0;">
                          <div class="card-content">
                            <div class="card-body">
                              <div class="media d-flex">
                                <div class="align-self-center">
                                  <i class="icon-pencil primary font-large-2 float-left"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3>+</h3>
                                    <a>
                                    <span class="col-xl-3 col-sm-2 col-1">
                                       Gestion Etapas de produccion
                                    </span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>

                                  <!-- boton Modal Control de produccion--->
                       <div class="col-xl-2 col-sm-2 col-1">
                        <div data-bs-toggle="modal" data-bs-target="#modalcontrol" class="card text-white" style="background:#910883;">
                          <div class="card-content">
                            <div class="card-body">
                              <div class="media d-flex">
                                <div class="align-self-center">
                                  <i class="icon-pencil primary font-large-2 float-left"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3>+</h3>
                                    <a>
                                    <span class="col-xl-3 col-sm-2 col-1">
                                      Gestion Control de produccion
                                    </span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>

                                  <!-- boton Modal Control de calidad--->
                       <div class="col-xl-2 col-sm-2 col-1">
                        <div data-bs-toggle="modal" data-bs-target="#modalcalidad" class="card text-white" style="background:#b195ae;">
                          <div class="card-content">
                            <div class="card-body">
                              <div class="media d-flex">
                                <div class="align-self-center">
                                  <i class="icon-pencil primary font-large-2 float-left"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3>+</h3>
                                    <a>
                                    <span class="col-xl-3 col-sm-2 col-1">
                                       Gestion Control de calidad
                                    </span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>

                                  <!-- boton Modal mermas--->
                       <div class="col-xl-2 col-sm-2 col-1">
                        <div data-bs-toggle="modal" data-bs-target="#mermodal" class="card text-white" style="background:#a80798;">
                          <div class="card-content">
                            <div class="card-body">
                              <div class="media d-flex">
                                <div class="align-self-center">
                                  <i class="icon-pencil primary font-large-2 float-left"></i>

                                </div>
                                <div class="media-body text-right">
                                    <h3>+</h3>
                                    <a>
                                    <span class="col-xl-3 col-sm-2 col-1">
                                       Gestion<br>
                                        Mermas

                                    </span>
                                    </a>
                                  </div>
                              </div>
                            </div>
                          </div>
                        </div>
                       </div>
              </div>
            </div>




            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>



          </main>
        </div>
      </div>
</div>
<!--MODALES agregar-->
<div class="modal fade" id="modalorden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva Orden Produccion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url('')}}" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label class="form-label">Fecha Inicio</label>
        <input type="date" class="form-control" name="descripcion" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <label class="form-label">Fecha Final</label>
        <input type="date" class="form-control" name="descripcion" aria-describedby="emailHelp">
      </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--FIN MODALES-->
<!--MODALES agregar-->
<div class="modal fade" id="etapmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva Etapas de Produccion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url('')}}" enctype="multipart/form-data">

        <div class="modal-body">
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
    </div>
         <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--FIN MODALES-->
  <!--MODALES agregar-->
<div class="modal fade" id="modalcontrol" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar nueva Control de Produccion</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="{{url('')}}" enctype="multipart/form-data">
          @csrf
        <div class="modal-body">
    <div class="mb-3">
      <label class="form-label">Descripción</label>
      <input type="text" class="form-control" name="descripcion" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
      <label class="form-label">Fecha</label>
      <input type="date" class="form-control" name="direccion">
    </div>
    <div class="mb-3">
      <label class="form-label">Cantidad</label>
      <input type="text" class="form-control" name="sede">
    </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </div>
        </form>
      </div>
    </div>
  </div>
  <!--FIN MODALES-->


@endsection
