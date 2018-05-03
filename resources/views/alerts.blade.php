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
                        <h2 class="m0">{{ $dashboard['alerts'] }}</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Alarma(s)
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
                        <h2 class="m0">{{ $dashboard['lands'] }}</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Campo(s) Afectado(s)
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
                        <h2 class="m0">{{ $dashboard['silobags'] }}</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Silobolsa(s) Afectada(s)
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
                        <h2 class="m0">{{ $dashboard['devices'] }}</h2>
                      </div>
                      <div class="pull-right mt-lg">
                        Lanza(s) Afectada(s)
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
                            @foreach ($alerts as $alert)
                            <tr>
                              <td class="va-middle"><a href="/spears/{{ $alert['device']['id'] }}">{{ $alert['less_id'] }}</a></td>
                              <td>
                                <p class="m0">{{ $alert['metric_type']['description'] }}</p>
                              </td>
                              <td class="va-middle text-center"><span class="text-danger">{{ round($alert['amount'], 2) }} {{ $alert['metric_unit']['description'] }}</span></td>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <!-- END table-responsive-->
                    </div>
                  </div>
                </div>
                @if ($map->count > 0)
                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                      <div class="card-heading">
                        <div class="card-title">Lanzas</div><small>con problemas en las últimas 24hs.</small>
                      </div>
                      <div class="card-body">
                        <div class="gmap" id="map-markers"></div>
                      </div>
                    </div>
                  </div>
                </div>
                @endif
              </div>
            </div>
          </div>
        </section>

        <script type="text/javascript">
        function googleMapsDevices() {

            if (document.getElementById('map-markers')) {

                var mapMarkers = new GMaps({
                    div: '#map-markers',
                    lat: {{ $map->center['latitude'] }},
                    lng: {{ $map->center['longitude'] }},
                    zoom: 12
                });
                @foreach ($map->markers as $pin)
                mapMarkers.addMarker({
                      lat: {{ $pin['latitude'] }},
                      lng: {{ $pin['longitude'] }},
                    infoWindow: {
                        content: '<a href="spears/{{ $pin['id'] }}">Lanza #{{ $pin['less_id'] }}</a>'
                    }
                });
                @endforeach
            }
        }
        </script>

@endsection
