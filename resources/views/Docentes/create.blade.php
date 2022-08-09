@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Registo de Docentes</h1>
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
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Registar Docente</h3>
        </div>


        <form method="POST" action="{{ route('docentes.store') }}">
            @csrf
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="form-group ">
                        <label>Nome *</label>
                        <input type="text" name="nome" class="form-control" placeholder="Ex: Marlene Paulino"
                            required>
                    </div>
                    <div class="form-group ">
                        <label>Data de Nascimento *</label>
                        <input type="date" name="dataNascimento" class="form-control" required>
                    </div>
                    <div class="form-group ">
                        <label>Morada</label>
                        <input type="text" name="morada" class="form-control" placeholder="Ex: Av. 24 de Julho">
                    </div>

                    <div class="form-group">
                        <label>Naturalidade *</label>
                        <select name="naturalidade" class="form-control select2bs4" style="width: 100%;" required>
                            <option selected="selected">Maputo Cidade</option>
                            <option>Maputo Provincia</option>
                            <option>Gaza</option>
                            <option>Inhambane</option>
                            <option>Sofala</option>
                            <option>Manica</option>
                            <option>Tete</option>
                            <option>Zambezia</option>
                            <option>Nampula</option>
                            <option>Cabo-Delgado</option>
                            <option>Niassa</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Genero *</label>
                        <select name="genero" class="form-control select2bs4" style="width: 100%;" required>
                            <option selected="selected">Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>
                </div>

                <div class="card-body col-md-6">


                    <div class="form-group">
                        <label>Grau Academico</label>
                        <select name="grauAcademico" class="form-control select2bs4" style="width: 100%;">
                            <option>Ensino Superior</option>
                            <option>Mestrado</option>
                            <option>Doutoramento</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Escalao</label>
                        <select name="escalao" class="form-control select2bs4" style="width: 100%;">
                            <option>A</option>
                            <option>B</option>
                            <option>C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nivel</label>
                        <input type="number" name="nivel" class="form-control" placeholder="Ex: 1,2 ou 3" required>
                    </div>
                    <div class="form-group ">
                        <label>Telefone *</label>
                        <input type="number" name="nrTelefone" class="form-control" placeholder="Ex: 848515184" required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="marlenepaulino@gmail.com"
                            required>
                    </div>
                </div>



                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Registar</button>
                </div>

            </div>
        </form>
    </div>
@endsection
