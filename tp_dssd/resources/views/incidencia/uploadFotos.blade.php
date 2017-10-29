@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ url('/home') }}">Volver</a>
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
          <div class="row">
              <div class="col-md-12">
                  <div class="panel panel-default">
                      <div class="panel-heading">Formulario del incidente</div>
                      <div class="panel-body">
                        {{ Form::open(array('action' => ['IncidenciaController@upload', 'id'=>$numExp], 'files' => true)) }}
                        <div class="form-group col-sm-6">
                          <i class="fa fa-file-text-o" aria-hidden="true"></i>
                          {!! Form::label('Foto del incidente') !!}
                          {!! Form::file('foto', null) !!}
                        </div>
                        <div class="form-group col-sm-12">
                          {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                          <button class="btn btn-success"><i class="fa fa-paper-plane-o ml-1"></i> Enviar</button>
                        </div>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
              </div>
          </div>
@endsection
