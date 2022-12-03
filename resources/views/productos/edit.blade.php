@extends('layouts.app')
@section('contenido')
<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item"><a href="{{route('index.producto')}}">Productos</a></li>
        <li class="breadcrumb-item active"><a>Editor de Productos</a></li>
    </ol>
    <div class="c-subheader-nav d-md-down-none mfe-2">
        <a class="c-subheader-nav-link" href="#">
            <svg class="c-icon">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-speech"></use>
            </svg>
        </a>
        @include('general.migajas')
    </div>
</div>
<div class="c-body">
    <main class="c-main">
        <div class="container-fluid">
            <div id="ui-view"></div>
            <div>


                <div class="row" id="contenido" style="display:none">

                    @if(Session::has('danger'))
                        <div class="col-lg-12">
                            <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert" style="color: #ffffff;background-color: #ed2b2b;">
                                {{Session::get('danger')}}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="col-lg-10 col-md-12 form-group">
                       <div class="row">
                        <div class="col-lg-12 form-group">
                            <div class="card" style="border-radius:0px !important">
                                <div class="card-header" style="background: #4949e7 !important">
                                <b><h5 style="margin-bottom: 0px !important;color:white">Editar producto: {{$producto->titulo}}</h5></b>
                                </div>
                                <div class="card-body">
                                <form action="{{route('update.producto',$producto->id)}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="PATCH">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">
                                                    <div class="col-lg-3 col-md-3">
                                                        <img src="{{asset('poster/'.$producto->poster)}}" id="blah" style="width:100%">
                                                        <hr>
                                                        <svg id="barcode" style="width:100%;height:90px !important"></svg>
                                                        <input type="file" id="imgInp" name="poster" class="form-control mt-4 {{ $errors->has('poster') ? ' is-invalid' : '' }}">
                                                        @if ($errors->has('poster'))
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $errors->first('poster') }}</strong>
                                                            </span>
                                                        @endif
                                                        <center><button type="submit" class="btn btn-download mt-4" style="background-color: #69e781;">Actualizar</button></center>
                                                    </div>
                                                    <div class="col-lg-9 col-md-9  form-group">
                                                        <div class="row">
                                                            <div class="col-lg-12 form-group">
                                                                <label><b>Título del producto</b></label>
                                                                <input type="text" name="titulo" class="form-control {{ $errors->has('titulo') ? ' is-invalid' : '' }}" value="{{$producto->titulo}}" placeholder="Nombre del producto">
                                                                @if ($errors->has('titulo'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('titulo') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>

                                                            <div class="col-lg-4 form-group">
                                                                <label><b>Categoría</b></label>
                                                                <select name="id_categoria" class="mdb-select md-form" searchable="buscar.." >
                                                                    @foreach ($categorias as $cat)
                                                                        @if ($producto->id_categoria == $cat->id)
                                                                            <option selected value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                                        @else
                                                                            <option value="{{$cat->id}}">{{$cat->nombre}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('id_categoria'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('id_categoria') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>

                                                            <div class="col-lg-4 form-group">
                                                                <label><b>Stock</b></label>

                                                                <div class="input-group" id="show_hide_password">
                                                                    <input type="number" name="stock" step="0.01" class="form-control amount {{ $errors->has('stock') ? ' is-invalid' : '' }}" value="{{$producto->stock}}" placeholder="Cantidad" min="0">
                                                                    @if ($errors->has('stock'))
                                                                        <span class="invalid-feedback" role="alert">
                                                                            <strong>{{ $errors->first('stock') }}</strong>
                                                                        </span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-4 form-group">
                                                                <label><b>Estado</b></label>
                                                                <select class="mdb-select md-form" name="estado">

                                                                        @if ($producto->estado == 'Disponible')
                                                                            <option value="Disponible" selected>Disponible</option>
                                                                            <option value="En espera">En espera</option>
                                                                        @else
                                                                            <option value="Disponible" >Disponible</option>
                                                                            <option value="En espera" selected>En espera</option>
                                                                        @endif

                                                                </select>
                                                                @if ($errors->has('estado'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('estado') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-12 form-group">
                                                                <label><b>Descripción</b></label>
                                                                <textarea name="descripcion" class="form-control {{ $errors->has('descripcion') ? ' is-invalid' : '' }}" placeholder="Breve descripción del producto" style="height:150px">{{$producto->descripcion}}</textarea>
                                                                @if ($errors->has('descripcion'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('descripcion') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                </form>
                                </div>
                            </div>
                        </div>
                       </div>
                    </div>


                </div>
            </div>
        </div>
    </main>


</div>
@push('scripts')
    <script>
         window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';

            $('#loader').remove();
       }

    JsBarcode("#barcode", "<?php echo $producto->codigo?>");



        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });

    </script>
@endpush
@endsection
