@extends('layouts.app')
@section('titulo') Linea @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Linea</h4>

                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearLinea">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
                        <a href="{{route('imprimir.lineas')}}">
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
                        <h4 class="header-title">Reporte de Lineas</h4>

                        @if (session()->has('created') && session()->has('mensaje'))
                            <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0" id="linea">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Codigo de Linea</th>
                                        <th>Descripcion</th>
                                        <th>Configuracion</th>
                                        <th><i class="fa fa-settings"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lineas as $linea)
                                        <tr>
                                            <th scope="row">{{ $linea->id }}</th>

                                            <td>{{ $linea->codigo_linea }}</td>
                                            <td>{{ $linea->descripcion }}</td>

                                            <td>
                                                <button class="btn btn-danger" onclick="deleteLinea({{ $linea->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateLinea({{ $linea->id }})"><i class="fa fa-edit"></i></button>

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

{{-- Modal para crear Lineas o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearLinea" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Linea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="codigo_linea">Codigo de Linea</label>
                            <input type="number" class="form-control" id="codigo_linea" name="codigo_linea" placeholder="Escriba El Codigo de la Linea" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="descripcion">Descripcion</label>
                            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Escriba La Descripcion" required>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id" value="">
                    <button class="btn btn-primary" type="submit">Enviar</button>

                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection
