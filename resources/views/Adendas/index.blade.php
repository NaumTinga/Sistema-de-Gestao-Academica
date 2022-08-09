@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">adendas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/adendas">Inicio</a></li>
                <li class="breadcrumb-item active">adendas</li>
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
                                <h3 class="card-title">Lista do Corpo de adendas</h3>
                            </div>

                                <div class="card-body  table-responsive">
                                    <table id="table" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Docente</th>
                                                <th>Regime</th>
                                                <th>Curso</th>
                                                <th>Cadeiras</th>
                                                <th>Semestre</th>
                                                <th>Observacao</th>
                                                <th>DataAlteracao</th>
                                                <th>Acção</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($adendas as $adenda)
                                                <tr>
                                                    <td>{{ $adenda->nome }}</td>
                                                    <td>{{ $adenda->genero }}</td>
                                                    <td>{{ $adenda->grauAcademico }}</td>
                                                    <td>{{ $adenda->email }}</td>
                                                    <td>{{ $adenda->nrTelefone }}</td>
                                                    <td>{{ $adenda->naturalidade }}</td>
                                                    {{-- <td>{{ $adenda->turmas->designacao }}</td> --}}
                                                    <td>

                                                        <a class="btn btn-primary"
                                                            href="{{ route('adendas.show', ['adenda' => $adenda->id]) }}">Ver</a>
                                                        {{-- <a class="btn btn-danger"
                                                            href="{{ route('adendas.edit', ['adenda' => $adenda->id]) }}">Editar</a> --}}
                                                        <form class="d-inline" method="POST"
                                                            action="{{ route('adendas.destroy', ['adenda' => $adenda->id]) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-warning">
                                                                Apagar
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @foreach ($adenda->turmas as $turma)
                                            <tr class="odd">

                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $turma->designacao }}</td>

                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        @stop
