@extends('layout/app')

@section('title', 'Lanza #' . $device['idLess'])

@section('content')

          <section>
              <div class="container-fluid">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">
                    <div class="card bg-danger">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">No hay Métricas aún</h4>
                            <small class="m0 text-muted">
                              Las métricas se actualizan 1 vez al día.
                            </small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </section>

@endsection