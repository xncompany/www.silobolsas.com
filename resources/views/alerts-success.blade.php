@extends('layout/app')

@section('title', 'Alertas')

@section('content')

        <section>
          <div class="container-fluid">
            <div class="row">
              <div class="col-xs-12 col-lg-12">
                  <div class="card bg-success">
                    <div class="card-body pv">
                      <div class="clearfix">
                        <div class="pull-left">
                          <h4 class="m0 text-thin">Sin Alertas</h4><small class="m0 text-muted">Las últimas métricas de todas las lanzas, arrojaron valores normales.</small>
                        </div>
                        <div class="pull-right">
                          <em class="ion-checkmark icon-2x"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <h4 class="page-header clearfix">Métricas de las Últimas 24hs</h4>
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
                          <td class="va-middle text-center"><span class="text-success">36ºC</span></td>
                        </tr>
                        <tr>
                          <td class="va-middle"><a href="/spears/1">67110023</a></td>
                          <td>
                            <p class="m0">Humedad</p>
                          </td>
                          <td class="va-middle text-center"><span class="text-success">18%</span></td>
                        </tr>
                        <tr>
                          <td class="va-middle"><a href="/spears/2">62572226</a></td>
                          <td>
                            <p class="m0">Temperatura</p>
                          </td>
                          <td class="va-middle text-center"><span class="text-success">29ºC</span></td>
                        </tr>
                        <tr>
                          <td class="va-middle"><a href="/spears/2">62572226</a></td>
                          <td>
                            <p class="m0">Humedad</p>
                          </td>
                          <td class="va-middle text-center"><span class="text-success">22%</span></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </section>

@endsection