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
            <h1 class="m-0 text-dark">Docentes</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Docentes</li>
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
                                <h3 class="card-title">Lista do Corpo de Docentes</h3>
                            </div>

                            <div class="card-body  table-responsive">
                                <table id="table" class="table table-bordered table-striped dataTable dtr-inline"
                                aria-describedby="example1_info">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Genero</th>
                                            <th>Grau Academico</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Naturalidade</th>
                                            <th>Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($docentes as $docente)
                                            <tr>
                                                <td>{{ $docente->nome }}</td>
                                                <td>{{ $docente->genero }}</td>
                                                <td>{{ $docente->grauAcademico }}</td>
                                                <td>{{ $docente->email }}</td>
                                                <td>{{ $docente->nrTelefone }}</td>
                                                <td>{{ $docente->naturalidade }}</td>
                                                {{-- <td>{{ $docente->disciplina->nome }}</td> --}}
                                                <td>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('docentes.show', ['docente' => $docente->id]) }}">Ver</a>
                                                    {{-- <a class="btn btn-danger"
                                                            href="{{ route('docentes.edit', ['docente' => $docente->id]) }}">Editar</a> --}}
                                                    <form class="d-inline" method="POST"
                                                        action="{{ route('docentes.destroy', ['docente' => $docente->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">
                                                            Apagar
                                                        </button>
                                                    </form>
                                                </td>
                                        @endforeach

                                        {{-- @foreach ($docente->turmas as $turma)
                                                <tr class="odd">

                                                 <td class="dtr-control sorting_1" tabindex="0">
                                                        {{ $turma->designacao }}</td>

                                                </tr>
                                                @endforeach --}}

                                        </tr>


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
                                filename: 'LCD',
                                title: 'Universidade Apolitecnica - Lista de Corpos de Docentes',
                                text: 'Exportar para Excel',
                            },
                            {
                                extend: 'pdfHtml5',
                                filename: 'LCD',
                                title: 'Universidade Apolitecnica - Lista de Corpos de Docentes',
                                text: 'Exportar para PDF',
                            },
                            {
                                extend: 'print',
                                filename: 'LCD',
                                title: 'Universidade Apolitecnica - Lista de Corpos de Docentes',
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
