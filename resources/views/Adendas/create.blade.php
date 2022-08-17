@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Gerar Adenda</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Adenda</li>
            </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados do Docente</h3>
        </div>
        <form method="POST" action="{{ route('adendas.store') }}">
            @csrf
            <div class="row">
                <div class="card-body col-md-6"> {{-- lado esquerdo do form --}}
                    <div class="form-group ">
                        <label>Docente *</label>
                        <select name="docentes" class="form-control select2bs4" data-placeholder="Selecione o docente"
                            style="width: 100%;">
                            @foreach ($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group ">
                        <label>Curso *</label>
                        <select name="cursos" class="form-control select2bs4" data-placeholder="Selecione o curso"
                            style="width: 100%;">
                            @foreach ($cursos as $curso)
                                <option value="{{ $curso->id }}">{{ $curso->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Semestre</label>
                        <select name="semestre" class="form-control select2bs4" style="width: 100%;">
                            <option>I</option>
                            <option>II</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Data de Alteração *</label>
                        <input type="date" name="dataAlteracao" class="form-control" required>
                    </div>

                </div>{{-- fimm lado esquerdo do form --}}

                <div class="card-body col-md-6"> {{-- lado direito do form --}}

                    <div class="form-group ">

                        <label>Disciplina *</label>
                        <select name="disciplinas" class="form-control select2bs4" data-placeholder="Selecione a disciplina"
                            style="width: 100%;">
                            @php
                                $cursos = \App\Models\Curso::all();
                            @endphp
                            @foreach ($cursos as $curso)
                                @foreach ($curso->disciplinas as $disciplina)
                                    <option value="{{ $disciplina->id }}">{{ $disciplina->nome }}</option>
                                @endforeach
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Turma *</label>
                        <select name="turmas" class="form-control select2bs4" data-placeholder="Selecione as turma"
                            style="width: 100%;">
                            @foreach ($turmas as $turma)
                                <option value="{{ $turma->id }}">{{ $turma->designacao }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Regime</label>
                        <select name="regime" class="form-control select2bs4" style="width: 100%;">
                            <option>Laboral</option>
                            <option>Pos-Laboral</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Obeservação *</label>
                        <input type="text" name="observacao" class="form-control" required>
                    </div>
                </div>{{-- fim lado direito do form --}}
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Gerar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
