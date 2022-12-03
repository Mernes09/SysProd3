@extends ('layouts.app')
@section('contenido')
<div class="c-subheader justify-content-between px-3">
    <ol class="breadcrumb border-0 m-0 px-0 px-md-3">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('index.cliente')}}">Clientes</a></li>
        <li class="breadcrumb-item active"><a>Nuevo Cliente</a></li>
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
                @include('load')
                <div class="row" id="contenido" style="display:none">
                    <div class="col-lg-12 col-md-12 form-group">
                       <div class="row">
                        <div class="col-lg-12 form-group">
                            <form action="{{route('store.cliente')}}" method="POST" enctype="multipart/form-data" autocomplete="off">
                                {{ csrf_field() }}
                            <div class="card" style="border-radius:0px !important">
                                <div class="card-header" style="background: #4949e7 !important">
                                    <b><h5 style="margin-bottom: 0px !important;color:white">Nuevo cliente</h5></b>
                                </div>
                                @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-9  form-group">
                                                    <div class="row">
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Razón social</b></label>
                                                                <input type="text" name="nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" value="{{old('nombre')}}" placeholder="Escriba la razón social">
                                                                @if ($errors->has('nombre'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('nombre') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Tipo Doc.</b></label>
                                                                <select class="mdb-select md-form colorful-select dropdown-primary" name="tipo_documento">
                                                                    <option value="CI">Cl</option>
                                                                    <option value="RUC">RUC</option>
                                                                </select>
                                                                @if ($errors->has('tipo_documento'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('tipo_documento') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Número Doc.</b></label>
                                                                <input type="text" name="num_documento" class="form-control {{ $errors->has('num_documento') ? ' is-invalid' : '' }}" value="{{old('num_documento')}}" placeholder="Escriba el número de documento">
                                                                @if ($errors->has('num_documento'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('num_documento') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Teléfono</b></label>
                                                                <input type="tel" name="telefono" id="tel-cliente" class="form-control cleave-input-telephone" value="{{old('telefono')}}">
                                                                @if ($errors->has('telefono'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('telefono') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Email</b></label>
                                                                <input type="email" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{old('email')}}" placeholder="Escriba el email">
                                                                @if ($errors->has('email'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('email') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                                <label><b>Dirección</b></label>
                                                                <input type="text" name="direccion" class="form-control {{ $errors->has('direccion') ? ' is-invalid' : '' }}" value="{{old('direccion')}}" placeholder="Escriba la dirección">
                                                                @if ($errors->has('direccion'))
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $errors->first('direccion') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary" >Registrar</button>
                                    <button type="reset" class="btn btn-danger" >Cancelar</button>
                                </div>
                            </div>
                        </form>
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

        $('.file-upload').file_upload();
        window.onload = function(){
           var loader = document.getElementById('loader');
           var contenido = document.getElementById('contenido');

            contenido.style.display = 'block';

            $('#loader').remove();
       }
       var cleave = new Cleave('.cleave-input-telephone', {
            delimiters: [' ', ' ', ' '],
            blocks: [4, 3, 3]
        });
    </script>
@endpush
@endsection
