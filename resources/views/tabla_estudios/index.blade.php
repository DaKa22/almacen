@extends('layouts.app')
@section('titulo') Tabla Estudio @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Tabla Estudio</h4>

                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearTablaEstudio">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
                        <a href="{{route('imprimir.tabla_estudio')}}">
                            <button class="btn btn-light btn-rounded" type="button" >
                                <i class="mdi mdi-plus mr-1"></i> PDF
                            </button>
                        </a>
                    </div>



                </div>
            </div>

        </div>

    </div>
</div>
<!-- end page title end breadcrumb -->

<div class="page-content-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Reporte de Tabla Estudio</h4>

                        @if (session()->has('created') && session()->has('mensaje'))
                            <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="user_index">
                                <thead>
                                    <tr>
                                        <th class="text-center align-middle" style="min-width: 3rem">#</th>
                                        <th class="text-center align-middle" style="min-width: 10rem">Usuario</th>
                                        <th class="text-center align-middle" style="min-width: 10rem">Identificacion</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Titulo</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Entidad Educativa</th>
                                        <th class="text-center align-middle" style="min-width: 8rem">Fecha Terminacion</th>
                                        <th class="text-center align-middle" style="min-width: 8rem"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
                                        </svg></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tabla_estudios as $tabla_estudio)
                                        <tr>
                                            <th scope="row">{{ $tabla_estudio->id }}</th>

                                            <td>{{ $tabla_estudio['users']['nombre1'].' '.$tabla_estudio['users']['apellido1'] }}</td>
                                            <td>{{ $tabla_estudio['users']['cedula'] }}</td>
                                            <td>{{ $tabla_estudio->titulo }}</td>
                                            <td>{{ $tabla_estudio->entidad_educativa }}</td>
                                            <td>{{ $tabla_estudio->fecha_terminacion }}</td>
                                            <td>
                                                <button class="btn btn-danger" onclick="deleteTablaEstudio({{ $tabla_estudio->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateTablaEstudio({{ $tabla_estudio->id }})"><i class="fa fa-edit"></i></button>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->

    </div>
    <!-- end container-fluid -->
</div>
<!-- end page-content-wrapper -->

{{-- Modal para crear Users o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearTablaEstudio" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Tabla de Estudio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="users_id">Usuario Cedula</label>
                            <select name="users_id" id="users_id" class="form-control">
                                <option value="" selected disabled>Seleccione Usuario</option>
                                @foreach ($users as $user)
                                    <option value="{{$user->id}}">{{$user['cedula']}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="TE_titulo">Titulo</label>
                            <input type="text" class="form-control" id="TE_titulo" name="titulo" placeholder="Escriba El Titulo" >
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="entidad_educativa">Entidad Educativa</label>
                            <input type="text" class="form-control" id="entidad_educativa" name="entidad_educativa" placeholder="Escriba La Entidad Educativa" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="fecha_terminacion">Fecha de Terminacion</label>
                            <input type="date" class="form-control" id="fecha_terminacion" name="fecha_terminacion" placeholder="Escriba La Fecha de Terminacion" >
                        </div>

                        {{-- <div class="col-md-12 mb-3">
                            <label for="descripcion">Sublinea</label>
                            <select name="sublinea_id" id="sublinea_id" class="form-control">
                                <option value="" selected disabled>Seleccione Sublinea</option>
                                @foreach ($sublineas as $sublinea)
                                    <option value="{{$sublinea->id}}">{{$sublinea->descripcion}}</option>
                                @endforeach
                            </select>
                        </div> --}}
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection


@section('myScripts')
    <script src="{{asset('assets/js/CRUD.js')}}"></script>
@endsection
