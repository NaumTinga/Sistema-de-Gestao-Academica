@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Dados do turma</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/turmas">Inicio</a></li>
                <li class="breadcrumb-item active">turma</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados do turma</h3>
        </div>


        <form method="POST" action="{{ route('turmas.update', ['turma' => $turma->id]) }}">
            @csrf 
            @method('PUT')
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="form-group ">
                        <label>Desginação *</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('designacao') ?? $turma->designacao }}"  required>
                    </div>
                    <div class="form-group ">
                        <label>Número Total de Estudantes *</label>
                        <input type="text" name="nome" class="form-control" value="{{ old('nrTotalEstudantes') ?? $turma->nrTotalEstudantes }}"  required>
                    </div>
             
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </div>
        </form>
    </div>
@endsection
