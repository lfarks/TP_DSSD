@extends('layouts.app')
<style>
.links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 12px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
}
</style>
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Gestión de cuenta</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
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

                    You are logged in!<br>
                    <div class="col-md-4">
                      <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fa fa-user" aria-hidden="true"></i> Cliente</div>
                        <div class="panel-body">
                          <div class="links">
                            <a href="{{ route('newCli') }}"> Cargar datos de cliente</a><br>
                            <a href="{{ route('allCli') }}"> Ver datos de todos los cliente</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="panel panel-success">
                        <div class="panel-heading"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Incidencias</div>
                        <div class="panel-body">
                          <div class="links">
                            <a href="{{ route('newInc') }}">Cargar incidencia</a><br>
                            <a href="{{ route('allInc') }}">Ver mis incidencias</a><br>
                            <a href="{{ route('allIncs') }}">Ver incs. de todos los clientes</a>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
