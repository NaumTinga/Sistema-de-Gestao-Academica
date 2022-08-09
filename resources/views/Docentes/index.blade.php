@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
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
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Genero</th>
                                            <th>Grau Academico</th>
                                            <th>Email</th>
                                            <th>Telefone</th>
                                            <th>Naturalidade</th>
                                            <th>Disciplina</th>
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
