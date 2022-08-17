@extends('adminlte::page')

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fontawesome-free/css/all.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('title')

@section('content_header')
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Dados do Docente</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="/docentes">Inicio</a></li>
                <li class="breadcrumb-item active">Docente</li>
            </ol>
        </div><!-- /.col --> 
    </div><!-- /.row -->
   
@stop

@section('content')
    <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Dados do Docente</h3>

        </div>
       
       


        <form method="POST" action="{{ route('docentes.update', ['docente' => $docente->id]) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="card-body col-md-6">
                    <div class="form-group ">
                        <label>Nome *</label>
                        <input type="text" name="nome" class="form-control"
                            value="{{ old('title') ?? $docente->nome }}" placeholder="Ex: Marlene Paulino" required>
                    </div>
                    <div class="form-group ">
                        <label>Data de Nascimento *</label>
                        <input type="date" name="dataNascimento" class="form-control"
                            value="{{ old('dataNascimento') ?? $docente->dataNascimento }}" required>
                    </div>
                    <div class="form-group ">
                        <label>Morada</label>
                        <input type="text" name="morada" class="form-control"
                            value="{{ old('morada') ?? $docente->morada }}" placeholder="Ex: Av. 24 de Julho">
                    </div>

                    <div class="form-group">
                        <label>Naturalidade *</label>
                        <select name="naturalidade" class="form-control select2bs4" style="width: 100%;"
                            value="{{ old('naturalidade') ?? $docente->naturalidade }}" required>
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
                </div>

                <div class="card-body col-md-6">

                    <div class="form-group">
                        <label>Genero *</label>
                        <select name="genero" class="form-control select2bs4" style="width: 100%;"
                            value="{{ old('genero') ?? $docente->genero }}" required>
                            <option selected="selected">Masculino</option>
                            <option>Femenino</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Grau Academico</label>
                        <select name="grauAcademico" class="form-control select2bs4" style="width: 100%;"
                            value="{{ old('grauAcademico') ?? $docente->grauAcademico }}">
                            <option selected="selected">Ensino Medio</option>
                            <option>Ensino Superior</option>
                            <option>Mestrado</option>
                            <option>Doutoramento</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <label>Telefone *</label>
                        <input type="number" name="nrTelefone" class="form-control"
                            value="{{ old('nrTelefone') ?? $docente->nrTelefone }}" placeholder="Ex: 848515184" required>
                    </div>
                    <div class="form-group ">
                        <label for="exampleInputEmail1">Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="marlenepaulino@gmail.com"
                            value="{{ old('email') ?? $docente->email }}" required>
                    </div>
                </div>

                {{-- <div class="form-group ">
                    <label>Turmas</label>
                    <select name="turmas" class="form-control select2bs4" id="turmas"
                        data-placeholder="Selecione as turmas" style="width: 100%;"  >
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->designacao }}</option>
                        @endforeach
                    </select>

                </div> --}}

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </div>
        </form>
    </div>

    {{-- <div class="row card card-primary">
        <div class="card-header">
            <h3 class="card-title">Associar Docente a Turmas e Disciplinas</h3>
        </div>


        <form method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group">
                    <label>Disciplinas</label>
                    <select name="turmas[]" class="select2" id="turmas" multiple=""
                        data-placeholder="Selecione as Turmas" style="width: 100%;">
                        @foreach ($turmas as $turma)
                            <option value="{{ $turma->id }}">{{ $turma->designacao }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-footer">
                    <a href="{{ route('docente.AssociarDocenteTurma', [$docente->id]) }}">Associar</a>

                </div>

            </div>
        </form> --}}
    </div>
@endsection


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('#turmas').select2({
            multiple: true
        });
    </script>
@stop
