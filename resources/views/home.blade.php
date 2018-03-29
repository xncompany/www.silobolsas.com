@extends('layout/app')

@section('title', 'Dashboard')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-lg-12">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h4 class="m0 text-thin">2</h4><small class="m0 text-muted">alertas en las últimas 24hs</small>
                      </div>
                      <div class="pull-right">
                        <a href="/alerts"><button class="btn btn-flat btn-primary text-white" type="button">Ver Alertas</button></a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-lg-12">
                <div class="row">
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">3</h4><small class="m0 text-muted">Campos</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">14</h4><small class="m0 text-muted">Silobolsas</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">880</h4><small class="m0 text-muted">Lanzas</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-6 col-lg-3">
                    <div class="card">
                      <div class="card-body pv">
                        <div class="clearfix">
                          <div class="pull-left">
                            <h4 class="m0 text-thin">78,012</h4><small class="m0 text-muted">Mediciones</small>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-heading">
                        <div class="card-title">Lanzas</div><small>Que reportaron métricas en las últimas 24hs</small>
                      </div>
                      <div class="card-body">
                        <div class="gmap" id="map-markers-2"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection