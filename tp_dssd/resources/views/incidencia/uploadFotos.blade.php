@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ url('/incidencias/all') }}">Volver</a>
    @if (count(session('errors')) > 0)
        <div class="alert alert-danger">
          @foreach (session('errors')->all() as $error)
            {{ $error }}<br>
          @endforeach
        </div>
        @endif

        @if (session('message'))
        <div class="alert alert-success">
          {{ session('message') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif
        @if (session('warning'))
        <div class="alert alert-warning">
          {{ session('warning') }}
        </div>
        @endif
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Cargar fotos en Dropbox</div>
                      <div class="panel-body">
                        {{ Form::open(array('id'=>'upload','action' => ['IncidenciaController@upload', 'id'=>$numExp], 'files' => true)) }}
                        <div class="form-group col-sm-6">
                          <i class="fa fa-file-image-o" aria-hidden="true"></i>
                          {!! Form::label('Fotos del incidente') !!}
                          {!! Form::file('fotos[]', ['multiple' => 'multiple']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                          <button id="submit" class="btn btn-success"><i class="fa fa-upload"></i> Subir a Dropbox</button>
                        </div>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
              </div>
          </div>
@endsection
