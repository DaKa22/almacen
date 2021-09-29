<!doctype html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <title>RyanCompany | Linea

        <!-- App favicon -->



        <!-- Bootstrap Css -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <!-- Icons Css -->

        <!-- App Css-->


        <!-- CSRF TOKEN-->

    </head>

    <body data-topbar="colored">

        <!-- Begin page -->
        <div id="layout-wrapper">



            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">

                    <div class="page-content-wrapper">
                        <div class="container-fluid">

                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="header-title">Reporte de Movimientos</h4>

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
                                                            <th>Tipo de Movimiento</th>
                                                            <th>Cedula de Movimiento</th>
                                                            <th>Nombre de Movimiento</th>
                                                            <th>Fecha de Movimiento</th>
                                                            <th>Valor Total del Movimiento</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($movimientos as $movimiento)
                                                            <tr>
                                                                <th scope="row">{{ $movimiento->id }}</th>
                                                                <td>
                                                                    @if ($movimiento->tipo_movimiento == 0)
                                                                        Entrada
                                                                    @else
                                                                    Salida
                                                                    @endif


                                                                 </td>
                                                                <td>{{ $movimiento->cedula_movimiento }}</td>
                                                                <td>{{ $movimiento->nombre_movimiento }}</td>
                                                                <td>{{ $movimiento->fecha_movimiento }}</td>
                                                                <td>{{ $movimiento->valor_total_movimiento }}</td>


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
                </div>
                <!-- End Page-content -->



            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->

        <script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

        <script src="{{asset('assets/js/CRUD.js')}}">  </script>



    </body>
</html>







