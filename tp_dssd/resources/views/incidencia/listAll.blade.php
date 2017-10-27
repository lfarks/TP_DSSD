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
                      <div class="panel-heading">Listado de incidentes del usuario</div>
                      <div class="panel-body">
                        <table class="table table-striped table-bordered table-hover">
                          <thead>
                              <tr>
                                  <td>Num. cliente</td>
                                  <td>Num. expediente</td>
                                  <td>CantObjetos</td>
                                  <td>Descripcion</td>
                                  <td>Motivo</td>
                                  <td>Tipo</td>
                                  <td>Fecha</td>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($incidencias as $key => $value)
                              <tr>
                                  <td>{{ $value->numCli }}</td>
                                  @if ( $value->numExpediente != null)
                                    <td>{{ $value->numExpediente }}</td>
                                  @else
                                    <td>Pendiente de evaluacion</td>
                                    @endif
                                  <td>{{ $value->cantObjetos }}</td>
                                  <td>{{ $value->descripcion }}</td>
                                  <td>{{ $value->motivo }}</td>
                                  <td>{{ $value->tipo }}</td>
                                  <td>{{ $value->fecha }}</td>
                                </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
