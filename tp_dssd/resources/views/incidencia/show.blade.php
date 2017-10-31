@extends('layouts.app')

@section('content')
<div class="container">
  <a href="{{ url('/incidencias') }}">Volver</a>
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
                      <div class="panel-heading">Listado de incidentes del usuario</div>
                      <div class="panel-body">
                        <h1>Mostrando incidencia de {{ $num_cli }}</h1>
                          <div class="jumbotron ">
                              <h2>
                                <strong>Num. expediente:</strong>
                              @if ( $inc->numExpediente != null)
                                <td>{{ $inc->numExpediente }}</td>
                              @else
                                <td>Pendiente de evaluacion</td>
                                @endif
                              </h2>
                              <p>
                                  <br>
                                  <strong>CantObjetos:</strong> {{ $inc->cantObjetos }}<br>
                                  <strong>Descripcion:</strong> {{ $inc->descripcion }}<br>
                                  <strong>Motivo:</strong> {{ $inc->motivo }}<br>
                                  <strong>Tipo:</strong> {{ $inc->tipo }}<br>
                                  <strong>Fecha:</strong> {{ $inc->fecha }}<br>
                              </p>
                              <a class="btn btn-small" href="{{ URL::to('incidencia/' . $inc->id . '/edit') }}"><i class="fa fa-edit" style="font-size:48px;color:red"></i> Editar</a>
                          </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
