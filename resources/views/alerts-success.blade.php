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
                          <h4 class="m0 text-thin">Sin Alertas</h4><small class="m0 text-muted">Las últimas métricas de todas las lanzas, arrojaron valores no críticos.</small>
                        </div>
                        <div class="pull-right">
                          <em class="ion-checkmark icon-2x"></em>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @if (count($metrics) > 0)
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
                        @foreach ($metrics as $metric)
                            <tr>
                              <td class="va-middle"><a href="/spears/{{ $metric['device'] }}">{{ $metric['less_id'] }}</a></td>
                              <td>
                                <p class="m0">{{ $metric['metric_type']['description'] }}</p>
                              </td>
                              <td class="va-middle text-center">
                                @if ($metric['metric_status'] == 1)
                                  <span class="text-success">{{ round($metric['amount'], 2) }} {{ $metric['metric_unit']['description'] }}</span>
                                @else
                                  <span class="text-warning">{{ round($metric['amount'], 2) }} {{ $metric['metric_unit']['description'] }}</span>
                                @endif
                              </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            @endif
        </section>

@endsection