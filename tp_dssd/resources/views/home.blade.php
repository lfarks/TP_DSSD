@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!<br>
                    <a href="{{ route('newCli') }}"><button type="button" class="btn btn-lg btn-primary"><i class="fa fa-user" aria-hidden="true"></i> Cargar datos de cliente</button></a>
                    <a href="{{ route('newInc') }}"><button type="button" class = "btn btn-primary">Cargar incidencia</button></a>
                    <a href="{{ route('allInc') }}"><button type="button" class = "btn btn-default">Ver mis incidencias</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
