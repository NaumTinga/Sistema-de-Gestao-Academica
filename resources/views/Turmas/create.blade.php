@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Registo de Turmas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Turmas</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registar Turma</h3>
        </div>


        <form method="POST" action="{{ route('turmas.store') }}">
            @csrf
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="form-group ">
                        <label>Designação *</label>
                        <input type="text" name="designacao" class="form-control" placeholder="Ex: Informatica Primeiro Ano"
                            required>
                    </div>

                    <div class="form-group ">
                        <label>Numero Total de Estudantes *</label>
                        <input type="text" name="nrTotalEstudantes" class="form-control" placeholder="Ex: 45"
                            required>
                    </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Registar</button>
                    </div>

                </div>
        </form>
    </div>
@endsection
