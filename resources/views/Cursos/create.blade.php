@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
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

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary ">Registar</button>
                    </div>

                   

                </div>
        </form>
    </div>
@endsection
