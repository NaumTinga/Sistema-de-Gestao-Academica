@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cursos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/cursos">Inicio</a></li>
                <li class="breadcrumb-item active">Cursos</li>
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
            {{-- <div class="text-center">
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
            </div> --}}

            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Cursos</h3>
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

                                        @foreach ($cursos as $curso)
                                            <tr>
                                                <td>{{ $curso->nome }}</td>
                                                <td>

                                                    <a class="btn btn-primary"
                                                        href="{{ route('cursos.show', ['curso' => $curso->id]) }}">Ver</a>
                                                    <form class="d-inline" method="POST"
                                                        action="{{ route('cursos.destroy', ['curso' => $curso->id]) }}">
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