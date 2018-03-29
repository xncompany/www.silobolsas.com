@extends('layout/app')

@section('title', 'Alertas')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-6 col-lg-3">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h2 class="m0">2</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Alarmas
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-3">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h2 class="m0">1</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Campo Afectado
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-3 visible-lg">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h2 class="m0">2</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Silobolsas Afectadas
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-3 visible-lg">
                <div class="card bg-danger">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h2 class="m0">2</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Lanzas Afectadas
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">
                    <div class="card">
                      <div class="card-body">
                        <table class="table-datatable table table-striped table-hover mv-lg" id="datatable1">
                          <thead>
                            <tr>
                              <th>Lanza</th>
                              <th>Métrica</th>
                              <th class="text-center">Valor</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="va-middle"><a href="/spears/1">67110023</a></td>
                              <td>
                                <p class="m0">Temperatura</p>
                              </td>
                              <td class="va-middle text-center"><span class="text-danger">65ºC</span></td>
                            </tr>
                            <tr>
                              <td class="va-middle"><a href="/spears/2">62572226</a></td>
                              <td>
                                <p class="m0">Humedad</p>
                              </td>
                              <td class="va-middle text-center"><span class="text-danger">88%</span></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- END table-responsive-->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-heading">
                        <div class="card-title">Lanzas</div><small>con problemas en las últimas 24hs.</small>
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