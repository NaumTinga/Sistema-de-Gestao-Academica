@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.4.1/css/buttons.dataTables.min.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" />

    {{-- <link style="stylesheets" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link style="stylesheets" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.bootstrap4.min.css"> --}}
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Adenda {{ $adendas->id }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/adendas">Inicio</a></li>
                <li class="breadcrumb-item active">ADENDA</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados da Adenda</h3>
        </div>

        <form method="POST" action="{{ route('adendas.update', ['adenda' => $adendas->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card-body col-md-6"> {{-- lado esquerdo do form --}}
                    <div class="form-group ">
                        <label>Docente *</label>
                        <select name="docentes" class="form-control select2bs4" data-placeholder="Selecione o docente"
                            style="width: 100%;" disabled>
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Curso *</label>
                        <select name="cursos" class="form-control select2bs4" data-placeholder="Selecione o curso"
                            style="width: 100%;">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Semestre</label>
                        <select name="semestre" class="form-control select2bs4" style="width: 100%;">
                            <option>I</option>
                            <option>II</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Data de Alteração *</label>
                        <input type="date" name="dataAlteracao" class="form-control" required>
                    </div>

                </div>{{-- fimm lado esquerdo do form --}}

                <div class="card-body col-md-6"> {{-- lado direito do form --}}

                    <div class="form-group ">

                        <label>Disciplina *</label>
                        <select name="disciplinas" class="form-control select2bs4" data-placeholder="Selecione a disciplina"
                            style="width: 100%;">

                            @foreach ($disciplinas as $disciplina)
                                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                            @endforeach


                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Turma *</label>
                        <select name="turmas" class="form-control select2bs4" data-placeholder="Selecione as turma"
                            style="width: 100%;">
                            @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}">{{ $turma->designacao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Regime</label>
                        <select name="regime" class="form-control select2bs4" style="width: 100%;">
                            <option>Laboral</option>
                            <option>Pos-Laboral</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Obeservação *</label>
                        <input type="text" name="observacao" class="form-control" required>
                    </div>
                </div>{{-- fim lado direito do form --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Gerar</button>
                </div>
            </div>
        </form>

        <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    {{-- <div class="col-sm-12 col-md-6">
                        <div class="dt-buttons btn-group flex-wrap"> <button
                                class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1"
                                type="button"><span>Copy</span></button> <button
                                class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1"
                                type="button"><span>CSV</span></button> <button
                                class="btn btn-secondary buttons-excel buttons-html5" tabindex="0"
                                aria-controls="example1" type="button"><span>Excel</span></button> <button
                                class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1"
                                type="button"><span>PDF</span></button> <button class="btn btn-secondary buttons-print"
                                tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                        </div>
                    </div> --}}
                    <div class="col-sm-12">
                        <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                            aria-describedby="example1_info">
                            <thead>
                                <tr>
                                    <th>Docente</th>
                                    <th>Turma</th>
                                    <th>NrEstudantes</th>
                                    <th>Regime</th>
                                    <th>Curso</th>
                                    <th>Disciplina</th>
                                    <th>Semestre</th>
                                    <th>Observacao</th>
                                    <th>DataAlteracao</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $adendas->docentes->first()->nome ?? '------' }}</td>
                                    <td>{{ $adendas->turmas->first()->designacao ?? '------' }}</td>
                                    <td>{{ $adendas->turmas->first()->nrTotalEstudantes ?? '------' }}</td>
                                    <td>{{ $adendas->regime }}</td>
                                    <td>{{ $adendas->cursos->first()->nome ?? '------' }}</td>
                                    <td>{{ $adendas->disciplinas->first()->nome ?? '------' }}</td>
                                    <td>{{ $adendas->semestre }}</td>
                                    <td>{{ $adendas->observacao }}</td>
                                    <td>{{ $adendas->dataAlteracao }}</td>

                                </tr>
                            </tbody>
                            <tfoot>

                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </div>

@endsection


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
            $('#example1').DataTable({
                dom: 'Bfrtip',
                buttons: [

                    {
                        extend: 'excelHtml5',
                        filename: 'Adenda',
                        title: 'Universidade Apolitecnica - Adenda',
                        text: 'Exportar para Excel',
                    },
                    {
                        extend: 'pdfHtml5',
                        filename: 'Adenda',
                        title: 'Universidade Apolitecnica - Adenda',
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
