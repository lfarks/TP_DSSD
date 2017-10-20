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
<!-- O esto:?-->
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif

{{ Form::open(array('action' => 'IncidenciaController@store')) }}
<div class="form-group col-sm-2">
  {!! Form::label('cliente', 'Cliente') !!}
  {!! Form::text('cliente', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-2">
  {!! Form::label('fecha', 'Fecha del incidente') !!}
  {!! Form::date('fecha', \Carbon\Carbon::now(), ['class' => 'form-control']); !!}
</div>

<div class="form-group col-sm-3">
  {!! Form::label('cantObj', 'Cantidad de objetos') !!}
  {!! Form::number('cantObj', '', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6">
  {!! Form::label('desc', 'Descripcion') !!}
  {!! Form::textarea('desc', '', ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
  {!! Form::label('motivo', 'Motivo') !!}
  {!! Form::textarea('motivo', '', ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-12">
  {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
  <!--<button class="btn btn-success" type="submit">Enviar</button>-->
</div>
{{ Form::close() }}
@endsection
