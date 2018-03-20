@extends('layout/app')

@section('title', 'Dashboard')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-6 col-lg-3">
                <div class="card">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h4 class="m0 text-thin">3</h4><small class="m0 text-muted">Campos</small>
                      </div>
                      <div class="pull-right mt-lg">
                        <div class="sparkline" id="sparkline2" data-line-color="#4caf50"></div>
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
                      <div class="pull-right mt-lg">
                        <div class="sparkline" id="sparkline1" data-line-color="#03A9F4"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-3 visible-lg">
                <div class="card">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h4 class="m0 text-thin">880</h4><small class="m0 text-muted">Lanzas</small>
                      </div>
                      <div class="pull-right mt-lg">
                        <div class="sparkline" id="sparkline3" data-line-color="#ab47bc"></div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-xs-6 col-lg-3 visible-lg">
                <div class="card">
                  <div class="card-body pv">
                    <div class="clearfix">
                      <div class="pull-left">
                        <h4 class="m0 text-thin">78,012</h4><small class="m0 text-muted">Mediciones</small>
                      </div>
                      <div class="pull-right mt-lg">
                        <div class="sparkline" id="sparkline4" data-line-color="#e91e63"></div>
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
                        <div class="card-title">Silobolsas</div><small>A lo largo de todos los campos</small>
                      </div>
                      <div class="card-body">
                        <div class="gmap" id="map-markers"></div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12 col-lg-4">
                    <div class="card">
                      <div class="card-heading">
                        <div class="pull-right"><span class="mr"><em class="ion-record spr text-primary"></em><small class="va-middle">2018</small></span><span><em class="ion-record spr text-success"></em><small class="va-middle">2017</small></span></div>
                        <div class="card-title">Lanzas</div>
                      </div>
                      <div class="card-body">
                        <div class="flot-chart flot-chart-md" id="flot-bar-chart" data-height="235"></div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-lg-8">
                    <div class="card">
                      <!-- START table-responsive-->
                      <div class="table-responsive">
                        <table class="table">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Métrica</th>
                              <th>Reportes</th>
                              <th class="text-right">Trend</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td class="va-middle"><span class="badge bg-pink-500">1</span></td>
                              <td>
                                <p class="m0">Temperatura<br><small class="text-thin">Promedio de lanzas reportando datos</small></p>
                              </td>
                              <td class="va-middle">50%</td>
                              <td class="text-right va-middle"><em class="ion-arrow-graph-up-right text-success"></em></td>
                            </tr>
                            <tr>
                              <td class="va-middle"><span class="badge bg-purple-400">2</span></td>
                              <td>
                                <p class="m0">Humedad<br><small class="text-thin">Promedio de lanzas reportando datos</small></p>
                              </td>
                              <td class="va-middle">30%</td>
                              <td class="text-right va-middle"><em class="ion-arrow-graph-down-right text-warning"></em></td>
                            </tr>
                            <tr>
                              <td class="va-middle"><span class="badge bg-indigo-500">3</span></td>
                              <td>
                                <p class="m0">CO2<br><small class="text-thin">Promedio de lanzas reportando datos</small></p>
                              </td>
                              <td class="va-middle">80%</td>
                              <td class="text-right va-middle"><em class="ion-arrow-graph-up-right text-success"></em></td>
                            </tr>
                            <tr>
                              <td class="va-middle"><span class="badge bg-info">4</span></td>
                              <td>
                                <p class="m0">Batería<br><small class="text-thin">Promedio de lanzas reportando datos</small></p>
                              </td>
                              <td class="va-middle">50%</td>
                              <td class="text-right va-middle"><em class="ion-arrow-graph-down-right text-warning"></em></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <!-- END table-responsive-->
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

@endsection