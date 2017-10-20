@extends('layouts.app')

@section('content')
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
      
{{ Form::open(array('action' => 'IncidenciaController@store')) }}
<div class="form-group">
  {!! Form::label('cliente', 'Cliente') !!}
  {!! Form::text('cliente', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('fecha', 'Fecha del incidente') !!}
  {!! Form::text('fecha', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('cantObj', 'Cantidad de objetos') !!}
  {!! Form::text('cantObj', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('desc', 'Descripcion') !!}
  {!! Form::text('desc', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group">
  {!! Form::label('motivo', 'Motivo') !!}
  {!! Form::text('motivo', '', ['class' => 'form-control']) !!}
</div>

<button class="btn btn-success" type="submit">Enviar</button>
{{ Form::close() }}
@endsection
