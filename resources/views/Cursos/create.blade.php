@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">

    {{-- <link href="vendor/select2/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Registo de Cursos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registar Curso</h3>
        </div>


        <form method="POST" action="{{ route('cursos.store') }}">
            @csrf
            <div class="row">
                <div class="card-body col-md-12">
                    <div class="form-group col-md-6">
                        <label>Nome *</label>
                        <input type="text" name="nome" class="form-control" placeholder="Ex: Engenharia Informatica"
                            required>
                    </div>

                    <div class="form-group">
                        {{-- <input type="hidden" name="curso" value="{{ $curso->id }}"> --}}
                        <label>Disciplinas</label>
                        <select name="disciplinas[]" class="select2" id="disciplinas" multiple=""
                            data-placeholder="Selecione as Disciplinas" style="width: 100%;">
                            @foreach ($disciplinas as $disciplina)
                                <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Registar</button>
                    </div>
                </div>
            </div>
        </form>
    @endsection

    @section('js')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        {{-- <script src="vendor/select2/dist/js/select2.min.js"></script> --}}
        <script>
            $('#disciplinas').select2({
                multiple: true
            });
        </script>
    @stop
