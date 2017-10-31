@extends('layouts.app')
<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.2.0/min/dropzone.min.js"></script>
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
                      <div class="col-md-12">
                        <h1>Arrastre y suelte en la caja las fotos a subir.</h1>
                        {!! Form::open(['action' => ['IncidenciaController@upload', 'id'=>$numExp], 'files' => true, 'enctype' => 'multipart/form-data', 'class' => 'dropzone', 'id' => 'image-upload' ]) !!}
                        <div>
                            <h3>Caja de fotos</h3>
                        </div>
                        {!! Form::close() !!}
                    </div>
                    </div>
                  </div>
              </div>
          </div>
<script type="text/javascript">
        Dropzone.options.imageUpload = {
            maxFilesize: 2,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
        };
</script>
@endsection
