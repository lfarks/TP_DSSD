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
                      <div class="panel-heading">Formulario del cliente</div>
                      <div class="panel-body">
                        {{ Form::open(array('action' => 'ClientController@update', 'method' => 'PUT')) }}
                        <div class="form-group col-sm-12">
                          {!! Form::label('nom', 'Nombre') !!}
                          {!! Form::text('nom', $cli->name, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('ape', 'Apellido') !!}
                          {!! Form::text('ape', $cli->lastname, ['class' => 'form-control']); !!}
                        </div>

                        <div class="form-group col-sm-12">
                          {!! Form::label('numCli', 'Ingrese el numero de cliente provisto') !!}
                          {!! Form::number('numCli', $cli->numCli, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group col-sm-12">
                          {!! Form::submit('Enviar', ['class' => 'btn btn-success']) !!}
                          <!--<button class="btn btn-success" type="submit">Enviar</button>-->
                        </div>
                        {{ Form::close() }}
                      </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
@endsection
