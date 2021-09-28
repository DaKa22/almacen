@extends('layouts.app')
@section('titulo') Sublinea @endsection

@section('content')
<!-- Page-Title -->
<div class="page-title-box">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h4 class="page-title mb-1">Sublinea</h4>

                </ol>
            </div>
            <div class="col-md-4">
                <div class="float-right d-none d-md-block">
                    <div class="dropdown">
                        <button class="btn btn-light btn-rounded" type="button" data-toggle="modal" data-target="#modal_crearSublinea">
                            <i class="mdi mdi-plus mr-1"></i> Agregar
                        </button>
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
                        <h4 class="header-title">Reporte de Sublineas</h4>

                        @if (session()->has('created') && session()->has('mensaje'))
                            <div class="alert {{ session('created') == 1 ? 'alert-success' : 'alert-danger' }} mb-2" role="alert">
                                {{ session('mensaje') }}
                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Codigo de Sublinea</th>
                                        <th>Descripcion</th>
                                        <th>Configuracion</th>
                                        <th><i class="fa fa-settings"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sublineas as $sublinea)
                                        <tr>
                                            <th scope="row">{{ $sublinea->id }}</th>

                                            <td>{{ $sublinea->codigo_sublinea }}</td>
                                            <td>{{ $sublinea->descripcion }}</td>

                                            <td>
                                                <button class="btn btn-danger" onclick="deleteSublinea({{ $sublinea->id }})"><i class="fa fa-trash"></i></button>
                                                <button class="btn btn-info" onclick="updateSublinea({{ $sublinea->id }})"><i class="fa fa-edit"></i></button>

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

{{-- Modal para crear Sublineas o editarlos --}}
<div class="modal fade bs-example-modal-center" id="modal_crearSublinea" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="titulo" >Agregar Sublinea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-group" method="POST" action="">
                    @csrf

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="codigo_sublinea">Codigo de Sublinea</label>
                            <input type="number" class="form-control" id="codigo_sublinea" name="codigo_sublinea" placeholder="Escriba El Codigo de la Sublinea" required>
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
