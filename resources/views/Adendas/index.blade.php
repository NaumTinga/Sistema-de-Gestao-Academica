@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">adendas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/adendas">Inicio</a></li>
                <li class="breadcrumb-item active">adendas</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')

    <div class="row">
        <div class="card card-secondary" style="width: 100%;">
            <div class="card-header">
            </div>
            <div class="container-fluid" style="padding: 20px;">
                <div class="text-center">
                    @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-sm-12 col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Lista do Corpo de adendas</h3>
                            </div>

                            <div class="card-body  table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Docente</th>
                                            <th>Turma</th>
                                            <th>Regime</th>
                                            <th>Curso</th>
                                            <th>Disciplina</th>
                                            <th>Semestre</th>
                                            <th>Observacao</th>
                                            <th>DataAlteracao</th>
                                            <th>Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($adendas as $adenda)
                                            <tr>
                                                <td>{{ $adenda->docentes->first()->nome ?? '------' }}</td>
                                                <td>{{ $adenda->turmas->first()->designacao ?? '------' }}</td>
                                                <td>{{ $adenda->regime }}</td>
                                                <td>{{ $adenda->cursos->first()->nome ?? '------' }}</td>
                                                <td>{{ $adenda->disciplinas->first()->nome ?? '------' }}</td>
                                                <td>{{ $adenda->semestre }}</td>
                                                <td>{{ $adenda->observacao }}</td>
                                                <td>{{ $adenda->dataAlteracao }}</td>
                                                {{-- <td>{{ $adenda->turmas->designacao }}</td> --}}
                                                <td>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('adendas.show', ['adenda' => $adenda->id]) }}">Ver</a>


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
            <!-- /.row -->

        @stop
        @section('js')


            {{-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script> --}}

            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
            <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
            <script type="text/javascript"
                src="https://cdn.datatables.net/v/dt/jszip-2.5.0/dt-1.12.1/b-2.2.3/b-colvis-2.2.3/b-html5-2.2.3/b-print-2.2.3/datatables.min.js">
            </script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('#table').DataTable({
                        dom: 'Bfrtip',
                        buttons: [

                            {
                                extend: 'excelHtml5',
                                filename: 'Adendas',
                                title: 'Universidade Apolitecnica - Adendas',
                                text: 'Exportar para Excel',
                            },
                            {
                                extend: 'pdfHtml5',
                                filename: 'Adendas',
                                title: 'Universidade Apolitecnica - Adendas',
                                text: 'Exportar para PDF',
                            },
                            {
                                extend: 'print',
                                filename: 'Adenda',
                                title: 'Universidade Apolitecnica - Adenda',
                                text: 'Imprimir'
                            }

                        ]
                    })
                });
            </script>

            {{-- <script>
            $(document).ready(function() {
                $("#example1").DataTable({
                    responsive: true,
                    lengthChange: false,
                    autoWidth: false,
                    dom: 'Bfrtip',
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                    filename: "ADENDA",
                }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                $('#example2').DataTable({
                    "paging": true,
                    "lengthChange": false,
                    "searching": false,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false,
                    "responsive": true,
                });
            });
        </script> --}}
        @stop
