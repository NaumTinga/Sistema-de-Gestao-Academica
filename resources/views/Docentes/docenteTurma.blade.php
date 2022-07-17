@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Associar Docentes a Turmas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Docentes e Turmas</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Associar Docente a Turma</h3>
        </div>


        <form method="POST" action="{{ route('docente.AssociarDocenteTurma', ['docente' => $docente->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="form-group ">
                        <label>Docente *</label>
                        <select name="docente">
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Disciplinas</label>
                    <select name="turmas[]" class="select2" id="turmas" multiple=""
                        data-placeholder="Selecione as Turmas" style="width: 100%;">
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->designacao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Associar</button>
                </div>

            </div>
        </form>
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#turmas').select2({
            multiple: true
        });
    </script>
@stop
