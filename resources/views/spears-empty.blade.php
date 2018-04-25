@extends('layout/app')

@section('title', 'Lanza #' . $device['idLess'])

@section('content')

        <section>
          <div class="container-fluid">
              <div class="row">
                <div class="col-lg-12">
                    <div class="alert alert-warning">No hay métricas aún.</div>
                </div>
              </div>
          </div>
        </section>

@endsection