@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Disciplinas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/disciplinas">Inicio</a></li>
                <li class="breadcrumb-item active">Disciplinas</li>
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
                            <h3 class="card-title">Lista de disciplinas</h3>
                        </div>
                    
                            <div class="card-body  table-responsive">
                                <table id="table" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Acção</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($disciplinas as $disciplina)
                                            <tr>
                                                <td>{{ $disciplina->nome }}</td>
                                                <td>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('disciplinas.show', ['disciplina' => $disciplina->id]) }}">Ver</a>
                                                    <form class="d-inline" method="POST"
                                                        action="{{ route('disciplinas.destroy', ['disciplina' => $disciplina->id]) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-warning">
                                                            Apagar
                                                        </button>
                                                    </form>
                                                </td>
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

@endsection