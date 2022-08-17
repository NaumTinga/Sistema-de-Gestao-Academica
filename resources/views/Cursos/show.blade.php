@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link style="stylesheets" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link style="stylesheets" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Dados do Curso de {{ $curso->nome }}</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/cursos">Inicio</a></li>
                <li class="breadcrumb-item active">Curso</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados do Curso de {{ $curso->nome }} </h3>
        </div>


        <form method="POST" action="{{ route('cursos.update', ['curso' => $curso->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="card-body col-md-12">
                        <div class="card-body col-md-6 form-group">
                            <div class="col form-group ">
                                <label>Nome *</label>
                                <input type="text" name="nome" class="form-control"
                                    value="{{ old('title') ?? $curso->nome }}" required>
                            </div>

                        </div>
                        <div class="form-group">
                            <label>Disciplinas</label>
                            <select name="disciplinas[]" class="select2" id="disciplinas" multiple=""
                                data-placeholder="Selecione as Disciplinas" style="width: 100%;">
                                @foreach ($disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>

                    
                    <div class="card  form-group col-md-12">
                        <div class="card-header">
                            <h1 class="card-title">Disciplinas do Curso de {{ $curso->nome }}</h1>
                        </div>

                        <div class="card-body">
                            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="example1"
                                            class="table table-bordered table-striped dataTable dtr-inline"
                                            aria-describedby="example1_info">
                                            <thead>
                                                <tr>
                                                    
                                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Nome
                                                    </th>
                                                    <th>Accao</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($curso->disciplinas as $disciplina)
                                                    <tr class="odd">
                                                        
                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $disciplina->nome }}</td>
                                                        <td>
                                                            <a
                                                                href="{{ route('curso.removerDisciplina', [$curso->id, $disciplina->id]) }}">Remover</a>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th rowspan="1" colspan="1">Nome</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
        </form>









    @endsection

    @section('js')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#example1').DataTable({
                    "language": {
                        "search": "Pesquisar",
                        "lengthMenu": "Mostrar _MENU_ registros por pagina",
                        "info": "Pagina _PAGE_ de _PAGES_",
                        "paginate": {
                            "previous": "Anterior",
                            "next": "Seguinte",
                            "first": "Primeiro",
                            "last": "Ultimo"
                        }
                    }
                    
                });
            });
        </script>
         <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
         <script>
             $('#disciplinas').select2({
                 multiple: true
             });
         </script>

    @stop

