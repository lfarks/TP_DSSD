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
                                  <!--<td>Descripcion</td>
                                  <td>Motivo</td>-->
                                  <td>Tipo</td>
                                  <td>Estado</td>
                                  <td>Fecha</td>
                              </tr>
                          </thead>
                          <tbody>
                          @foreach($incidencias as $key => $value)
                              <tr>
                                  <td>{{ $num_cli }}</td>
                                  @if ( $value->numExpediente != null)
                                    <td>{{ $value->numExpediente }}</td>
                                  @else
                                    <td title="Se asignará uno cuando sea evaluado por un empleado">Aún sin asignar</td>
                                    @endif
                                  <td>{{ $value->cantObjetos }}</td>
                                  <!--<td>{{ $value->descripcion }}</td>
                                  <td>{{ $value->motivo }}</td>-->
                                  <td>{{ $value->tipo }}</td>
                                  <td>{{ $value->estado }}</td>
                                  <td>{{ $value->fecha }}</td>
                                  <td>
                                     <!--{{ Form::open(array('url' => 'nerds/' . $value->id, 'class' => 'pull-right')) }}
                                         {{ Form::hidden('_method', 'DELETE') }}
                                         {{ Form::submit('Eliminar', array('class' => 'btn btn-danger')) }}
                                     {{ Form::close() }}-->
                                     <a title="Ver más" class="btn btn-small" href="{{ URL::to('incidencia/' . $value->id) }}">
                                       <i class="fa fa-eye" style="font-size:24px;color:green"></i> </a>
                                     <a title="Editar" class="btn btn-small" href="{{ URL::to('incidencia/' . $value->id . '/edit') }}">
                                       <i class="fa fa-edit" style="font-size:24px;color:red"></i></a>
                                  </td>
                                </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="panel-footer">
                        {{ $incidencias->render() }}
                    </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
